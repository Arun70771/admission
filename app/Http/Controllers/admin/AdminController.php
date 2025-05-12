<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

   
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        // Invalidate the session
        $request->session()->invalidate();
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('status', 'Admin logged out successfully.');
    }


}
