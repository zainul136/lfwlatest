<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'subscriber_id',
        'subscribed_to_id',
        'subscription_cost',
        'post_id', // null means it's a subscription to a profile
        'status', // pending or completed
    ];

    public function subscriber()
    {
        return $this->belongsTo(User::class, 'subscriber_id');
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'subscriber_id');
    }

    public function subscribedTo()
    {
        return $this->belongsTo(User::class, 'subscribed_to_id');
    }

}
