<?php

namespace App\Notifications;

use App\Startup;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewStartupCreated extends Notification
{
    use Queueable;

    public $user;
    public $startup;

    public function __construct(User $user, Startup $startup)
    {
        $this->user = $user;
        $this->startup = $startup;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'user_full_name' => $this->user->full_name,
            'startup_id' => $this->startup->id,
            'project_name' => $this->startup->project_name,
            'company_name' => $this->startup->company_name,
        ];
    }
}
