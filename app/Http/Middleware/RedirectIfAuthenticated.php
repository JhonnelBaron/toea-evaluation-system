<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            // Get the authenticated user
            $user = Auth::guard('web')->user();

            // Redirect based on executive_office column value
            if ($user->executive_office === 'ROMD') {
                return redirect('/regional-operations-management-division');
            } elseif($user->executive_office === 'RO') {
                return redirect('/regional-office');
            }else {
                return redirect('/executive-office-dashboard');
            }
        }

        return $next($request);
    }
}
