<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ApplicationForm;
use App\Models\Programme;
use App\Models\Course;
use App\Models\ModeOfAdmission;
use App\Models\StepStatus;

class ModeAdmissionController  extends Controller
{
    public function index(){
        $userId = Auth::id();
        $application_form = ApplicationForm::where('application_id', $userId)->first();
        $programme = Programme::where('application_id', $userId)->first();
        $mode = ModeOfAdmission::where('application_id', $userId)->first();
        $courses = Course::where('application_id', $userId)->get();
        $getAllSelecedMode = ModeOfAdmission::where('application_id', $userId)->pluck('mode_of_admission');

        if($mode){
            $action='edit';
        }else{
            $action='add';
        }
        $exists = StepStatus::where('application_id', Auth::id())->where('preview_finalsubmit', 1)->exists();      
        if($exists){
            $isEditMode = StepStatus::where('application_id', Auth::id())->where('edit_mode', 1)->exists();   
            if(!$isEditMode){
                return redirect()->route('application-status');
            }  
        }
        return view('web.mode-of-admissions',compact('getAllSelecedMode','programme','action','mode','courses','application_form'));
    }

    // Store the mode of admission
    public function store(Request $request)
    {
        

        $request->validate([
            'programme' => 'required|array', // Ensure programme is an array
            'programme.*' => 'required|string', // Validate each item in the array
            'mode_of_admission' => 'required|array', // Ensure mode_of_admission is an array
            'mode_of_admission.*' => 'required|string', // Validate each item in the array
        ]);

        $condition = ['application_id' => Auth::id()];
        ModeOfAdmission::where($condition)->delete();
        foreach ($request->programme as $index => $programme) {
            ModeOfAdmission::create([
                'programme' => $programme,
                'mode_of_admission' => $request->mode_of_admission[$index],
                'application_id' => Auth::id(),
                'programme_id' => Auth::id(),
            ]);
        }


        $stepStatus = StepStatus::where('application_id', Auth::id());
        $stepStatus->update([
            'mode_admission' => true
        ]);


        //return redirect()->back()->with('success', 'Mode of admission saved successfully!');
        return redirect()->route('index.educational-details')->with('success', 'Mode of admission has been saved successfully!');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'programme' => 'required|array', // Ensure programme is an array
            'programme.*' => 'required|string', // Validate each item in the array
            'mode_of_admission' => 'required|array', // Ensure mode_of_admission is an array
            'mode_of_admission.*' => 'required|string', // Validate each item in the array
        ]);

        $condition = ['application_id' => Auth::id()];
        ModeOfAdmission::where($condition)->delete();
        foreach ($request->programme as $index => $programme) {
            ModeOfAdmission::create([
                'programme' => $programme,
                'mode_of_admission' => $request->mode_of_admission[$index],
                'application_id' => Auth::id(),
                'programme_id' => Auth::id(),
            ]);
        }

        $stepStatus = StepStatus::where('application_id', Auth::id());
        $stepStatus->update([
            'mode_admission' => true
        ]);
        return redirect()->route('index.educational-details')->with('success', 'Mode of admission has been updated successfully!');

    }

}
