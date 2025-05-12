<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\PgResponse;
use App\Models\PaymentResponse;
use App\Models\Programme;
use App\Models\Course;
use App\Models\StepStatus;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentSuccessful;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;



class SauPaymentController extends Controller
{

    // This method generates the payment URL
    public function generatePaymentUrl()
    {
        // Set payment parameters
        $userId = Auth::id();
        $data = ApplicationForm::where('application_id', $userId)->first();
        $name = $data->candidate_name;
        $email = $data->email;
        $mobile = (string)$data->mobile;
      
        if (strlen($mobile) < 10) {
            $mobile = str_pad($mobile, 10, "0", STR_PAD_LEFT);
        } elseif (strlen($mobile) > 10) {
            $mobile = substr($mobile, -10); // Keep only the last 10 digits
        }

        $referenceNo = random_int(100000, 999999);
        $submerchantId = 45;        
        $courseFee = Programme::where('application_id', $userId)->value('course_fee');
        $transactionAmount = $courseFee;
        //$transactionAmount = 1;
        $returnUrl = 'https://admissions.sau.ac.in/sau-payment/success'; // Your success URL
        $mandatoryFields = $referenceNo . '|' . $submerchantId . '|' . $transactionAmount . '|' . $name . '|' . $email . '|' . $mobile; // Custom fields, like customer details
        $optionalFields = $userId . '|admission-registrationfee|'.$userId.'|x|x|x|x'; // Optional fields
        $paymode = 9; // Payment mode (e.g., 9 for Credit/Debit Card)

        // Generate the payment form URL
        $url = $this->paymentForm(
            $returnUrl,
            $mandatoryFields,
            $optionalFields,
            $transactionAmount,
            $referenceNo,
            $submerchantId,
            $paymode
        );

        return response()->json(['url' => $url]);
    }


    // This method generates the EazyPay payment form URL with encrypted parameters
    public function paymentForm(
        $returnUrl,
        $mandatoryFields,
        $optionalFields,
        $transactionAmount,
        $referenceNo,
        $submerchantId,
        $paymode
    ) {
        $encryptionKey = '3801710260701024'; // Your encryption key (this should be stored securely)

        // Generate a random reference number if not provided


        $plain  = 'https://eazypay.icicibank.com/EazyPG?merchantid=386070&mandatory fields=' . $mandatoryFields .
            '&optional fields=' . $optionalFields .
            '&returnurl=' . $returnUrl .
            '&Reference No=' . $referenceNo .
            '&submerchantid=' . $submerchantId .
            '&transaction amount=' . $transactionAmount .
            '&paymode=' . $paymode;


        // Encrypt each field using AES128 (ECB mode)
        $returnUrl = $this->aes128Encrypt($returnUrl, $encryptionKey);
        $mandatoryFields = $this->aes128Encrypt($mandatoryFields, $encryptionKey);
        $optionalFields = $this->aes128Encrypt($optionalFields, $encryptionKey);
        $transactionAmount = $this->aes128Encrypt($transactionAmount, $encryptionKey);
        $referenceNo = $this->aes128Encrypt($referenceNo, $encryptionKey);
        $submerchantId = $this->aes128Encrypt($submerchantId, $encryptionKey);
        $paymode = $this->aes128Encrypt($paymode, $encryptionKey);

        // Construct the EazyPay URL with encrypted parameters
        return $encrypt  = 'https://eazypay.icicibank.com/EazyPG?merchantid=386070&mandatory fields=' . $mandatoryFields .
            '&optional fields=' . $optionalFields .
            '&returnurl=' . $returnUrl .
            '&Reference No=' . $referenceNo .
            '&submerchantid=' . $submerchantId .
            '&transaction amount=' . $transactionAmount .
            '&paymode=' . $paymode;

        // return [ $plain , $encrypt];
    }

    public function paymentResponse(Request $request)
    {

        
       $optionalFields = $request->input('optional_fields');
       $optionalFieldsArray = explode('|', $optionalFields);
       $userId = $optionalFieldsArray[0] ?? null;

      // dd($request->all());
      // Payment response handling (success/failure)

        // $request->merge([
        //     'status' => 'success',
        //     'reference_no' => '123456',
        //     'Response_Code' => 'E001',
        // ]);
        
        $status = $request->get('status');
        $referenceNo = $request->get('reference_no');
        $Response_Code = $request->get('Response_Code');
        // Perform actions based on payment status (e.g., update database, send email, etc.)

       // $Response_Code='E000';
      
        if ($Response_Code == 'E000' || $Response_Code == 'E006') {
            Auth::guard('user')->loginUsingId($userId);
            $data = new PaymentResponse;
            $data->is_complete = true;
            $data->application_id = $userId;
            $data->tracking_id = $request['ReferenceNo'];
            $data->payment_response = json_encode($request->all());
            $data->payment = 'success';
            $data->save();

            $stepStatus = StepStatus::where('application_id', $userId);
            $stepStatus->update([
                'payment_complate' => true,
                'pay_fee' => true,
            ]);

          

             // Send the email
        try {
            
            $data = ApplicationForm::where('application_id', $userId)->first();
            $userEmail = $data->email; // Replace with the user's email
            $programName = Programme::where('application_id', $userId)->value('programme');;
            $courses = Course::where('application_id', $userId)->pluck('course_name')->toArray();
            $totalPayment = Programme::where('application_id', $userId)->value('course_fee');
            $transactionId = $request['ReferenceNo'];
            $paymentStatus = 'Success';
            // Send the email

            Mail::to($userEmail)->send(new PaymentSuccessful($programName, $courses, $totalPayment, $transactionId, $paymentStatus));   
            
            Log::info('Registration email sent successfully to: ' . $userEmail);
        } catch (\Exception $e) {
               Log::error('Failed to send registration email to: ' . $userEmail . '. Error: ' . $e->getMessage());
        }

           return redirect()->route('index.complete')->with('success', 'Your registration has been completed successfully.');
        } else {
            Auth::guard('user')->loginUsingId($userId);            
            $data = new PaymentResponse;
            $data->is_complete = true;
            $data->application_id = $userId;
            $data->payment = 'pending';
            $data->tracking_id = $request['ReferenceNo'];
            $data->payment_response = json_encode($request->all());
            $data->save();
            return redirect()->route('index.payment')->with('warning', 'Please complete the payment process to finalize your registration.');
            
        }
    }

    function aes128Encrypt($plaintext, $key)
    {
        $cipher = "AES-128-ECB";
        in_array($cipher, openssl_get_cipher_methods(true));
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes(1);
        $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options = 0, "");
        //return $ciphertext."n";
        return $ciphertext;
        //return $plaintext;
    }

}
