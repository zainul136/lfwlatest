<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Session\Session;

use App\Models\Post;
use App\Models\User;
use App\Models\DeathConfirmation;
use App\Models\Subscription;
use App\Models\UserRelationship;

use Stripe;

class SubscriptionController extends Controller
{
    public function subscribeProfile($user_id)
    {
        $me = auth()->user();
        $user = User::findOrFail($user_id);
        $userNotAlive = DeathConfirmation::query()
        ->where('user_id', $user_id)
        ->where('is_alive', 0)->where('confirmation_status','=',1)
        ->get();
        if(!$userNotAlive){
            $message = "Profile is not available public since the person is alive.";
            $heading =  "Page Unavailable!";
            return view('error',compact('message','heading'));
        }
        $isRelative = UserRelationship::query()
        ->where('user_id', $me->id)
        ->where('relative_id', $user_id)
        ->where('status', 'approved')
        ->exists();
        if(!$userNotAlive){
            $message = "The profile is only available to the user's relative.";
            $heading =  "Page Unavailable!";
            return view('error',compact('message','heading'));
        }
        $me = auth()->user();
        // adding subscription with 'pending' status
        $oldSubscription = $me->hasEverSubscribed($user_id);
        if($oldSubscription){
            // $15
            $amount_cent = 1500; 
        }else{
            // $49.99
            $amount_cent = 4999; 
        }
        $sub = $me->updateSubscription($user_id, $amount_cent);

        /******** Stripe Checkout ********/
        Stripe\Stripe::setApiKey('sk_test_51NzS8XA1DojYkID5r9yrNR8DNwVyIpreXuIlZRAWXDMseYN1vXQIcDAz1PTZqaq1ZhqCgfG7Vx37IXdBdgousUea000MjqMEzl');

        // Token is basically a simple unique string that we'll use to verify the payment success callback
        $token = hash('sha256', 'tm_secret_salt_' . $sub->id);
        $success_route = route('subscribe.profile.finalize', [$sub->id, $token]);
        $site_url = route('home');


        $product = \Stripe\Product::create([
            'name' => $user->getFullName() . ' Profile Subscription', 
            'description' => 'You will have access to ' . $user->getFullName() . '\'s profile for 1 Year', 
        ]);

        $price = \Stripe\Price::create([
            'product' => $product->id,
            'unit_amount' => $amount_cent, 
            'currency' => 'usd',
        ]);

        $checkout_session = Stripe\Checkout\Session::create([
            'success_url' => $success_route,
            'cancel_url' => $site_url,
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1, 
                ]
            ],
            'mode' => 'payment',
        ]);

        // 
        $payment_intent = $checkout_session->payment_intent;
        $session = new Session();
        $session->set('payment_intent', $payment_intent);

        header("HTTP/1.1 303 See Other");
        // header("Location: " . $checkout_session->url);
        return redirect($checkout_session->url);

    }
    public function finalizeProfileSubscription($id, $token)
    {
        $me = auth()->user();
        $subscription = Subscription::findOrFail($id);

        if($token == hash('sha256', 'tm_secret_salt_' . $id)){
            // This means that the request is valid and not forged by a hacker

            $subscription->update([
                'status' => 'completed'
            ]);
            return redirect()->route('deceasedProfile', $subscription->subscribed_to_id);
        }else{
            $message = "Looks like something went wrong.";
            $heading =  "Error!";
            return view('error',compact('message','heading'));
        }
    }
    public function subscribePost($post_id)
    {
        $me = auth()->user();
        $post = Post::findOrFail($post_id);
        $user = $post->user;
        $user_id = $user->id;
        $userNotAlive = DeathConfirmation::query()
        ->where('user_id', $user_id)
        ->where('is_alive', 0)->where('confirmation_status','=',1)
        ->get();
        if(!$userNotAlive){
            $message = "Profile is not available public since the person is alive.";
            $heading =  "Page Unavailable!";
            return view('error',compact('message','heading'));
        }
        $isRelative = UserRelationship::query()
        ->where('user_id', $me->id)
        ->where('relative_id', $user_id)
        ->where('status', 'approved')
        ->exists();
        if(!$userNotAlive){
            $message = "The profile is only available to the user's relative.";
            $heading =  "Page Unavailable!";
            return view('error',compact('message','heading'));
        }
        $me = auth()->user();
        // adding subscription with 'pending' status
        $oldSubscription = $post->hasEverSubscribed();
        if($oldSubscription){
            // $15
            $amount_cent = 1500; 
        }else{
            // $30
            $amount_cent = 3000; 
        }
        $sub = $post->updateSubscription($me->id, $amount_cent);

        /******** Stripe Checkout ********/
        Stripe\Stripe::setApiKey('sk_test_51NzS8XA1DojYkID5r9yrNR8DNwVyIpreXuIlZRAWXDMseYN1vXQIcDAz1PTZqaq1ZhqCgfG7Vx37IXdBdgousUea000MjqMEzl');

        // Token is basically a simple unique string that we'll use to verify the payment success callback
        $token = hash('sha256', 'tm_secret_salt_' . $sub->id);
        $success_route = route('subscribe.post.finalize', [$sub->id, $token]);
        $site_url = route('home');


        $product = \Stripe\Product::create([
            'name' => $user->getFullName() . '\'s Private Post Subscription', 
            'description' => 'You will have access to a private post of ' . $user->getFullName() . ' for 1 Year', 
        ]);

        $price = \Stripe\Price::create([
            'product' => $product->id,
            'unit_amount' => $amount_cent, 
            'currency' => 'usd',
        ]);

        $checkout_session = Stripe\Checkout\Session::create([
            'success_url' => $success_route,
            'cancel_url' => $site_url,
            'line_items' => [
                [
                    'price' => $price->id,
                    'quantity' => 1, 
                ]
            ],
            'mode' => 'payment',
        ]);

        // 
        $payment_intent = $checkout_session->payment_intent;
        $session = new Session();
        $session->set('payment_intent', $payment_intent);

        header("HTTP/1.1 303 See Other");
        // header("Location: " . $checkout_session->url);
        return redirect($checkout_session->url);

    }
    public function finalizePostSubscription($id, $token)
    {
        $me = auth()->user();
        $subscription = Subscription::findOrFail($id);
        $post = Post::findOrFail($subscription->post_id);
        $user_id = $post->user_id;

        if($token == hash('sha256', 'tm_secret_salt_' . $id)){
            // This means that the request is valid and not forged by a hacker

            $post->activateSubscription($id);
            return redirect()->route('view-relative-post', ['id' => $user_id, 'post_id' => $subscription->post_id]);
        }else{
            $message = "Looks like something went wrong.";
            $heading =  "Error!";
            return view('error',compact('message','heading'));
        }
    }
    
}
