<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            // ID of the user who subscribed
            $table->unsignedBigInteger('subscriber_id')->nullable(); 

            // ID of the user being subscribed to
            $table->unsignedBigInteger('subscribed_to_id')->nullable(); 
            
            // post id for private post, null for profile subscription
            $table->unsignedBigInteger('post_id')->nullable();

            // Sub Cost in Cents (for future use like discount etc)
            $table->integer('subscription_cost');

            // Status:
            //      pending (payment pending)
            //      completed (paymend done)
            $table->string('status')->nullable()->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
