<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionOffice;
use App\Models\Admission;

class OfferController extends Controller
{
    public function fetchOfferDetails(Request $request)
    {
        $id = $request->id;
        $offerDetails = AdmissionOffice::find($id);
        $admission_data = Admission::find($id);

        if (!$offerDetails) {
            return response()->json(['error' => 'Details not found'], 404);
        }

        $offerDetails->to_email = $admission_data->email;
        $amount = null;

        if ($amount === null) {
            $amount = '64,030'; // Default amount when no condition matches
        }

        if($offerDetails->concession=='inservice_faculty'){
            $amount = '7,470';
        }elseif($offerDetails->concession=='sau_alumni'){
            $amount = ' 7,470';
        }elseif($offerDetails->concession=='sau_students'){
            $amount = '4,980';
        }elseif($offerDetails->concession=='full_payment'){
            $amount = '9,960';
        }elseif($offerDetails->concession=='inservice_faculty_ms'){
            $amount = '52,630';
        }elseif($offerDetails->concession=='sau_students_alumni_ms'){
            $amount = '52,630';
        }elseif($offerDetails->concession=='sau_students_alumni_ms'){
            $amount = '64,030';
        }

       

    if ($admission_data->programme == 'PhD') {
        

        if($admission_data->Phd_programmes=='Computer Science' || $admission_data->Phd_programmes=='Biotechnology' || $admission_data->Phd_programmes=='Mathematics'){
            $amount ='Pay the fee of USD 1200 (for science disciplines) (or equivalent to INR 99,600) within a week. Refer to the SAU Refund Policy on the website.';
        }else{
            $amount ='Pay the fee of USD 1000 (for other disciplines) (or INR 83,000) within a week. Refer to the SAU Refund Policy on the website.';
        }        


        $offerDetails->subject = "Admission Offer for PhD at SAU";
        $offerDetails->mail_content = '';


    } elseif ($admission_data->programme == 'short_term') {
            
            $offerDetails->subject = "Admission Offer for Short Term Course at SAU";
            $offerDetails->mail_content = '     <p>Dear ' . ucfirst($admission_data->name) . ',</p>
            <p>Greetings from the South Asian University (SAU)!</p>
            <p>Thank you for your interest in the Short Term Course at the South Asian University. We are pleased to inform you that, based on your application and credentials, you meet the admission criteria for this program.</p>
            <p>To confirm your admission, you are required to complete the payment of the <strong>program fee of INR '.$amount.'/-</strong>.</p>
            <p>The fee must be paid <strong>within one week</strong>. For making the payment, kindly log in to the <a href="https://admissions.sau.ac.in/index.php/SignIn">SAU Admissions Portal</a> by using your login credentials.</p>
            <p>We look forward to welcoming you to the SAU Virtual Campus. If you have any questions, please feel free to contact us.</p>
            <p>&nbsp;</p>
            <p><strong>Best wishes,</strong></p>
            <p>Admissions Team</p>
            <p>SAU</p>';
        } else {
            $offerDetails->subject = "Admission Offer for MS in Data Science and Artificial Intelligence (Online) at SAU";
            $offerDetails->mail_content = '     <p>Dear ' . ucfirst($admission_data->name) . ',<br><br>Greetings from the South Asian University (SAU)!</p>
                                                    <p>Thank you for your interest in the MS in Data Science and Artificial Intelligence - Online Degree Program at the South Asian University. We are pleased to inform you that, based on your application and credentials, you meet the admission criteria for this program.</p>
                                                    <p>As seats are limited, we request you to secure your admission by completing the necessary formalities. This includes the following program fee:</p>
                                                    <ul>
                                                        <li>Course Fee &ndash; USD 550 / INR 45,600 (per semester)</li>
                                                        <li>Admission Fee &ndash; USD 200 / INR 17,600 (One time)</li>
                                                        <li>Student Aid Fund &ndash; USD 10 / INR 830 (per semester)</li>
                                                    </ul>
                                                    <p>The total amount of INR '. $amount .' /-must be paid&nbsp;<strong>within one week&nbsp;</strong>to confirm your admission. For making the payment, kindly log in to the&nbsp;<a href="https://admissions.sau.ac.in/index.php/SignIn">SAU Admissions Portal</a>&nbsp;by using your login credentials.</p>
                                                    <p>We look forward to welcoming you to the SAU Virtual Campus. If you have any questions, please feel free to contact us.</p>
                                                    <p>&nbsp;</p>
                                                    <p><strong>Best wishes,</strong></p>
                                                    <p>Admissions Team</p>
                                                    <p>SAU</p>';
        }



        return response()->json($offerDetails);
    }

    public function sendOfferMail(Request $request)
    {
        $data = $request->all();

        // Logic to send email
        Mail::to($data['to_email'])->send(new SendOfferMail($data)); // Adjust as per your setup

        return response()->json(['success' => true]);
    }

    public function updateCheckLevel2(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:admissions,id', // Validate the ID
            'check_level_2' => 'required|boolean',  // Validate the new value (0 or 1)
        ]);

        $admission = AdmissionOffice::find($request->id);
        $admission->check_level_2 = $request->check_level_2;
        $admission->save();

        return response()->json(['message' => 'Status updated successfully!']);
    }



}