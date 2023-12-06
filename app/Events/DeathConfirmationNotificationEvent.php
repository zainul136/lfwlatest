<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeathConfirmationNotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $deathConfirmation;

    public function __construct($deathConfirmation)
    {
        $this->deathConfirmation = $deathConfirmation;
    }

    public function broadcastOn()
    {
        // Broadcast to a private channel for the user
        return new PrivateChannel('user.'.$this->deathConfirmation->user_id);
    }

    public function broadcastAs()
    {
        // Use a custom event name
        return 'death-confirmation';
    }
}
