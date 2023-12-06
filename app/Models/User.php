<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserRelationship;
use App\Models\Closure;
use App\Models\Tag;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasFactory,Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];



    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'id', 'user_id');
    }

    public function relatives()
    {
        return $this->belongsToMany(User::class, 'user_relationships', 'user_id', 'relative_id')
        ->withPivot('relationship_id')
        ->withTimestamps();
    }

    public function relationships()
    {
        return $this->hasMany(UserRelationship::class);
    }

    public function userRelationships()
    {
        return $this->hasMany(UserRelationship::class);
    }

    public function pendingRequests()
    {
        return $this->hasMany(UserRelationship::class, 'relative_id')
        ->where('status', 'pending');
    }
    public function ancestors()
    {
        return $this->hasMany(Closure::class, 'descendant_id');
    }

    public function descendants()
    {
        return $this->hasMany(Closure::class, 'ancestor_id');
    }

    public function user_information()
    {
        return $this->hasOne(UserInformation::class);
    }

    public function userInformation(): HasOne
    {
        return $this->hasOne(UserInformation::class);
    }

    public function staffMember(): HasOne
    {
        return $this->hasOne(StaffMember::class,'user_id','id');
    }

    public function privateTaggedPeople(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'private_tagged_people', 'user_id', 'post_id');
    }

    public function trustedContacts(): HasMany
    {
        return $this->hasMany(TrustedContact::class);
    }
    public function deathConfirmation(): HasMany
    {
        return $this->hasMany(DeathConfirmation::class);
    }
    public function deathConfirmationNotification(): HasMany
    {
        return $this->hasMany(DeathConfirmationNotification::class);
    }
    // TM Custom
    public function subscribers()
    {
        return $this->hasMany(Subscription::class, 'subscribed_to_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'subscriber_id');
    }

    public function profileCompleted()
    {
        return !empty($this->first_name)
        && !empty($this->last_name)
        && !empty($this->userInformation->gender)
        && !empty($this->userInformation->date_of_birth)
        && !empty($this->email)
        && !empty($this->userInformation->phone)
        && !empty($this->userInformation->city)
        && !empty($this->userInformation->country_selector_code)
        && !empty($this->userInformation->address);
    }

    // TM Custom
    public function hasSubscription($user_id)
    {
        $oneYearAgo = now()->subYear();

        return $this->subscriptions()
        ->where('subscribed_to_id', $user_id)
        ->where('created_at', '>', $oneYearAgo)
        ->where('status', 'completed')
        ->exists();
    }
    public function hasEverSubscribed($user_id)
    {
        $oneYearAgo = now()->subYear();

        return $this->subscriptions()
        ->where('subscribed_to_id', $user_id)
        ->where('status', 'completed')
        ->where('post_id', null)
        ->exists();
    }
    
    public function updateSubscription($user_id, $amount_cent)
    {
        // Find the user being subscribed to
        $subscribedToUser = User::find($user_id);

        // Check if the user already has a subscription to the target user
        // NOTE: This is ONLY a fallback. We will not use it regularly...
        if ($this->hasSubscription($user_id)) {
            // If already subscribed, extend the subscription by one year
            $subscription = $this->subscriptions()
            ->where('subscribed_to_id', $user_id)
            ->latest()
            ->first();

            // Calculate the new expiration date by adding one year to the current subscription_end date
            $newSubscriptionEnd = now()->addYear();
            
            // Update the subscription's subscription_end date
            $subscription->update([
                'subscription_end' => $newSubscriptionEnd,
            ]);
        } else {
            // If not subscribed, create a new subscription
            $subscriptionCost = $amount_cent;
            $newSubscriptionEnd = now()->addYear();

            $subscription = $this->subscriptions()->create([
                'subscribed_to_id' => $subscribedToUser->id,
                'subscription_cost' => $subscriptionCost,
                'subscription_end' => $newSubscriptionEnd,
            ]);
        }
        return $subscription;
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function userTree()
    {
        return $this->hasMany(UserTree::class, 'user_id', 'id');
    }
}

