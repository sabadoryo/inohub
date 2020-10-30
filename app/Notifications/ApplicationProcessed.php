<?php

namespace App\Notifications;

use App\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationProcessed extends Notification
{
    use Queueable;

    public $application;
    public $organizationName;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Application $application, $organizationName)
    {
        $this->application = $application;
        $this->organizationName = $organizationName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $application = $this->application;
        
        return [
            'title' => $this->organizationName,
            'application_id' => $application->id,
            'message' => 'Заявка №'.$application->id.' обрабатывается',
        ];
    }
}
