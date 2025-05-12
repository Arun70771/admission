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
use App\Models\PaymentResponse;
use App\Models\DocumentUpload;
use Illuminate\Support\Facades\Log;


class PaymentSuccess extends Controller
{
    public function index(){
        $userId = Auth::id();
        $application_form = ApplicationForm::where('application_id', $userId)->first();
        $payment_response = PaymentResponse::where('application_id', $userId)->latest()->first();
        return view('web.payment-success',compact('application_form','payment_response'));
    }
}
