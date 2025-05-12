<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StepStatus;
use App\Models\ApplicationForm;
use App\Models\Programme;
use App\Models\Course;
use App\Models\EducationalDetail;
use App\Models\ModeOfAdmission;
use App\Models\DocumentUpload;
use Illuminate\Support\Facades\Auth;
use App\Models\PgResponse;
use App\Models\PaymentResponse;
use App\Models\CoursePayment;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $applications_form = ApplicationForm::find($userId);
        $programme = Programme::where('application_id', $userId)->first();

        $courses = Course::where('application_id', $userId)->get();
        $courses->transform(function ($item) {
            $coursePayment = CoursePayment::where('slug', $item->course_name)->first();
            if ($coursePayment) {
                $item->course_name = $coursePayment->course_name;
                $item->reg_fee = $coursePayment->reg_fee;
            } else {
                $item->course_name = null;
                $item->reg_fee = null;
            }

            return $item;
        });

        $educational_detail = EducationalDetail::find($userId);
        $mode_admission = ModeOfAdmission::find($userId);
        $document_upload = DocumentUpload::where('application_id', $userId)->get();
        $payment_responses = PaymentResponse::where('application_id', $userId)->where('payment', 'pending')->get();
        $step_status = StepStatus::find($userId);


        return view('web.pay',compact('payment_responses','applications_form','programme','courses','educational_detail','mode_admission','step_status','document_upload'));
    }
    

    public function store(Request $request)
    {   

        dump( $request->all());
        // $validated = $request->validate([
        //     'candidate_name' => 'required|string',
        // ]);
        // $validated['application_id'] = uniqid('APP_'); // Generate unique application ID
       // ApplicationForm::create($validated);

        return redirect()->route('index.educational-details')->with('success', 'Your application has been created successfully!');
    }
    
}
