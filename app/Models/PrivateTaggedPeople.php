<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateTaggedPeople extends Model
{
    use HasFactory;
    protected $table = 'private_tagged_people';
    protected $fillable = [
        'user_id',
        'post_id',
        'view_post',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
