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
        // Validate the request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($credentials)) {
            // If authentication fails, throw validation exception with error messages
            throw ValidationException::withMessages([
                'email' => 'The provided email does not match our records.',
                'password' => 'The provided password is incorrect.',
            ]);
        }

        // If authentication succeeds, regenerate the session
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Redirect based on executive_office column value
        if ($user->executive_office === 'ROMD') {
            return redirect()->intended('/regional-operations-management-division');
        } else {
            return redirect()->intended('/executive-office-dashboard');
        } 
    // } elseif ($user->executive_office === 'RO') {
    //     return redirect()->intended('/regional-office');
    // } 
        // else {
        //     return redirect()->intended('/executive-office-dashboard');
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
