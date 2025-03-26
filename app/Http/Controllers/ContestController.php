<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\ContestEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\PaymentApproved;
use Illuminate\Support\Facades\Notification;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    public function dashboard()
    {
        $userSubmission = auth()->user()->submission;
        $contestEntries = ContestEntry::where('user_id', Auth::user()->id)->get();

        if (!$userSubmission) {
            Alert::warning('Payment Required', 'Please submit your payment proof to participate in the contest.');
        } elseif (!$userSubmission->is_approved) {
            Alert::info('Pending Approval', 'Your payment proof is pending approval.');
        }

        return view('contest.dashboard', compact('contestEntries', 'userSubmission'));
    }

    public function upload(Request $request)
    {
        $userSubmission = auth()->user()->submission;

        // Check if user is approved
        if (!$userSubmission || !$userSubmission->is_approved) {
            Alert::error('Access Denied', 'Your payment must be approved before you can upload videos.');
            return redirect()->route('contest.dashboard');
        }

        // Check if user already has an entry
        $existingEntry = ContestEntry::where('user_id', auth()->id())->first();
        if ($existingEntry) {
            Alert::error('Upload Denied', 'You have already submitted a video entry.');
            return redirect()->route('contest.dashboard');
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'video' => 'required|mimes:mp4,mov,avi|max:102400'
        ]);

        try {
            $videoPath = $request->file('video')->store('contest-videos', 'public');

            $entry = ContestEntry::create([
                'title' => $request->title,
                'description' => $request->description,
                'video_url' => Storage::url($videoPath),
                'user_id' => auth()->id(),
            ]);

            // Generate share token after creation
            $entry->generateShareToken();

            Alert::success('Success', 'Your video has been uploaded successfully!');
            return redirect()->route('contest.dashboard');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong while uploading your video.');
            return back();
        }
    }

    public function approveSubmission(Submission $submission)
    {
        try {
            $submission->update([
                'is_approved' => true
            ]);

            // Send notification to user
            $submission->user->notify(new PaymentApproved($submission));

            // Use SweetAlert for success message
            Alert::success('Success', 'Submission has been approved and notification sent to user!');

            return back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong while approving the submission.');
            return back();
        }
    }

    public function showVotePage($shareToken)
    {
        $entry = ContestEntry::where('share_token', $shareToken)->firstOrFail();

        return view('contest.vote', compact('entry'));
    }

    public function vote(Request $request, $shareToken)
    {
        $entry = ContestEntry::where('share_token', $shareToken)->firstOrFail();

        // Security checks
        $voterIp = $request->ip();
        $voterFingerprint = $request->header('User-Agent');

        // Check if already voted from this IP
        $existingVote = Vote::where('contest_entry_id', $entry->id)
            ->where('voter_ip', $voterIp)
            ->exists();

        if ($existingVote) {
            return response()->json([
                'success' => false,
                'message' => 'You have already voted for this entry'
            ]);
        }

        // Create vote record
        Vote::create([
            'contest_entry_id' => $entry->id,
            'voter_ip' => $voterIp,
            'voter_fingerprint' => $voterFingerprint
        ]);

        // Increment votes count
        $entry->increment('votes_count');

        return response()->json([
            'success' => true,
            'message' => 'Vote recorded successfully',
            'new_count' => $entry->votes_count
        ]);
    }
}
