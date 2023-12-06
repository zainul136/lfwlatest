<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    use HasFactory;

    protected $fillable = [
        'ancestor_id',
        'descendant_id',
        'path_length',
    ];

    public function ancestor()
    {
        return $this->belongsTo(User::class, 'ancestor_id');
    }

    public function descendant()
    {
        return $this->belongsTo(User::class, 'descendant_id');
    }
}
