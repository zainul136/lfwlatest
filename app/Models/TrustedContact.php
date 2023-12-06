<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustedContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'trusted_contact_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
