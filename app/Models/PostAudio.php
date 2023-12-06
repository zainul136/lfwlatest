<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAudio extends Model
{
    use HasFactory;
    protected $table = 'post_audio';
    protected $fillable = ['post_id','audio_path'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

}
