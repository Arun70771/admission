<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StepStatus;
use App\Models\PgResponse;
use App\Models\PaymentResponse;


class ApplicationStatusController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $step_status = StepStatus::where('application_id', $userId)->first();
        $payment_response = PaymentResponse::where('application_id', $userId)->latest()->first();
        return view('web.application-status',compact('step_status','payment_response'));
    }

    
}
