<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ConfirmationMail extends Mailable
{
    public $ConfirmationToken;

    public function __construct($ConfirmationToken)
    {
        $this->ConfirmationToken = $ConfirmationToken;
    }

    public function build()
    {
        return $this->view('emails.confirmation')
            ->subject('Confirm Your Account');
    }
}
