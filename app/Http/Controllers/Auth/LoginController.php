<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            // If authenticated, redirect to the dashboard
            $user = Auth::user();
            if ($user->executive_office === 'ROMD') {
                return redirect('/regional-operations-management-division');
            } elseif ($user->executive_office === 'RO') {
                return redirect('/regional-office');
            } else {
                return redirect('/executive-office-dashboard');
            }
        }
        
        // If not authenticated, return the login form
        return response()->view('auth.login')->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                // Get the authenticated user
                $user = Auth::guard('web')->user();
    
                // Redirect based on executive_office column value
                if ($user->executive_office === 'ROMD'){
                    return redirect()->intended('/regional-operations-management-division');
                } elseif ($user->executive_office === 'RO') {
                    return redirect()->intended('/regional-office');
                } else {
                    return redirect()->intended('/executive-office-dashboard');
                }
            }
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),   
        ]);
     }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
