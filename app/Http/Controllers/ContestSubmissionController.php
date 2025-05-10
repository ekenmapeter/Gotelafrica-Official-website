<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserConfirmation;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ContestSubmissionController extends Controller
{


    private function handleFileUpload($file)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('uploads', $filename, 'public');
        return $filename;
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|unique:users',
                'description' => 'required|string',
                'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:10240',
                'password' => 'required|min:8|confirmed',
                'gender' => 'required|string|in:male,female,other',
                'address' => 'required|string',
                'country' => 'required|string',
                'state' => 'required|string',
            ]);

            // Split full name into first name and other name
            $nameParts = explode(' ', $validated['full_name'], 2);
            $firstName = $nameParts[0];
            $otherName = $nameParts[1] ?? ''; // If no last name provided, use empty string

            // Handle file upload
            $paymentProof = $this->handleFileUpload($request->file('payment_proof'));
            $ref_code = Str::random(10);
            // Create user with split name
            $user = User::create([
                'first_name' => $firstName,
                'other_name' => $otherName,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'],
                'gender' => $validated['gender'],
                'address' => $validated['address'],
                'country' => $validated['country'],
                'state' => $validated['state'],
                'roles' => 3,
                'invite' => $ref_code,
            ]);

            // Create submission record
            $submission = Submission::create([
                'user_id' => $user->id,
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'description' => $validated['description'],
                'payment_proof' => $paymentProof
            ]);

            // Send emails
            Mail::to('contest@gotelafrica.com')->send(new AdminNotification($submission));
            Mail::to($validated['email'])->send(new UserConfirmation($submission));

            // Log the user in
            Auth::login($user);

            return response()->json([
                'status' => 'success',
                'redirect' => route('contest.dashboard')
            ]);

        } catch (\Exception $e) {
            Log::error('Registration Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function create()
    {
        return view('contest.submission.create');
    }
}