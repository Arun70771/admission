<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;



class PaymentController extends Controller
{

    // This method generates the payment URL
    public function generatePaymentUrl()
    {
        // Set payment parameters
        $referenceNo = random_int(100000, 999999);
        $submerchantId = 45;
        $transactionAmount = 1660; // Amount to be charged
        $returnUrl = 'https://admissions.sau.ac.in/payment/success'; // Your success URL
        $mandatoryFields = $referenceNo . '|' . $submerchantId . '|' . $transactionAmount . '|kaushlendra|kaushlendras1@gmail.com|8510810544'; // Custom fields, like customer details
        $optionalFields = 'x|x|x|x|x|x|x'; // Optional fields
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
        // Perform actions based on payment status (e.g., update database, send email, etc.)

        if ($status == 'success') {
            dump($request->all());
        } else {
            dump($request->all());
        }
    }
}
