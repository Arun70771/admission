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

class CoursesFeeController extends Controller
{
    public function coursesFee(){
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

        return view('web.payment.courses-fee-payment',compact('action','userId','data','programme','national_eligibility_test','marks_qualifying_examination','preview_finalsubmit','payment_complate'));
    }

    public function customPayment(){

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

        return view('web.payment.custom-fee-payment' ,compact('action','userId','data','programme','national_eligibility_test','marks_qualifying_examination','preview_finalsubmit','payment_complate'));
    }
}
