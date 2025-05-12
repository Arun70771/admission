<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Str;
use App\Models\Registion;
use App\Models\TempUserdata;
use App\Models\Admission;
use Mail;
use App\Mail\OtpMail;
use App\Mail\UserIdPasswordMail;

use Swift_TransportException;
use Illuminate\Mail\Mailables\Address;



class LoginController extends Controller
{

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email'   => 'required',
            'password'   => 'required'
        ]);

        //$password   =   Crypt::encrypt($request->password);
        $password   =   $request->password;
        $data = Registion::where('email', $request->email)->where('password', $request->password)->first();


        if ($data) {

            // echo $request->password;
            // echo "<br>";
            // echo Hash::make($request->password);
            // echo "<br>";
            // echo $data->td_password;
            // die;
            session(['user' => $data]);
            return redirect('step1');
        } else {
            return redirect('SignIn')->with('warning', 'Please enter correct email/password');
        }
    }


    public function userRegister(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
            'mobile' => 'required',
            'term_condition' => 'required',
            'g-recaptcha-response' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please provide a valid email address',
            'email.regex' => 'Please provide a valid email format',
            'mobile.required' => 'Mobile is required',
            'mobile.regex' => 'Please provide a valid mobile number with the correct format',
            'term_condition.required' => 'Term & Condition is required',
            'g-recaptcha-response.required' => 'Captcha must be accepted',
        ]);


        DB::table('temp_userdatas')->where('email', $request->email)->delete();

        $otp = random_int(1000, 9999);
        $info        =   new TempUserdata;
        $info->name              =   $request->name;
        $info->email          =   $request->email;
        $info->programme          =   $request->programme;
        $info->mobile             =   $request->mobile;
        $info->password       =     Hash::make(Str::random(5));
        $info->pass       =    Str::random(5);
        $info->otp                = $otp;
        $info->profile_status = '0';
        $info->save();
        $data = TempUserdata::where('id', $info->id)->where('profile_status', '0')->first();

        if ($data) {
            $user_data     =   TempUserdata::find($info->id);
            $mailData = [
                'name' => $user_data->name,
                'otp' => $user_data->otp
            ];

            // Mail::to($user_data->email)->send(new OtpMail($mailData));

            try {
                // Attempt to send the OTP email
                Mail::to($user_data->email)->send(new OtpMail($mailData));
            } catch (\Exception $e) {
                // Check for a specific Gmail SMTP error related to sending limits
                if ($e instanceof Swift_TransportException) {
                    // Check the exception message for Gmail's sending limit exceeded error
                    if (strpos($e->getMessage(), '550-5.4.5 Daily user sending limit exceeded') !== false) {
                        // Log the error (optional for debugging)
                        \Log::error('Gmail daily sending limit exceeded for email: ' . $user_data->email);

                        // Redirect back with a validation-like error message
                        return redirect()->back()->withErrors([
                            'email_error' => 'Sorry, email delivery failed. You have exceeded the daily email sending limit. Please try again later.'
                        ]);
                    }
                }

                // If it's another type of error, log it and return a generic error message
                \Log::error('Email failed to send: ' . $e->getMessage());

                return redirect()->back()->withErrors([
                    'email_error' => 'There was an error sending the email. Please try again later.'
                ]);
            }



            return redirect('otp/' . Crypt::encrypt($info->id))->with('success', 'Check your mail for verification and mail check in spam also.');
        }
    }



    public function logout()
    {
        session(['user' => '']);
        return redirect('SignIn');
    }


    public function dashboard()
    {
        $id = Session::get('user')->id;
        $data = session("user");
    }

    public function otp($id)
    {
        $id =   Crypt::decrypt($id);
        return view('otp');
    }



    public function verifyOtp(Request $request)
    {

        $request->validate([
            // 'userid'   => 'required',
            'otp'   => 'required'
        ]);

        $tempUser     =   TempUserdata::where('id', Crypt::decrypt($request->userId))->where('otp', $request->otp)->first();
        if ($tempUser) {

            //   dd($tempUser);

            $registion        =   new Registion;
            $registion->id              =   $tempUser->id;
            $registion->name          =   $tempUser->name;
            $registion->email             =   $tempUser->email;
            $registion->mobile       =   $tempUser->mobile;
            $registion->password       =     $tempUser->pass;
            //  $registion->profile_status ='1';
            $registion->save();

            $admission        =   new Admission;
            $admission->id         =   $tempUser->id;
            $admission->step       =   0;
            $admission->is_complate =   0;
            $admission->name       =   $tempUser->name;
            $admission->programme  =   $tempUser->programme;
            $admission->email      =   $tempUser->email;
            $admission->mobile     =   $tempUser->mobile;
            $admission->save();

            $mailData = [
                'name' =>  $tempUser->name,
                'email' =>  $tempUser->email,
                'password' => $tempUser->pass
            ];
            Mail::to($tempUser->email)->send(new UserIdPasswordMail($mailData));
            session(['user' => $registion]);
            return redirect('step1/')->with('success', 'Your SAU Admission Portal Login Details has been sent in registered email id ');
        } else {
            return redirect('otp/' . $request->userId)->with('warning', 'I have entered the wrong OTP.');
        }
    }

    public function forget(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email|exists:registrations,email', // Ensure email is valid and exists in the database
        ]);

        try {
            // Find the user based on email
            $tempUser = Registion::where('email', $request->email)->first();

            if ($tempUser) {
                // Prepare email data
                $mailData = [
                    'name' => $tempUser->name,
                    'email' => $tempUser->email,
                    'password' => $tempUser->password,
                ];

                // Send email
                Mail::to($tempUser->email)->send(new UserIdPasswordMail($mailData));

                // Return success message
                return redirect('SignIn/')->with('success', 'Your SAU Admission Portal Login Details have been sent to your registered email id.');
            } else {
                // If no user is found
                return redirect('SignIn/')->with('warning', 'Please enter a correct email ID.');
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Error sending email: ' . $e->getMessage());

            // Return a failure message to the user
            return redirect('SignIn/')->with('error', 'There was an error sending the email. Please try again later.');
        }
    }
}
