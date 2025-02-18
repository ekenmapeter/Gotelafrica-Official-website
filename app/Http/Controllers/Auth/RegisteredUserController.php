<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Recharge;
use App\Models\Referral;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function create(Request $request): View
    {
        if ($request->has('invite')) {
        $referralCode = $request->input('invite');
        $referrer = User::where('invite', $referralCode)->first();

        if ($referrer) {
            $referralUser = $referrer->invite;
            // Set a cookie to track the referral for 7 days
            $cookie = cookie('referral', $referralCode, 10080); // 10080 minutes = 7 days
            return view('auth.register', compact('referralUser'))->withCookie($cookie);
        } else {

        }
    }
        return view('auth.register');

    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'other_name' => ['nullable', 'string', 'max:255'],
        'gender' => ['required', 'string'], // Adjust validation rules for gender
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'phone' => ['required', 'string', 'size:11', 'unique:users,phone'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'address' => ['required', 'string'], // Add validation rules for address, country, and state
        'country' => ['required', 'string'],
        'state' => ['required', 'string'],
        'invite' => ['nullable', 'string'],
    ]);

    $ref_code = Str::random(10);

    $userData = [
        'first_name' => $validatedData['first_name'],
        'other_name' => $validatedData['other_name'],
        'gender' => $validatedData['gender'],
        'email' => strtolower($validatedData['email']),
        'phone' => $validatedData['phone'],
        'password' => Hash::make($validatedData['password']),
        'roles' => 2, // Set default value for roles
        'address' => $validatedData['address'],
        'country' => $validatedData['country'],
        'state' => $validatedData['state'],
        'invite' => $ref_code,
    ];



    $user = User::create($userData);
    $walletData = [
        'user_id' => $user->id,
        'balance' => 0.00,
    ];

    $rechargeData = [
        'user_id' => $user->id,
        'amount' => 0.00,
    ];

    $wallet = Wallet::create($walletData);
    $recharge = Recharge::create($rechargeData);

    if ($request->has('invite')) {
        $referralCode = $request->invite;
        $referrer = User::where('invite', $referralCode)->first();

        if ($referrer) {
            $referralUser = $referrer->referral_code;
            $referral = DB::table('users')->where('invite', $referrer->invite)->first();


            $create_referral = Referral::create([
                'user_id' => $referral->id,
                'phone' => $validatedData['phone'],
                'user_from' => $user->id,
                'status' => 0,
                'email' => strtolower($validatedData['email']),
            ]);

        } else {
            //continue with the code
        }
    }

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}
}
