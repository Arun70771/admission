<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicationDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($applicationDetails)
    {
        $this->applicationDetails = $applicationDetails;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Application Submitted Successfully')
                    ->view('emails.application_submitted')
                    ->with('details', $this->applicationDetails);
    }
}
