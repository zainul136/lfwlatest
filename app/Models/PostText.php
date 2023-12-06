<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostText extends Model
{
    use HasFactory;

    protected $table = 'post_text';
    protected $dates = ['posted_at'];

    protected $fillable = [
        'post_id',
        'post_content',
    ];

    // Define the relationship with the Post model
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
