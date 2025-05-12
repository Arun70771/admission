<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Registion;
use App\Models\File;
use App\Models\ApplicationFee;
use App\Models\AdmissionOffice;
use Session;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccessMail;


class MsPaymentController extends Controller
{

    // This method generates the payment URL
    public function generatePaymentUrl()
    {
        // Set payment parameters
        $userId = Session::get('user')->id;
        $data = Registion::where('id', $userId)->first();
        $admission_office     =   AdmissionOffice::find($userId);


        if ($admission_office->concession == 'inservice_faculty_ms') {
            $transactionAmount = 52630;
        } elseif ($admission_office->concession == 'sau_students_alumni_ms') {
            $transactionAmount = 52630;
        } elseif ($admission_office->concession == 'full_payment_ms') {
            $transactionAmount = 64030;
        } elseif ($admission_office->concession == 'installment_ms') {
            $transactionAmount = 41230;
        }else {
            $transactionAmount = 64030;
        }


        $name = $data->name;
        $email = $data->email;

        $mobile = (string)$data->mobile;
        if (strlen($mobile) < 10) {
            $mobile = str_pad($mobile, 10, "0", STR_PAD_LEFT);
        }


        $referenceNo = random_int(100000, 999999);
        $submerchantId = 45;
        $returnUrl = 'https://admissions.sau.ac.in/index.php/ms_payment/success'; // Your success URL
        $mandatoryFields = $referenceNo . '|' . $submerchantId . '|' . $transactionAmount . '|' . $name . '|' . $email . '|' . $mobile; // Custom fields, like customer details
        $optionalFields = $userId . '|ms-coursefee|x|x|x|x|x'; // Optional fields
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
    }


    // Handle payment response (success/failure)
    public function paymentResponse(Request $request)
    {

        // Payment response handling (success/failure)
        $status = $request->get('status');
        $referenceNo = $request->get('reference_no');
        $Response_Code = $request->get('Response_Code');
        // Perform actions based on payment status (e.g., update database, send email, etc.)


        $id = Str::before($request['optional_fields'], '|');
        $fields = explode('|', $request->mandatory_fields);

        if ($Response_Code == 'E000') {

            $data = Registion::where('id', $id)->first();

            if ($data) {
                session(['user' => $data]);
            }

            $info = new ApplicationFee;
            $info->application_id         = $id;
            $info->payment                =  'Success';
            $info->amount                =  $fields[2];
            $info->programme                =  'MS (Data Science and Artificial Intelligence)';
            $info->reference_no           =  $request['ReferenceNo'];
            $info->payment_response       =  json_encode($request->all());
            $info->save();

            $email_data = compact('info', 'data');

            Mail::to($data->email)->send(new PaymentSuccessMail($email_data));

            return redirect('ms_application_fee')->with('success', 'Your Payment has been successfully completed');
        } else {

            $data = Registion::where('id', $id)->first();
            if ($data) {
                session(['user' => $data]);
            }

            $info = new ApplicationFee;
            $info->application_id         = $id;
            $info->payment                =  'Failed';
            $info->amount                =  $fields[2];
            $info->programme                =  'MS (Data Science and Artificial Intelligence)';
            $info->reference_no           =  '';
            $info->payment_response       =  json_encode($request->all());
            $info->save();

            return redirect('ms_application_fee')->with('warning', 'Please complete payment process for registration');
        }
    }
}
