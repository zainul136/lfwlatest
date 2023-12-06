<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class PaymentConfirmationController extends Controller
{
    public function paymentConfirmation()
    {
        $subscriptions = Subscription::query()->with(['subscriber','post'])->get();
        return view('admin.zenix.dashboard.paymentConfirmation',compact('subscriptions'));

    }
}
