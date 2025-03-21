<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserConfirmation extends Mailable
{
    use SerializesModels;

    public $submission;

    public function __construct($submission)
    {
        $this->submission = $submission;
    }

    public function build()
    {
        return $this->view('emails.user-confirmation')
                    ->subject('Your Submission to Gotelafrica Creative Contest')
                    ->from('apply@gotelafrica.com');
    }
}