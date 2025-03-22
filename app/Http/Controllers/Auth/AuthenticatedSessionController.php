<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DateTime;
use Redirect;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(auth()->user()->roles == 1)
            {
                Auth::user()->last_login = new DateTime();
                Auth::user()->save();
                return redirect()->route('administrator');
            }

        else if(auth()->user()->roles == 2)

            {
                Auth::user()->last_login = new DateTime();
                Auth::user()->save();

                return redirect()->route('dashboard');
            }

            else if(auth()->user()->roles == 3)

            {
                Auth::user()->last_login = new DateTime();
                Auth::user()->save();

                return redirect()->route('contest.dashboard');
            }
    else
        {

            return Redirect::back();
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
