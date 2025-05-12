<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $otp;
    public $validity;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $otp, $validity)
    {
        $this->userName = $userName;
        $this->otp = $otp;
        $this->validity = $validity;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('OTP Verification')
                    ->view('emails.otp');
    }
}