<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $registrationNumber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName,$registrationNumber,$email,$password)
    {
        $this->userName = $userName;
        $this->registrationNumber = $registrationNumber;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration Successful!')
                    ->view('emails.registration-successful')
                    ->with([
                        'userName' => $this->userName,
                        'registrationNumber' => $this->registrationNumber,
                        'email' => $this->email,
                        'password' => $this->password,
                    ]);
    }
}
