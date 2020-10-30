<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSendend extends Notification
{
    use Queueable;
    
    public $user;
    public $appId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $appId)
    {
        $this->user = $user;
        $this->appId = $appId;
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
        $user = $this->user;
        
        return [
            'title' => $user->full_name,
            'message' => 'Отправил сообщение по заявке №'.$this->appId,
        ];
    }
}
