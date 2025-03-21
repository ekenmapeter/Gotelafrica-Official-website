<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotification extends Mailable
{
    use SerializesModels;

    public $submission;

    public function __construct($submission)
    {
        $this->submission = $submission;
    }

    public function build()
    {
        return $this->view('emails.admin-notification')
                    ->subject("New Submission: {$this->submission->id}")
                    ->from('apply@gotelafrica.com');
    }
}