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
        return view('auth.login');
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
            $executive_office_account = Auth::user();

            switch ($executive_office_account->executive_office) {
                case 'AS':
                    return redirect()->intended('/administrative-service')->with('executive_office_account', $executive_office_account);
                case 'LD':
                    return redirect()->intended('/legal-division')->with('executive_office_account', $executive_office_account);
                case 'CO':
                    return redirect()->intended('/certification-office')->with('executive_office_account', $executive_office_account);
                case 'FMS':
                    return redirect()->intended('/financial-and-management-service')->with('executive_office_account', $executive_office_account);
                case 'NITESD':
                    return redirect()->intended('/national-institute-for-technical-education-and-skills-development')->with('executive_office_account', $executive_office_account);
                case 'PIAD':
                    return redirect()->intended('/public-information-and-assistance-division')->with('executive_office_account', $executive_office_account);
                case 'PO':
                    return redirect()->intended('/planning-office')->with('executive_office_account', $executive_office_account);
                case 'PLO':
                    return redirect()->intended('/partnership-and-linkages-office')->with('executive_office_account', $executive_office_account);
                case 'ROMO':
                    return redirect()->intended('/regional-operations-management-office')->with('executive_office_account', $executive_office_account);
                default:
                    return redirect()->intended('/dashboard')->with('executive_office_account', $executive_office_account);
            }
        }
    
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),   
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
