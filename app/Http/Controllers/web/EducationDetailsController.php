<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducationalDetail;
use App\Models\Programme;
use App\Models\ModeOfAdmission;
use App\Models\Course;
use App\Models\CoursePayment;
use App\Models\ScoreModeOfAdmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\StepStatus;
use Illuminate\Validation\Rule;
use DB;


class EducationDetailsController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $data = EducationalDetail::where('application_id', $userId)->first();
        $programme = Programme::where('application_id', $userId)->first();
        $national_eligibility_test = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'National Level Eligibility Test')->first();
        $marks_qualifying_examination = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'Marks of Qualifying Examination')->first();
       
        ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET PG')->first();


        $preview_finalsubmit= StepStatus::where('preview_finalsubmit', 1)->where('application_id', Auth::id());
        $payment_complate= StepStatus::where('payment_complate', 1)->where('application_id', Auth::id());

        if($data){
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

        $CUET_UG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET UG')->exists();
        $JEE_Mains = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JEE Mains')->exists();
        $CUET_PG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET PG')->exists();
        $CAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CAT')->exists();
        $GATE = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GATE')->exists();
        $GMAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GMAT')->exists();
        $XAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'XAT')->exists();
        $JRF =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JRF')->exists();
        $funded_government =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'funded_government')->exists();
        $salaried = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'salaried')->exists();
        $any_other = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'any-other')->exists();

        $courses = Course::where('application_id', $userId)->get();
        $coursepayment = CoursePayment::get();
        // Define the exams array
        $exam = [
            'CUET UG' => $CUET_UG,
            'JEE Mains' => $JEE_Mains,
            'CUET PG' => $CUET_PG,
            'CAT' => $CAT,
            'GATE' => $GATE,
            'GMAT' => $GMAT,
            'XAT' => $XAT,
            'JRF' => $JRF,
            'funded_government' => $funded_government,
            'salaried' => $salaried,
            'any-other' => $any_other,
        ];

        $exams = array_filter($exam, fn($value) => $value === true);


        // Passing 'exams' to the view
        return view('web.educational-details', compact('courses','coursepayment','exams', 'data', 'action', 'programme', 'national_eligibility_test', 'marks_qualifying_examination'));

    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $programme = Programme::where('application_id', $userId)->first();
        $national = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'National Level Eligibility Test')->first();
        $marks = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'Marks of Qualifying Examination')->first();

        $CUET_UG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET UG')->exists();
        $JEE_Mains = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JEE Mains')->exists();
        $CUET_PG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET PG')->exists();
        $CAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CAT')->exists();
        $GATE = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GATE')->exists();
        $GMAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GMAT')->exists();
        $XAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'XAT')->exists();
        $JRF =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JRF')->exists();
        $funded_government =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'funded_government')->exists();
        $salaried = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'salaried')->exists();
        $any_other = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'any-other')->exists();
        $exams = [
            'CUET UG' => $CUET_UG,
            'JEE Mains' => $JEE_Mains,
            'CUET PG' => $CUET_PG,
            'CAT' => $CAT,
            'GATE' => $GATE,
            'GMAT' => $GMAT,
            'XAT' => $XAT,
            'JRF' => $JRF,
            'funded_government' => $funded_government,
            'salaried' => $salaried,
            'any-other' => $any_other,
        ];


        $rules = [
            'board_10th' => 'required|string|max:255',
            'marks_10th' => 'required|numeric|max:100',
            'passing_year_10th' => 'required|string|max:255',

            
            'board_12th' => 'nullable|string|max:255',
            'marks_12th' => 'nullable|numeric|max:100',
            'passing_status_12th' => 'nullable|string|max:255',
            'passing_year_12th' => 'nullable|string|max:255',
            'specialization_12th' => 'nullable|string|max:255',

            'board_bachelors' => 'nullable|string|max:255',
            'marks_bachelors' => 'nullable|numeric|max:100',
            'passing_status_bachelor' => 'nullable|string|max:255',
            'passing_year_bachelor' => 'nullable|string|max:255',
            'specialization_bachelor' => 'nullable|string|max:255',

            'board_masters' => 'nullable|string|max:255',
            'marks_masters' => 'nullable|numeric|max:100',
            'passing_status_master' => 'nullable|string|max:255',
            'passing_year_master' => 'nullable|numeric|max:255',
            'specialization_master' => 'nullable|string|max:255',

            'national_eligibility_name' => 'nullable|string|max:100',
            'passing_status_national' => 'nullable|string|max:100',
            'passing_year_national' => 'nullable|string|max:100',
            'score_national' => 'nullable|string|max:100',
            'marks_name_of_degree' => 'nullable|string|max:100',
            'passing_status_qualifying' => 'nullable|string|max:100',
            'passing_year_qualifying' => 'nullable|numeric|max:100',
            'score_qualifying' => 'nullable|string|max:100',
            'upload_score' => 'nullable|string|max:100',
        ];

        if ($programme->programme == 'masters') {
            $rules['board_bachelors'] = 'required|string|max:255';
            $rules['marks_bachelors'] = 'required|string|max:100';
            $rules['passing_status_bachelor'] = 'required|string|max:255';
            $rules['passing_year_bachelor'] = 'required|string|max:255';
            $rules['specialization_bachelor'] = 'required|string|max:255';
            
        } elseif ($programme->programme == 'phd' || $programme->programme == 'executivePhd') {
            $rules['board_masters'] = 'required|string|max:255';
            $rules['marks_masters'] = 'required|string|max:100';
            $rules['passing_status_master'] = 'required|string|max:255';
            $rules['passing_year_master'] = 'required|string|max:255';
            $rules['specialization_master'] = 'required|string|max:255';
        }

        if ($national) {
            $rules['national_eligibility_name'] = 'required|string|max:255';
            $rules['passing_status_national'] = 'required|string|max:100';
            $rules['passing_year_national'] = 'required|string|max:255';
            $rules['score_national'] = 'nullable|string|max:255';
        }

        if ($marks) {
            $rules['marks_name_of_degree'] = 'required|string|max:255';
            $rules['passing_status_qualifying'] = 'required|string|max:100';
            $rules['passing_year_qualifying'] = 'required|string|max:255';
            $rules['score_qualifying'] = 'nullable|string|max:255';
            $rules['upload_score'] = 'nullable|string|max:255';
        }


        // Loop through exams to dynamically generate validation rules
        // foreach ($exams as $exam => $status) {
        //     if ($status) {
        //         $exam_key = strtolower(str_replace(' ', '_', $exam));

        //         // Dynamically generate rules for each exam
        //         $rules["{$exam_key}_name"] = 'required|string|max:255';
        //         $rules["passing_status_{$exam_key}"] = 'required|string|in:Apearing,Passed';
        //         $rules["passing_year_{$exam_key}"] = 'required|string|max:255';
        //         $rules["score_{$exam_key}"] = 'required|numeric|min:0|max:100';
        //     }
        // }

        $messages = [
            'board_10th.required' => 'The 10th board field is required.',
            'marks_10th.required' => 'The 10th marks field is required.',
            'marks_10th.numeric' => 'The 10th marks must be a number.',
            'marks_10th.max' => 'The 10th marks cannot exceed 100.',
            'board_bachelors.required' => 'The bachelors board field is required for masters programme.',
            'marks_bachelors.required' => 'The bachelors marks field is required for masters programme.',
            'board_masters.required' => 'The masters board field is required for PhD or Executive PhD programme.',
            'marks_masters.required' => 'The masters marks field is required for PhD or Executive PhD programme.',
        ];



        $request->validate($rules, $messages);

    try {
        $educationalDetail = new EducationalDetail();
        $educationalDetail->application_id = Auth::id();
        $educationalDetail->board_10th = $request->board_10th;
        $educationalDetail->marks_10th = $request->marks_10th;
        $educationalDetail->passing_year_10th = $request->passing_year_10th;
        $educationalDetail->board_12th = $request->board_12th;
        $educationalDetail->marks_12th = $request->marks_12th;
        $educationalDetail->board_bachelors = $request->board_bachelors;
        $educationalDetail->marks_bachelors = $request->marks_bachelors;
        $educationalDetail->board_masters = $request->board_masters;
        $educationalDetail->marks_masters = $request->marks_masters;

        $educationalDetail->passing_status_12th = $request->passing_status_12th;
        $educationalDetail->passing_year_12th = $request->passing_year_12th;
        $educationalDetail->specialization_12th = $request->specialization_12th;

        $educationalDetail->passing_status_bachelor = $request->passing_status_bachelor;
        $educationalDetail->passing_year_bachelor = $request->passing_year_bachelor;
        $educationalDetail->specialization_bachelor = $request->specialization_bachelor;

        $educationalDetail->passing_status_master = $request->passing_status_master;
        $educationalDetail->passing_year_master = $request->passing_year_master;
        $educationalDetail->specialization_master = $request->specialization_master;

        $educationalDetail->national_eligibility_name = $request->national_eligibility_name;
        $educationalDetail->passing_status_national = $request->passing_status_national;
        $educationalDetail->passing_year_national = $request->passing_year_national;
        $educationalDetail->score_national = $request->score_national;
        $educationalDetail->marks_name_of_degree = $request->marks_name_of_degree;
        $educationalDetail->passing_status_qualifying = $request->passing_status_qualifying;
        $educationalDetail->passing_year_qualifying = $request->passing_year_qualifying;
        $educationalDetail->score_qualifying = $request->score_qualifying;
        $educationalDetail->upload_score = $request->upload_score;
        $educationalDetail->save();

        $stepStatus = StepStatus::where('application_id', Auth::id());
        $stepStatus->update([
            'educational_details' => true
        ]);




        return redirect()->route('index.file-upload')->with('success', 'Educational details have been updated successfully!');
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error updating educational details: ' . $e->getMessage());

        return redirect()->back()->with('error', 'An error occurred while updating educational details.');
    }
}


    // Update educational details
    public function update(Request $request, $id)
    {
        $userId = Auth::id();
        $programme = Programme::where('application_id', $userId)->first();
        $national = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'National Level Eligibility Test')->first();
        $marks = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'Marks of Qualifying Examination')->first();

        $CUET_UG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET UG')->exists();
        $JEE_Mains = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JEE Mains')->exists();
        $CUET_PG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET PG')->exists();
        $CAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CAT')->exists();
        $GATE = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GATE')->exists();
        $GMAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GMAT')->exists();
        $XAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'XAT')->exists();
        $JRF =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JRF')->exists();
        $funded_government =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'funded_government')->exists();
        $salaried = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'salaried')->exists();
        $any_other = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'any-other')->exists();
        $exams = [
            'CUET UG' => $CUET_UG,
            'JEE Mains' => $JEE_Mains,
            'CUET PG' => $CUET_PG,
            'CAT' => $CAT,
            'GATE' => $GATE,
            'GMAT' => $GMAT,
            'XAT' => $XAT,
            'JRF' => $JRF,
            'funded_government' => $funded_government,
            'salaried' => $salaried,
            'any-other' => $any_other,
        ];


        $rules = [
            'board_10th' => 'required|string|max:255',
            'marks_10th' => 'required|string|max:100',
            'passing_year_10th' => 'required|string|max:255',
            'board_12th' => 'nullable|string|max:255',
            'marks_12th' => 'nullable|string|max:100',
            'passing_status_12th' => 'nullable|string|max:255',
            'passing_year_12th' => 'nullable|string|max:255',
            'specialization_12th' => 'nullable|string|max:255',
            'board_bachelors' => 'nullable|string|max:255',
            'marks_bachelors' => 'nullable|string|max:100',
            'passing_status_bachelor' => 'nullable|string|max:255',
            'passing_year_bachelor' => 'nullable|string|max:255',
            'specialization_bachelor' => 'nullable|string|max:255',

            'board_masters' => 'nullable|string|max:255',
            'marks_masters' => 'nullable|string|max:100',
            'passing_status_master' => 'nullable|string|max:255',
            'passing_year_master' => 'nullable|string|max:255',
            'specialization_master' => 'nullable|string|max:255',

            'national_eligibility_name' => 'nullable|string|max:100',
            'passing_status_national' => 'nullable|string|max:100',
            'passing_year_national' => 'nullable|string|max:100',
            'score_national' => 'nullable|string|max:100',

            'marks_name_of_degree' => 'nullable|string|max:100',
            'passing_status_qualifying' => 'nullable|string|max:100',
            'passing_year_qualifying' => 'nullable|string|max:100',
            'score_qualifying' => 'nullable|string|max:100',
            'upload_score' => 'nullable|string|max:100',

        ];

        if ($programme->programme == 'masters') {
            $rules['board_bachelors'] = 'required|string|max:255';
            $rules['marks_bachelors'] = 'required|string|max:100';
            $rules['passing_status_bachelor'] = 'required|string|max:255';
            $rules['passing_year_bachelor'] = 'required|string|max:255';
            $rules['specialization_bachelor'] = 'required|string|max:255';
        } elseif ($programme->programme == 'phd' || $programme->programme == 'executivePhd') {
            $rules['board_masters'] = 'required|string|max:255';
            $rules['marks_masters'] = 'required|string|max:100';
            $rules['passing_status_master'] = 'required|string|max:255';
            $rules['passing_year_master'] = 'required|string|max:255';
            $rules['specialization_master'] = 'required|string|max:255';
        }

        if ($national) {
            $rules['national_eligibility_name'] = 'required|string|max:255';
            $rules['passing_status_national'] = 'required|string|max:100';
            $rules['passing_year_national'] = 'required|string|max:255';
            $rules['score_national'] = 'nullable|string|max:255';
        }

        if ($marks) {
            $rules['marks_name_of_degree'] = 'required|string|max:255';
            $rules['passing_status_qualifying'] = 'required|string|max:100';
            $rules['passing_year_qualifying'] = 'nullable|string|max:255';
            $rules['score_qualifying'] = 'nullable|string|max:255';
            $rules['upload_score'] = 'nullable|string|max:255';
        }


        // foreach ($exams as $exam => $status) {
        //     if ($status) {
        //         $exam_key = strtolower(str_replace(' ', '_', $exam));

        //         // Dynamically generate rules for each exam
        //         $rules["{$exam_key}_name"] = 'required|string|max:255';
        //         $rules["passing_status_{$exam_key}"] = 'required|string|in:Apearing,Passed';
        //         $rules["passing_year_{$exam_key}"] = 'required|string|max:255';
        //         $rules["score_{$exam_key}"] = 'required|numeric|min:0|max:100';
        //     }
        // }

        $messages = [
            'board_10th.required' => 'The 10th board field is required.',
            'marks_10th.required' => 'The 10th marks field is required.',
            'marks_10th.numeric' => 'The 10th marks must be a number.',
            'marks_10th.max' => 'The 10th marks cannot exceed 100.',
            'board_bachelors.required' => 'The bachelors board field is required for masters programme.',
            'marks_bachelors.required' => 'The bachelors marks field is required for masters programme.',
            'board_masters.required' => 'The masters board field is required for PhD or Executive PhD programme.',
            'marks_masters.required' => 'The masters marks field is required for PhD or Executive PhD programme.',
        ];

        $request->validate($rules, $messages);
        

        try {
            // Find the educational detail record
            $educationalDetail = EducationalDetail::findOrFail($id);

            // Update the record
            // Enable query logging
            \DB::enableQueryLog();

            // Perform the update operation
            $educationalDetail->update([
                'board_10th' => $request->board_10th,
                'marks_10th' => $request->marks_10th,
                'passing_year_10th' => $request->passing_year_10th,
                'board_12th' => $request->board_12th,
                'marks_12th' => $request->marks_12th,
                'board_bachelors' => $request->board_bachelors,
                'marks_bachelors' => $request->marks_bachelors,
                'board_masters' => $request->board_masters,
                'marks_masters' => $request->marks_masters,
                'passing_status_12th' => $request->passing_status_12th,
                'passing_year_12th' => $request->passing_year_12th,
                'specialization_12th' => $request->specialization_12th,
                'passing_status_bachelor' => $request->passing_status_bachelor,
                'passing_year_bachelor' => $request->passing_year_bachelor,
                'specialization_bachelor' => $request->specialization_bachelor,
                'passing_status_master' => $request->passing_status_master,
                'passing_year_master' => $request->passing_year_master,
                'specialization_master' => $request->specialization_master,
                'national_eligibility_name' => $request->national_eligibility_name,
                'passing_status_national' => $request->passing_status_national,
                'passing_year_national' => $request->passing_year_national,
                'score_national' => $request->score_national,
                'marks_name_of_degree' => $request->marks_name_of_degree,
                'passing_status_qualifying' => $request->passing_status_qualifying,
                'passing_year_qualifying' => $request->passing_year_qualifying,
                'score_qualifying' => $request->score_qualifying,
                'upload_score' => $request->upload_score,
            ]);

          

             // Delete older records if qualifying_name and application_id exist
             ScoreModeOfAdmission::where('application_id', $userId)
             ->where('qualifying_name', $request->input('qualifying_name'))
             ->delete();


             // Insert new records
                foreach ($request->qualifying_name_of_degree as $key => $degree) {
                    ScoreModeOfAdmission::create([
                        'application_id' => $userId,
                        'qualifying_name' => $request->qualifying_name[$key],
                        'qualifying_name_of_degree' => $degree,
                        'qualifying_passing_status' => $request->qualifying_passing_status[$key],
                        'qualifying_passing_year' => $request->qualifying_passing_year[$key],
                        'qualifying_score' => $request->qualifying_score[$key],
                    ]);
                }
            

            $stepStatus = StepStatus::where('application_id', Auth::id());
            $stepStatus->update([
                'educational_details' => true
            ]);

            

            return redirect()->route('index.file-upload')->with('success', 'Your educational details have been successfully updated!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error updating educational details: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating educational details.');
        }
    }

}
