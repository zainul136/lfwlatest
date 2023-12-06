<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeathConfirmationNotification extends Model
{
    use HasFactory;

    protected $fillable=  [
        'user_id',
        'trusted_contact_id',
        'death_confirmation_id',
        'notification_status',
    ];


    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
