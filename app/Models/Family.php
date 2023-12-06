<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    public function relationships()
    {
        return $this->belongsTo(Relationship::class, 'relationship_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(FamilyChild::class, 'parent_id', 'id');
    }
}
