<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectRespons;
use Illuminate\Support\Facades\DB;
use App\Models\Admission;
use App\Models\ApplicationFee;
use App\Models\ApplicationFeesRefund;
use App\Models\File;
use App\Models\AdmissionOffice;
use Session;

class ApplicationController extends Controller
{

    function short_term_application_fee()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $applicationFee = ApplicationFee::where('application_id', $id)->orderBy('id', 'desc')->first();
        $admission_office     =   AdmissionOffice::find($id);
        $info   =  compact('data', 'applicationFee', 'admission_office');
        return view('application.short_term_application_fee')->with($info);
    }

    function ms_application_fee()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $applicationFee = ApplicationFee::where('application_id', $id)->orderBy('id', 'desc')->first();
        $admission_office     =   AdmissionOffice::find($id);
        $info   =  compact('data', 'applicationFee', 'admission_office');
        return view('application.ms_application_fee')->with($info);
    }
    
    function phd_application_fee()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $applicationFee = ApplicationFee::where('application_id', $id)->orderBy('id', 'desc')->first();
        $admission_office     =   AdmissionOffice::find($id);
        $info   =  compact('data', 'applicationFee', 'admission_office');
        return view('application.phd_application_fee')->with($info);
    }

    function application_refund_form()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $applicationFee = ApplicationFee::where('application_id', $id)->orderBy('id', 'desc')->first();
        $info   =  compact('data', 'applicationFee');

        return view('application.application_refund')->with($info);
    }

    function handle_application_refund(Request $request)
    {
        // Step 1: Validate the incoming request data
        $id = Session::get('user')->id;
        $data = Admission::find($id);
        $applicationFee = ApplicationFee::where('application_id', $id)->orderBy('id', 'desc')->first();
        // dd($data);
        // dd($applicationFee);

        $validatedData = $request->validate([
            'reason_of_withdrawal' => 'required|string|max:255',
        ]);


        if ($applicationFee !== null && $applicationFee->payment !== "Failed") {
            $refund = ApplicationFeesRefund::create([
                'name' => $data->name,
                'email' => $data->email,
                'father_name' => $data->father_name ?: 'N/A',  // Set default if null
                'dob' => $data->dob ?: '2000-01-01',           // Set default date if null
                'nationality' => $data->country ?: 'Unknown',      // Set default if null
                'reason_of_withdrawal' => $validatedData['reason_of_withdrawal'],
                'amount' => $applicationFee->amount,
            ]);
        } else {
            return redirect()->route('application_refund')->with('success', 'Please complete your payment before appling for refund.');
        }

        return redirect()->route('application_refund')->with('success', 'Refund request saved successfully.');
    }
}