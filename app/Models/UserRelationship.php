<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRelationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'relative_id',
        'relationship_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function relative()
    {
        return $this->belongsTo(User::class, 'relative_id');
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }
}
