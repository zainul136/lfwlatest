<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeathConfirmationDatabaseNotification extends Notification
{
    use Queueable;

    protected $deathConfirmation;

    public function __construct($deathConfirmation)
    {
        $this->deathConfirmation = $deathConfirmation;
    }


    public function toDatabase($notifiable)
    {
        $userid = $this->deathConfirmation->user_id;
        $user = User::query()->where('id',$userid)->first();

        return [
            'message' => "{$user->first_name} {$user->last_name} ({$user->email}) ",
            'confirmation_table_id' => $this->deathConfirmation->id,
            'confirmation_id' => $notifiable->id,

        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
