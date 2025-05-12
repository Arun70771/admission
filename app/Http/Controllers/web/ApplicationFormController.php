<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ApplicationForm;
use App\Models\RegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\StepStatus;


class ApplicationFormController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Check if there is an application for the current user
        $applications = ApplicationForm::where('application_id', $userId)->first();
        if ($applications) {
            $action = "edit";
        } else {
            // Fetch data from RegistrationForm if ApplicationForm does not exist
            $applications = RegistrationForm::where('id', $userId)->first();
            $action = "add";
        }

        $exists = StepStatus::where('application_id', Auth::id())->where('preview_finalsubmit', 1)->exists();      
        if($exists){
            $isEditMode = StepStatus::where('application_id', Auth::id())->where('edit_mode', 1)->exists();   
            if(!$isEditMode){
                return redirect()->route('application-status');
            }          
        }
        return view('web.application-form', compact('applications', 'action'));
    }


    public function create()
    {
        return view('application_forms.create');
    }

    
    public function store(Request $request)
    {
        $rules = [
            'correspondence_house' => 'required|string|max:255',
            'correspondence_city' => 'required|string|max:255',
            'correspondence_district' => 'required|string|max:255',
            'correspondence_country' => 'required|string|max:255',
            'correspondence_state' => 'required|string|max:255',
            'correspondence_zip' => 'required|string|max:20',
            'permanent_house' => 'required|string|max:255',
            'permanent_city' => 'required|string|max:255',
            'permanent_district' => 'required|string|max:255',
            'permanent_country' => 'required|string|max:255',
            'permanent_state' => 'required|string|max:255',
            'permanent_zip' => 'required|string|max:20',
        ];
        
        // Perform validation
        $validator = Validator::make($request->all(), $rules);
        
                try {
                    // Create a new application
                    $registration = RegistrationForm::find(Auth::id());
                    $application = new ApplicationForm();
                    $application->application_id = Auth::id();
                    
                    $application->candidate_name = $request->candidate_name;
                    $application->father_name = $request->father_name;
                    $application->dob = $request->dob;
                    $application->gender = $request->gender;
                    $application->nationality = $request->nationality;
                    $application->email = $request->email;
                    $application->mobile = $request->mobile;

                    $application->correspondence_house = $request->correspondence_house;
                    $application->correspondence_city = $request->correspondence_city;
                    $application->correspondence_district = $request->correspondence_district;
                    $application->correspondence_country = $request->correspondence_country;
                    $application->correspondence_state = $request->correspondence_state;
                    $application->correspondence_zip = $request->correspondence_zip;
                    $application->permanent_house = $request->permanent_house;
                    $application->permanent_city = $request->permanent_city;
                    $application->permanent_district = $request->permanent_district;
                    $application->permanent_country = $request->permanent_country;
                    $application->permanent_state = $request->permanent_state;
                    $application->permanent_zip = $request->permanent_zip;
                    $application->save();

                    StepStatus::where('application_id', Auth::id())->delete();
                    $step_status = new StepStatus();     
                    $step_status->application_form = true;
                    $step_status->application_id = Auth::id();
                    $step_status->save();               

        
                    // Redirect with success message
                    return redirect()->route('programme.index')->with('success', 'The application form has been created successfully!');
                } catch (\Exception $e) {
                    // Handle errors
                    return redirect()->back()->with('error', 'An error occurred while creating the application: ' . $e->getMessage());
                }
    }

    public function update(Request $request, $id)
        {


          
            // Validation rules
            $rules = [
                // 'candidate_name' => 'required|string|max:255',
                // 'father_name' => 'required|string|max:255',
                // 'mother_name' => 'required|string|max:255',
                // 'guardian_name' => 'nullable|string|max:255',
                // 'dob' => 'required|date',
                'gender' => 'required|string|in:Male,Female,Other',
                'nationality' => 'required|string|max:100',
                'email' => 'required|email|max:255|unique:application_forms,email,' . $id,
                'mobile' => 'required|string|min:10|max:15',
                'correspondence_house' => 'required|string|max:255',
                'correspondence_city' => 'required|string|max:255',
                'correspondence_district' => 'required|string|max:255',
                'correspondence_country' => 'required|string|max:255',
                'correspondence_state' => 'required|string|max:255',
                'correspondence_zip' => 'required|string|max:20',
                'permanent_house' => 'required|string|max:255',
                'permanent_city' => 'required|string|max:255',
                'permanent_district' => 'required|string|max:255',
                'permanent_country' => 'required|string|max:255',
                'permanent_state' => 'required|string|max:255',
                'permanent_zip' => 'required|string|max:20',
            ];

            // Perform validation
            $validator = Validator::make($request->all(), $rules);


         

            if ($validator->fails()) {
                // Return validation errors
                return redirect()->back()->withErrors($validator)->withInput();
            }

            try {
                // Find the application record for the authenticated user
                $application = ApplicationForm::findOrFail($id);

                // Update the application record
               
              

                $application->candidate_name = $request->candidate_name;
                $application->father_name = $request->father_name;
                $application->dob = $request->dob;
                $application->gender = $request->gender;
                $application->nationality = $request->nationality;
                $application->email = $request->email;
                $application->mobile = $request->mobile;
                

                $application->correspondence_house = $request->correspondence_house;
                $application->correspondence_city = $request->correspondence_city;
                $application->correspondence_district = $request->correspondence_district;
                $application->correspondence_country = $request->correspondence_country;
                $application->correspondence_state = $request->correspondence_state;
                $application->correspondence_zip = $request->correspondence_zip;
                $application->permanent_house = $request->permanent_house;
                $application->permanent_city = $request->permanent_city;
                $application->permanent_district = $request->permanent_district;
                $application->permanent_country = $request->permanent_country;
                $application->permanent_state = $request->permanent_state;
                $application->permanent_zip = $request->permanent_zip;
                $application->save();

                $stepStatus = StepStatus::where('application_id', Auth::id());
                $stepStatus->update([
                    'application_form' => true
                ]);

                
                
                // Redirect with success message
                return redirect()->route('programme.index')->with('success', '<i class="fa-solid fa-circle-check"></i> The application form has been successfully updated!');
            } catch (\Exception $e) {
                // Handle errors
                return redirect()->back()->with('error', 'An error occurred while updating the application: ' . $e->getMessage());
            }
        }




    public function show(ApplicationForm $applicationForm)
    {
        return view('application_forms.show', compact('applicationForm'));
    }

    public function edit(ApplicationForm $applicationForm)
    {
        return view('application_forms.edit', compact('applicationForm'));
    }

}

