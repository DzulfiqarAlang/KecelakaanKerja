<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // 2. Prepare Credentials
        $credentials = $request->only('email', 'password');
        
        // 3. Check for "Remember Me" (checkbox sends 'on' or null)
        $remember = $request->has('remember');

        // 4. Attempt Login
        // Note: If you are using a custom guard for admins, use Auth::guard('admin')
        if (Auth::attempt($credentials, $remember)) {
            
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // 5. If failed
        return back()->withErrors([
            'login_error' => 'Email atau password salah.',
        ])->withInput($request->only('email')); // Keep the email in the input
    }
}