<?php

namespace App\Models;

use App\Notifications\DeathConfirmationDatabaseNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class DeathConfirmation extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'user_id',
        'is_alive',
        'death_certificate',
        'date_of_death',
        'place_of_death',
        'confirmations_from',
        'confirmation_status',
    ];


    public function notifyTrustedContacts($contactIds)
    {
        // Get the current logged-in user's ID
        $currentUserId = auth()->id();
        // Convert the collection of contact IDs to a plain array
        $contactIdsArray = $contactIds->toArray();

        // Remove the current user's ID from the list of contact IDs
        $contactIdsArray = array_diff($contactIdsArray, [$currentUserId]);
        // Fetch the contacts to notify
        $contacts = User::whereIn('id', $contactIdsArray)->get();

        foreach ($contacts as $contact) {
            $contact->notify(new DeathConfirmationDatabaseNotification($this));
        }
    }


    public  function recoveryProfile(): HasMany
    {
        return $this->hasMany(profileRecovery::class,'death_confirmations','id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
