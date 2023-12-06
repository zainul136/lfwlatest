<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function userRelationships()
    {
        return $this->hasMany(UserRelationship::class);
    }

    public function family()
    {
        return $this->hasMany(Family::class, 'relationship_id', 'id');
    }
}
