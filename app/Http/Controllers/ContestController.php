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
use Illuminate\Support\Facades\Log;

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
        try {
            // Log the incoming file size
            \Log::info('Contest Upload Attempt', [
                'file_size' => $request->file('video') ? $request->file('video')->getSize() : 'No file',
                'max_upload_size' => ini_get('upload_max_filesize'),
                'post_max_size' => ini_get('post_max_size')
            ]);

            $userSubmission = auth()->user()->submission;

            // Check if user is approved
            if (!$userSubmission || !$userSubmission->is_approved) {
                \Log::warning('Upload Attempt - User not approved', ['user_id' => auth()->id()]);
                return response()->json([
                    'success' => false,
                    'message' => 'Your payment must be approved before you can upload videos.'
                ], 403);
            }

            // Check if user already has an entry
            $existingEntry = ContestEntry::where('user_id', auth()->id())->first();
            if ($existingEntry) {
                \Log::warning('Upload Attempt - User already has entry', ['user_id' => auth()->id()]);
                return response()->json([
                    'success' => false,
                    'message' => 'You have already submitted a video entry.'
                ], 403);
            }

            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'video' => [
                    'required',
                    'mimes:mp4,mov,avi',
                    'max:30720', // 30MB in kilobytes
                    function ($attribute, $value, $fail) {
                        $fileSize = $value->getSize();
                        $minSize = 1024 * 1024; // 1MB in bytes

                        if ($fileSize < $minSize) {
                            $fail('The video must be at least 1MB in size.');
                        }
                    }
                ]
            ]);

            // Get video duration using FFmpeg
            $videoPath = $request->file('video')->getPathname();
            $duration = shell_exec("ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 " . escapeshellarg($videoPath));
            $duration = floatval($duration);

            // Check if video duration is between 15 seconds and 5 minutes
            if ($duration < 15 || $duration > 300) {
                return response()->json([
                    'success' => false,
                    'message' => 'Video duration must be between 15 seconds and 5 minutes.'
                ], 422);
            }

            $videoPath = $request->file('video')->store('contest-videos', 'public');

            \Log::info('Video Upload Successful', [
                'user_id' => auth()->id(),
                'file_name' => $request->file('video')->getClientOriginalName(),
                'file_size' => $request->file('video')->getSize(),
                'duration' => $duration,
                'stored_path' => $videoPath
            ]);

            $entry = ContestEntry::create([
                'title' => $request->title,
                'description' => $request->description,
                'video_url' => Storage::url($videoPath),
                'user_id' => auth()->id(),
                'duration' => $duration
            ]);

            // Generate share token after creation
            $entry->generateShareToken();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your video has been uploaded successfully!',
                    'redirect' => route('contest.dashboard')
                ]);
            }

            return redirect()->route('contest.dashboard')
                ->with('success', 'Your video has been uploaded successfully!');

        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            \Log::error('PostTooLargeException', [
                'error' => $e->getMessage(),
                'max_upload_size' => ini_get('upload_max_filesize'),
                'post_max_size' => ini_get('post_max_size')
            ]);
            return response()->json([
                'success' => false,
                'message' => 'The uploaded file is too large. Maximum allowed size is 30MB.'
            ], 413);
        } catch (\Exception $e) {
            \Log::error('Video Upload Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error uploading video: ' . $e->getMessage()
                ], 422);
            }

            return back()->with('error', 'Error uploading video: ' . $e->getMessage());
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
