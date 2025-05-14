<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Account;
use App\Models\Recharge;

use App\Models\Referral;
use App\Models\Withdraw;
use Illuminate\View\View;
use App\Models\TodayIncome;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\DB;
use App\Models\RechargeTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function dashboard(): View
    {
        $user = Auth::user();
        $wallet = Wallet::Where("user_id", Auth::user()->id)->first();
        $recharge = Recharge::Where("user_id", Auth::user()->id)->first();
        $total_income = TodayIncome::where('user_id', Auth::user()->id)->sum('amount');
        $total_recharge = RechargeTransaction::where('user_id', Auth::user()->id)->sum('amount');
        $totalWithdraw = Withdraw::where('user_id', Auth::user()->id)->where('status', 1)->sum('amount');

        $today_income = TodayIncome::where('user_id', auth()->id())
        ->whereDate('created_at', now()->toDateString())
        ->sum('amount');

        $total_asset = ProductTransaction::where('user_id', Auth::user()->id)->sum('price');

        $team_income = DB::table('referral')
            ->join('product_transaction', 'referral.user_from', '=', 'product_transaction.user_id')
            ->select(DB::raw('SUM(product_transaction.daily_income) as daily_income'))
            ->where('referral.user_id', Auth::user()->id)
            ->where('product_transaction.status', 1)
            ->first();

            // Extract daily_income from the query result
        if ($team_income) {
            $daily_income = $team_income->daily_income;
            // Calculate 5% of daily_income
            $get_team_income_percentage = $daily_income * 5 / 100;

        } else {
            $get_team_income_percentage = 0; // Handle the case when $team_income is null or empty
        }

        $phone = $user->phone;

        $maskedPhone = substr($phone, 0, 4) . str_repeat('*', strlen($phone) - 8) . substr($phone, -4);

        return view('dashboard', compact('wallet','user',
        'recharge','total_income','total_recharge','total_asset','totalWithdraw',
        'maskedPhone','today_income','get_team_income_percentage'));
    }

    public function mybankaccount(): View
    {
        $account = Account::where('user_id', Auth::user()->id)->first();

        return view('mybankaccount', compact('account'));
    }

    public function accountUpdate(Request $request)
    {
        $account = Account::where('user_id', Auth::user()->id)->first();

        if ($account) {
            $account->update([
                'name' => $request->name,
                'bankname' => $request->bankname,
                'bankno' => $request->bankno,
                'phone'=> $request->phone,
                'withdrawpassword'=> $request->withdrawpassword,
            ]);
        } else {
            $account = Account::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'bankname' => $request->bankname,
                'bankno' => $request->bankno,
                'phone'=> $request->phone,
                'withdrawpassword'=> $request->withdrawpassword,
            ]);
        }
        toast('Account Updated','success');

        return redirect()->back();
    }


    public function resetPasswordShow(): View
    {
        return view('resetpassword');
    }


    public function resetPasswordSave(Request $request)
{

    //dd($request);
    if (!Hash::check($request->old_password, Auth::user()->password)) {
        toast('Old password does not match.!', 'error');
        return redirect()->back();
    }
    $user = Auth::user();

    if ($user) {
        $user->password = bcrypt($request->new_password);
        $user->save();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Password reset successful!', 'success');
        return redirect('/');
    }

    toast('User not found. Unable to reset password.', 'error');
    return redirect()->back();
}


    public function withdrawpassword(): View
    {
        return view('withdrawpassword');
    }


    public function customerservice(): View
    {
        return view('customerservice');
    }

    public function transaction(): View
    {
        $transaction = Transaction::where('user_id', Auth::user()->id )->get();
        return view('transaction', compact('transaction'));
    }

    public function recharge(): View
    {
        return view('recharge');
    }

    public function rechargePaymentUpload(Request $request)
    {
        // Check if a transaction already exists for this user
        $existingTransaction = Transaction::where('user_id', Auth::id())->where('status', 0)->first();
        if ($existingTransaction) {
            toast('You can only upload once per transaction.', 'error');
            return redirect()->back();
        }

        if ($request->hasFile('payment_proof')) {
            $file1 = $request->file('payment_proof');
            $filename1 = Str::random(30) . "." . $request->file('payment_proof')->extension();
            $publicPath = public_path('payment_proof');
            $file1->move($publicPath, $filename1);

            $transaction_create = Transaction::create([
                'user_id' => Auth::id(),
                'type' => 'Recharge',
                'description' => 'Manual Recharge Payment',
                'balance' => $request->amount,
                'status' => 0,
                'proof_payment' => $filename1,
            ]);

            toast('Your transaction was successful, you can review your transaction status in 15 minutes', 'success');
            return redirect()->back();
        }
    }


    public function transDetails($id): View
    {
        $transaction = Transaction::find($id); // Retrieve the transaction by ID

        if (!$transaction) {
            abort(404); // Handle if the transaction is not found
        }

        return view('transaction_details', compact('transaction'));
    }
    public function withdraw(): View
    {
        $wallet = Wallet::Where("user_id", Auth::user()->id)->first();
        $account = Account::Where("user_id", Auth::user()->id)->first();
        return view('withdraw', compact('wallet', 'account'));
    }

    public function withdrawRequest(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => ['required'],
                'amount' => ['required'],
                'bankno' => ['required'],
                'name' => ['required'],
                'bankname' => ['required'],
            ]);

            $getUserWallet = Wallet::where('user_id', Auth::user()->id)->first();

            if ($request->amount > $getUserWallet->balance) {
                toast('Your balance is less than <strong>₦'. number_format($request->amount, 2) .'</strong>', 'error');
                return redirect()->back();
            } else {
                $create = Withdraw::create([
                    'user_id' => $validatedData['user_id'],
                    'amount' => $validatedData['amount'],
                    'status' => 0,
                    'account_number' => $validatedData['bankno'],
                    'account_name' => $validatedData['name'],
                    'bank_name' => $validatedData['bankname'],
                ]);

                // Update user's wallet balance
                $deductUserWallet = $getUserWallet->balance - $validatedData['amount'];
                $updateUserWallet = Wallet::where('user_id', Auth::user()->id)->decrement('balance', $validatedData['amount']);

                // Send email notification
                try {
                    $user = Auth::user();
                    \Mail::to($user->email)->send(new \App\Mail\WithdrawalNotification($user, $create));
                } catch (\Exception $e) {
                    \Log::error('Failed to send withdrawal notification email: ' . $e->getMessage());
                }

                toast('Your withdrawal request of <strong>₦'.number_format($validatedData['amount'], 2).'</strong> was successful, payment is between 24-72hrs' , 'success');
                return redirect()->back();
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, handle the exception
            $errors = $e->validator->errors()->all();
            toast('Validation failed! ' . implode(' ', $errors), 'error');
            return redirect()->back();
        }
    }



    public function refer(): View
    {
        $userCode = User::where('id', Auth::user()->id )->first();
        $url = route('register') . '?invite=' . $userCode->invite;
        $get_referral = Referral::where('user_id', Auth::user()->id )->get();
        return view('refer', compact('userCode','url','get_referral'));
    }

    public function myOrder(): View
    {
        $myorder = ProductTransaction::where('user_id', Auth::user()->id )->get();

        return view('myorder', compact('myorder'));
    }

    public function logout()
{
    Auth::logout();
    return redirect('/login'); // Redirect to the login page or any other page you prefer
}

    public function sendOTP(Request $request)
    {
        try {
            // Generate a 6-digit OTP
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            // Store OTP in session for verification
            session(['withdrawal_otp' => $otp]);
            session(['otp_created_at' => now()]);

            // Get the authenticated user
            $user = auth()->user();

            if (!$user) {
                \Log::error('User not authenticated when sending OTP');
                return response()->json([
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Log the attempt to send email
            \Log::info('Attempting to send OTP email to: ' . $user->email);

            // Send OTP via email
            \Mail::to($user->email)->send(new \App\Mail\OTPMail($user, $otp));

            // Log successful email send
            \Log::info('OTP email sent successfully to: ' . $user->email);

            return response()->json([
                'message' => 'OTP sent successfully',
                'otp' => $otp // Remove this in production
            ]);
        } catch (\Exception $e) {
            // Log the full error
            \Log::error('OTP Send Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'message' => 'Failed to send OTP: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeWithdrawalPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password',
            'otp' => 'required|string',
        ]);

        // Verify OTP
        $stored_otp = session('withdrawal_otp');
        $otp_created_at = session('otp_created_at');

        if (!$stored_otp || !$otp_created_at) {
            return redirect()->back()->with('error', 'Please request a new OTP');
        }

        // Check if OTP is expired (15 minutes validity)
        if (now()->diffInMinutes($otp_created_at) > 15) {
            session()->forget(['withdrawal_otp', 'otp_created_at']);
            return redirect()->back()->with('error', 'OTP has expired. Please request a new one');
        }

        // Verify OTP
        if ($request->otp !== $stored_otp) {
            return redirect()->back()->with('error', 'Invalid OTP');
        }

        // Clear OTP from session after successful verification
        session()->forget(['withdrawal_otp', 'otp_created_at']);

        // Update user's withdrawal password
        $user = auth()->user();
        $user->withdrawal_password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Withdrawal password set successfully');
    }
}
