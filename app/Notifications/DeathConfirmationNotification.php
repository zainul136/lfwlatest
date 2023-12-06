<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeathConfirmationNotification extends Notification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $deathConfirmation;

    public function __construct($deathConfirmation)
    {
        $this->deathConfirmation = $deathConfirmation;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('death-confirmation.'.$this->deathConfirmation->user_id);
    }

    public function broadcastWith()
    {
        return [
            'message' => 'A new death confirmation has been added.',
            'confirmation_id' => $this->deathConfirmation->id,
        ];
    }
}
