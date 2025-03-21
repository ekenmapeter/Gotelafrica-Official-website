<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserConfirmation;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class ContestSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'description' => 'required|string',
            'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:10240'
        ]);

        try {
            // Generate submission ID
            $submissionId = 'CT2025' . Str::uuid()->toString();

            // Handle file upload
            $paymentProof = $this->handleFileUpload($request->file('payment_proof'));

            // Create submission
            $submission = Submission::create([
                'id' => $submissionId,
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'description' => $request->description,
                'payment_proof' => $paymentProof
            ]);

            // Send emails
            Mail::to('contest@gotelafrica.com')->send(new AdminNotification($submission));
            Mail::to($request->email)->send(new UserConfirmation($submission));

            return response()->json([
                'status' => 'success',
                'submission_id' => $submissionId
            ]);

        } catch (\Exception $e) {
            Log::error('Submission Error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    private function handleFileUpload($file)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('uploads', $filename, 'public');
        return $filename;
    }
}