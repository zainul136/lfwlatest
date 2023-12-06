<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTree extends Model
{
    use HasFactory;
    protected $table = 'user_tree';

    protected  $fillable    = ['user_id','p_id','f_id','m_id'];
    public function userTree()
    {
        return $this->belongsTo(User::class,);
    }

}
