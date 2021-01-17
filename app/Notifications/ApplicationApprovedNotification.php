<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationApprovedNotification extends Notification
{
    use Queueable;

    public $application;
    public function __construct($application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Leave Application of '.$this->application->applier->name.' is Approved')
                    ->line('Leave application of '.$this->application->applier->name.' for '.$this->application->duration.' days started from '.$this->application->start_date.' was approved by authority.')
                    ->line('Enjoy your leave.');
    }

    public function toArray($notifiable)
    {
        return [
            'data'=>'Leave application of '.$this->application->applier->name.' for '.$this->application->duration.' days started from '.$this->application->start_date.' was approved by authority.',
        ];
    }
}
