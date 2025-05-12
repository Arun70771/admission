<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Course;
use App\Models\StepStatus;
use App\Models\CoursePayment;

class ChooseProgramsController extends Controller
{
    public function index(){
        
        $programme = Programme::where('application_id',Auth::id())->first();
        $course = Course::where('application_id',Auth::id())->get();
        $bachelor_courses = CoursePayment::where('programme_name','Bachelor')->get();
        $master_courses = CoursePayment::where('programme_name','Master')->get();
        $php_courses = CoursePayment::where('programme_name','PhD')->get();
        $executive_php_courses = CoursePayment::where('programme_name','Executive PhD')->get();
        $virtual_campus_courses = CoursePayment::where('programme_name','Virtual Campus')->get();
        $exists = StepStatus::where('application_id', Auth::id())->where('preview_finalsubmit', 1)->exists();      
        if($exists){
            $isEditMode = StepStatus::where('application_id', Auth::id())->where('edit_mode', 1)->exists();   
            if(!$isEditMode){
                return redirect()->route('application-status');
            }  
        }
        return view('web.choose-programs',compact('virtual_campus_courses','executive_php_courses','bachelor_courses','master_courses','php_courses','course','programme'));
    }

    // Store the programme and courses
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'programme' => 'required|string',
            'courses' => 'required|array|max:20',
            'courses.*' => 'string',
        ], [
            'programme.required' => 'The Programme field is required.',
            'programme.string' => 'The Programme must be a string.',
            'courses.required' => 'The Select Courses field is required.',
            'courses.array' => 'The courses must be an array.',
            'courses.max' => 'You can select a maximum of 20 courses.',
            'courses.*.string' => 'Each course must be a string.',
        ]);

        Programme::where('application_id', Auth::id())->delete();
        Course::where('application_id', Auth::id())->delete();

        $totalFee = 0; // Initialize total fee variable
        foreach ($request->courses as $courseName) {
            $fee = $this->getCourseFee($courseName); // Get the fee for the current course
            $totalFee += $fee; // Add the current fee to the total
        }

        // Create the programme
        $programme = Programme::create([
            'programme' => $request->programme,
            'course_fee' => $totalFee,
            'application_id' => Auth::id(),
        ]);

        
        $stepStatus = StepStatus::where('application_id', Auth::id());
        $stepStatus->update([
            'programme_course' => true
        ]);

        // Attach courses to the programme
        foreach ($request->courses as $courseName) {
            $course = Course::create([
                'course_name' => $courseName,
                'course_fee' => $this->getCourseFee($courseName), // Implement this method to get the fee
                'programme_id' => $programme->id,
                'application_id' => Auth::id(),
            ]);
        }

        return redirect()->route('index.mode-of-admissions')->with('success', 'Program and courses have been saved successfully!');
    }

    // Update the programme and courses
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'programme' => 'required|string',
            'courses' => 'required|array|max:2',
            'courses.*' => 'string',
        ], [
            'programme.required' => 'The programme field is required.',
            'programme.string' => 'The programme must be a string.',
            'courses.required' => 'The courses field is required.',
            'courses.array' => 'The courses must be an array.',
            'courses.max' => 'You can select a maximum of 2 courses.',
            'courses.*.string' => 'Each course must be a string.',
        ]);

        // Find the programme
        $programme = Programme::findOrFail($id);

        // Update the programme
        $programme->update([
            'name' => $request->programme,
        ]);

        // Delete existing courses and attach new ones
        $programme->courses()->delete();
        foreach ($request->courses as $courseName) {
            $course = Course::create([
                'name' => $courseName,
                'fee' => $this->getCourseFee($courseName), // Implement this method to get the fee
                'programme_id' => $programme->id,
            ]);
        }

        return redirect()->back()->with('success', 'Program and courses have been updated successfully!');
    }

    private function getCourseFee($courseName)
    {
        $coursePayment = CoursePayment::where('slug', $courseName)->first();
        return $coursePayment ? $coursePayment->reg_fee : 0;
    }

    // private function getCourseFee($courseName)
    // {
    //     $fees = [
    //         'btech-cse' => 1740,
    //         'btech-cse' => 1740,
    //         'dual-btech-mtech-cse' => 1740,
    //         'btech-mathematics' => 1740,
    //         'bs-interdisciplinary' => 1740,
    //         'bba' => 1740,
    //         'msc-applied-mathematics' => 1740,
    //         'msc-biotechnology' => 1740,
    //         'msc-computer-science' => 1740,
    //         'mtech-computer-science' => 1740,
    //         'integrated-msc-mtech' => 1740,
    //         'ma-economics' => 1740,
    //         'ma-international-relations' => 1740,
    //         'ma-sociology' => 1740,
    //         'llm' => 1740,
    //         'mba' => 1740,
    //         'mca' => 1740,
    //         'phd-biotechnology' => 1740,
    //         'phd-computer-science' => 1740,
    //         'phd-economics' => 1740,
    //         'phd-international-relations' => 1740,
    //         'phd-legal-studies' => 1740,
    //         'phd-legal-studies' => 1740,
    //         'phd-sociology' => 1740,
    //         'phd-media-arts' => 1740,
    //         'phd-physics' => 1740,
    //         'exec-phd-biotechnology' => 1740,
    //         'exec-phd-computer-science' => 1740,
    //         'exec-phd-economics' => 1740,
    //         'exec-phd-international-relations' => 1740,
    //         'exec-phd-legal-studies' => 1740,
    //         'exec-phd-mathematics' => 1740,
    //         'exec-phd-sociology' => 1740,
    //         'exec-phd-media-arts' => 1740,
    //         'exec-phd-physics' => 1740,
    //     ];

    //     return $fees[$courseName] ?? 0;
    // }


}
