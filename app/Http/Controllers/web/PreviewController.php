<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StepStatus;
use App\Models\ApplicationForm;
use App\Models\Programme;
use App\Models\Course;
use App\Models\EducationalDetail;
use App\Models\ModeOfAdmission;
use App\Models\DocumentUpload;
use App\Models\CoursePayment;
use Illuminate\Support\Facades\DB;


class PreviewController extends Controller
{
    public function index(){    
        $userId = Auth::id();
        $applications_form = ApplicationForm::where('application_id',$userId)->first();
        $programme = Programme::where('application_id',$userId)->first();

        $course = Course::where('application_id', $userId)->get();
        $course->transform(function ($item) {
            $coursePayment = CoursePayment::where('slug', $item->course_name)->first();
            if ($coursePayment) {
                $item->course_name = $coursePayment->course_name;
            } else {
                $item->course_name = null;
            }

            return $item;
        });



        $educational_detail = EducationalDetail::where('application_id',$userId)->first();
        $mode_admission = ModeOfAdmission::where('application_id',$userId)->first();
        $document_upload = DocumentUpload::where('application_id',$userId)->get();
        $step_status = StepStatus::where('application_id',$userId)->first();
        $passport_photograph = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'passport_photograph')->value('document_path');

        $exists = StepStatus::where('application_id', Auth::id())->where('payment_complate', 1)->exists();      
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

        
        return view('web.preview',compact('programme','exams','step_status','passport_photograph','applications_form','programme','course','educational_detail','mode_admission','document_upload'));
    }
    
    public function store(Request $request)
    {   

        $request->validate([
            'declare' => 'required|accepted',
        ]);

        $stepStatus = StepStatus::where('application_id', Auth::id());
        $stepStatus->update([
            'preview_finalsubmit' => true,
        ]);

        return redirect()->route('index.payment')->with('success', 'Final submission has been completed successfully!');
    }


}
