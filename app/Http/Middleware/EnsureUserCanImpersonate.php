<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Lab404\Impersonate\Services\ImpersonateManager;

class EnsureUserCanImpersonate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->canImpersonate()) {
            return redirect()->route('dashboard')->with('error', 'You are not allowed to impersonate users.');
        }

        return $next($request);
    }
}
