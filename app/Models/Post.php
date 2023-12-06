<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_type',
        'user_id',
        'post_scope'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function PostText()
    {
        return $this->hasOne(PostText::class);
    }

    public function postImage()
    {
        return $this->hasOne(PostImage::class);
    }

    public function postVideo()
    {
        return $this->hasOne(PostVideo::class);
    }

    public function postDocument()
    {
        return $this->hasOne(PostDocument::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function postAudio()
    {
        return $this->hasOne(PostAudio::class);
    }

    public function viewers(){
        return $this->belongsToMany(User::class, 'private_tagged_people', 'post_id', 'user_id');
    }

    // TM Custom
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function hasSubscription($subscriberId=false)
    {
        if(!$subscriberId){
            $subscriberId = auth()->user()->id;
        }
        return $this->subscriptions()
        ->where('subscriber_id', $subscriberId)
        ->where('post_id', $this->id)
        ->where('status', 'completed')
        ->exists();
    }

    public function hasEverSubscribed($subscriberId=false)
    {
        if(!$subscriberId){
            $subscriberId = auth()->user()->id;
        }
        return $this->subscriptions()
        ->where('subscriber_id', $subscriberId)
        ->where('status', 'completed')
        ->where('post_id', $this->id)
        ->exists();
    }

    public function updateSubscription($subscriberId, $subscriptionCost)
    {
        $existingSubscription = $this->subscriptions()
        ->where('subscriber_id', $subscriberId)
        ->where('post_id', $this->id)
        ->first();

        if ($existingSubscription) {
            // If the user already has a subscription, update it
            $existingSubscription->update([
                'subscription_cost' => $subscriptionCost,
                'status' => 'pending',
            ]);
            return $existingSubscription;
        } else {
            // If the user doesn't have a subscription, create a new one
            $subscription = $this->subscriptions()->create([
                'subscriber_id' => $subscriberId,
                'post_id' => $this->id,
                'subscription_cost' => $subscriptionCost,
                'status' => 'pending',
            ]);
            return $subscription;
        }
    }
    public function activateSubscription($sub_id)
    {
        $subscription = $this->subscriptions()
        ->where('id', $sub_id)
        ->first();

        if ($subscription) {
            if ($subscription->status === 'pending') {
                $subscription->update([
                    'status' => 'completed',
                ]);
            }
            return true; // Subscription successfully activated (or already active)
        }
        return false; // Subscription activation failed
    }
}
