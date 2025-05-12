<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\RegistrationForm;
use App\Models\User;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Validation\Rule;
use Str;
use App\Models\StepStatus;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;




class RegistrationFormController extends Controller
{   
    protected $hashids;

    public function __construct()
    {
        $this->hashids = new Hashids('sau', 4);
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'candidate_name' => 'required|string|max:255',
            'father_name' => 'string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'email' => 'required|email|unique:registration_forms,email',
            'nationality' => 'required|string',
           // 'country_code' => 'required|string',
            'mobile' => 'required|string|unique:registration_forms,mobile',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $validated['plain_password'] = $request->password;

        //dd($validated);

        $registration = RegistrationForm::create($validated);
        $encodedId = $this->hashids->encode($registration->id);

        $user = new User();
        $user->id = $registration->id;
        $user->name = $request->candidate_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

                
        return redirect()->route('registration.review', ['encodedId' => $encodedId])
        ->with('success', 'Please verify your details and proceed to complete your registration.');

    }

    public function edit($encodedId)
    {
        // Decode the encodedId to get the original ID
        $decodedId = $this->hashids->decode($encodedId)[0] ?? null;

      

        if (!$decodedId) {
            abort(404, 'Invalid registration ID.');
        }

        // Fetch the registration details using the decoded ID
        $registration = RegistrationForm::findOrFail($decodedId);
        // Pass the data to the view
        return view('web.registration-form', compact('registration', 'encodedId'));
    }

    public function update(Request $request, $encodedId)
        {
            // Decode the encoded ID
            $id = $this->hashids->decode($encodedId)[0] ?? null;

            // Find the record or throw a 404 error if not found
            $registration = RegistrationForm::findOrFail($id);

            // Validate the incoming request
            $validated = $request->validate([
                'candidate_name' => 'required|string|max:255',
                'father_name' => 'required|string|max:255',
                'dob' => 'required|date',
                'gender' => 'required|in:Male,Female,Other',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('registration_forms', 'email')->ignore($registration->id),
                ],
              //  'nationality' => 'required|string|max:100',
              //  'country_code' => 'required|string|max:10',
                'mobile' => [
                    'required',
                    'string',
                    Rule::unique('registration_forms', 'mobile')->ignore($registration->id),
                ],
                'password' => 'required|string|min:3|confirmed', // Password update is optional
            ]);

            $validated['plain_password'] = $request->password;
            $registration->update($validated);
            Auth::guard('user')->logout();
            return redirect()->route('registration.review', ['encodedId' => $encodedId])
                ->with('success', 'Your details have been updated successfully.');

        }



    public function review($encodedId)
    {

        $decodedId = $this->hashids->decode($encodedId)[0] ?? null;
        if (!$decodedId) {
            abort(404, 'Invalid registration ID.');
        }

        $registration = RegistrationForm::findOrFail($decodedId);
        return view('web.review-registration', compact('registration','encodedId'));

    }

    public function otp(){
        return view('web.otp');
    }

    public function forgot(){
        return view('web.forgot');
    }


    public function confirm_password(){
        return view('web.confirm_password');
    }

}
