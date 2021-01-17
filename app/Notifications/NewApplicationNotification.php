<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicationNotification extends Notification implements ShouldQueue
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
                    ->subject('New Application Received at '.$this->application->created_at)
                    ->line('One of your employee applied for a leave.')
                    ->action('Take Action', 'localhost:8000/action')
                    ->line('Thank you for your co-operation!');
    }

    public function toArray($notifiable)
    {
        return [
            'data'=>'New Application Recieved at '.$this->application->created_at,
        ];
    }
}
