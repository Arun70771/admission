<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\PgResponse;
use App\Models\PaymentResponse;
use App\Models\RegistrationForm;
use Session;
use Hashids\Hashids;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Otp;
use Carbon\Carbon;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Log;



class OtpController extends Controller
{   

    protected $hashids;

    public function __construct()
    {
        $this->hashids = new Hashids('sau', 4);
    }


    public function sendOtp(Request $request)
    {
        // Validate the request
        $request->validate([
            'application_id' => 'required',
        ]);

        // Generate a 4-digit OTP
        $otp = $this->generateOtp();

        // Set OTP expiration time (e.g., 10 minutes from now)
        $expiresAt = Carbon::now()->addMinutes(10);
        Otp::updateOrCreate(
            ['application_id' => $request->application_id],
            [
                'otp' => $otp, 
                'expires_at' => $expiresAt
            ]
        );

        $registration = RegistrationForm::find($request->application_id);
        $userName = $registration->candidate_name;
        $encodedId = $this->hashids->encode($registration->id);
        $validity = 10;
        Mail::to($registration->email)->send(new OtpMail($userName,$otp,$validity));
            
        return redirect()->route('otp', ['encodedId' => $encodedId])
        ->with('success', 'OTP sent successfully!');
    }


        
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'application_id' => 'required',
            'otp' => 'required|digits:4', // Ensure OTP is exactly 4 digits
        ]);

        $encodedId = $request->application_id;
        $decoded = $this->hashids->decode($request->application_id);
        $application_id = isset($decoded[0]) ? $decoded[0] : null;
        $otpRecord = Otp::where('application_id', $application_id)
                        ->where('otp', $request->otp)
                        ->first();

        // Check if OTP exists and is not expired
        if ($otpRecord && Carbon::now()->lt($otpRecord->expires_at)) {
            // OTP is valid
            $otpRecord->delete();
            
       $registration = RegistrationForm::find($application_id);

        // Assume user registration logic here

        $registrationNumber = 'D'.str_pad((100000+$application_id), 6, '0', STR_PAD_LEFT);
        $email = $registration->email;
        $password = $registration->plain_password;
        $userEmail = $registration->email;
        $userName  = $registration->candidate_name;
      
        // Send the email

        Mail::to($userEmail)->send(new RegistrationSuccessful($userName, $registrationNumber,$email,$password));   


        try {
           
            if ($registration) {
                $registration->is_verified = 1;
                $registration->save();
            }    

        } catch (\Exception $e) {
            Log::error('Failed to send registration email to: ' . $userEmail . '. Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email. Please try again.');
        }


            return redirect()->route('login')->with('success', 'OTP verified successfully!');
        } else {
           // dd($encodedId);
            return redirect()
            ->route('otp', ['encodedId' => $encodedId])
            ->with('error', 'Invalid or expired OTP.');

        }
    }

    public function resendOtp(Request $request)
    {
        // Validate the request
        $request->validate([
            'application_id' => 'required',
        ]);

        $decoded = $this->hashids->decode($request->application_id);
        $application_id = isset($decoded[0]) ? $decoded[0] : null;


        // Generate a 4-digit OTP
        $otp = $this->generateOtp();

        // Set OTP expiration time (e.g., 10 minutes from now)
        $expiresAt = Carbon::now()->addMinutes(10);
        Otp::updateOrCreate(
            ['application_id' => $application_id],
            [
                'otp' => $otp, 
                'expires_at' => $expiresAt
            ]
        );

        $registration = RegistrationForm::find($application_id);
        $userName = $registration->candidate_name;
        $encodedId = $this->hashids->encode($registration->id);
        $validity = 10;
        Mail::to($registration->email)->send(new OtpMail($userName,$otp,$validity));

        return response()->json(['message' => 'New OTP sent successfully!']);
    }


    function generateOtp()
    {
        return str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generates a 4-digit OTP
    }

}
