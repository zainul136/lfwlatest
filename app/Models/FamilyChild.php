<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyChild extends Model
{
    use HasFactory;

    public function family()
    {
        return $this->belongsTo(Family::class, 'parent_id', 'id');
    }



    public function familyrelation()
    {
        return $this->belongsTo(Relationship::class, 'relationship_id', 'id');
    }

}
