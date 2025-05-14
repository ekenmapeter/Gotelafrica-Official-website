<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Withdraw;

class WithdrawalNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $withdrawal;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Withdraw $withdrawal)
    {
        $this->user = $user;
        $this->withdrawal = $withdrawal;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Withdrawal Request Confirmation')
                    ->view('emails.withdrawal-notification');
    }
}
