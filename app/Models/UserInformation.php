<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = 'users_information';

    protected $fillable = [
        'user_id',
        'gender',
        'date_of_birth',
        'phone_number',
        'city',
        'country',
        'profile_picture',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
