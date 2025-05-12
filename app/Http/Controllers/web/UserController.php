<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StepStatus;
use App\Models\RegistrationForm;
use Hashids\Hashids;

class UserController extends Controller
{
    protected $hashids;

    public function __construct()
    {
        $this->hashids = new Hashids('sau', 4);
    }


    public function home()
    {
        if (Auth::check()) {
            return redirect()->route('application-status');
        } else {
            return view('web.sign-in');
        }
       
    }  

    public function login(Request $request)
    {

        $check_otp = RegistrationForm::where('email', $request->email)->where('plain_password', $request->password)->where('is_verified', 0)->first();
        if($check_otp){
             $encodedId = $this->hashids->encode($check_otp->id);
             return redirect('/otp/' . $encodedId)->with('status', 'Please verify OTP first.');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('application-status');
        }

        return back()->withErrors(['email' => 'Invalid credentials. Please check your username and password and try again.']);
    }

    public function userLogout(Request $request)
    {
        Auth::guard('user')->logout();
        // Invalidate the session
        $request->session()->invalidate();
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        return redirect()->route('sign-in')->with('status', 'You have been logged out successfully.');
    }

}