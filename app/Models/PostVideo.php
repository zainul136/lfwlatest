<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVideo extends Model
{

    protected $table = 'post_videos';
    protected $fillable = ['post_id', 'video_path'];
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
