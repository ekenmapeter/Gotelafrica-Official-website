<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentApproved extends Notification implements ShouldQueue
{
    use Queueable;

    public $submission;

    public function __construct($submission)
    {
        $this->submission = $submission;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Payment Approved - Video Contest')
            ->greeting('Hello ' . $this->submission->full_name . '!')
            ->line('Great news! Your payment has been approved for the video contest.')
            ->line('You can now upload your video entry through the contest dashboard.')
            ->action('Go to Dashboard', route('contest.dashboard'))
            ->line('Thank you for participating in our contest!')
            ->line('If you have any questions, please don\'t hesitate to contact us.');
    }
}