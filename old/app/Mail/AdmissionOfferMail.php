<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AdmissionOfferMail extends Mailable
{
    public $data;
    public $fromEmail;

    public function __construct($data, $fromEmail)
    {
        $this->data = $data;
        $this->fromEmail = $fromEmail;
    }

    public function build()
    {
        return $this->from($this->fromEmail, 'SAU Admissions Team')
            ->subject('Admission Offer')
            ->view('emails.admission_offer')
            ->with('data', $this->data);
    }
}
