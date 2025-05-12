<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $programName;
    public $courses;
    public $totalPayment;
    public $transactionId;
    public $paymentStatus;

    /**
     * Create a new message instance.
     */
    public function __construct($programName, $courses, $totalPayment, $transactionId, $paymentStatus)
    {
        $this->programName = $programName;
        $this->courses = $courses;
        $this->totalPayment = $totalPayment;
        $this->transactionId = $transactionId;
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Payment Successful')
                    ->view('emails.payment_successful');
    }
}