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
use App\Models\PaymentResponse;
use App\Models\RegistrationForm;
use Illuminate\Support\Facades\DB;
use PDF;


class ApplicationPdf extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $applications_form = ApplicationForm::where('application_id', $userId)->first();
        $programme = Programme::where('application_id', $userId)->first();
        
        
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


        $educational_detail = EducationalDetail::where('application_id', $userId)->first();
        $mode_admission = ModeOfAdmission::where('application_id', $userId)->first();
        $document_upload = DocumentUpload::where('application_id', $userId)->get();
        $registration_form = RegistrationForm::where('id', $userId)->first();
        $step_status = StepStatus::find($userId);
        $passport_photograph = 'storage/' . DocumentUpload::where('application_id', Auth::id())->where('document_type', 'passport_photograph')->value('document_path');
        // dd($passport_photograph);

        // $signatures = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'signatures')->value('document_path');

        $signatures = 'storage/' . DocumentUpload::where('application_id', Auth::id())->where('document_type', 'signatures')->value('document_path');
        $payment_response = PaymentResponse::where('application_id', $userId)->latest()->first();
        $data = compact(
            'signatures',
            'passport_photograph',
            'applications_form',
            'programme',
            'course',
            'educational_detail',
            'mode_admission',
            'registration_form',
            'document_upload',
            'payment_response'
        );

        // Load the view and pass data
        $pdf = PDF::loadView('web.application-pdf', $data);

        return $pdf->stream('application.pdf');

        // Return the PDF as a download
        //return $pdf->download('application.pdf');
    }
}
