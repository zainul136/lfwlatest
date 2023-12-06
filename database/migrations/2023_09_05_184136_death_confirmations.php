<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('death_confirmations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->boolean('is_alive')->default(true);
            $table->text('death_certificate')->nullable();
            $table->dateTime('date_of_death')->nullable();
            $table->string('place_of_death')->nullable();
            $table->text('confirmations_from')->nullable(); // JSON array to store user IDs
            $table->boolean('confirmation_status')->default(false);
            $table->longText('recovery_confirmation')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('death_confirmations');
    }
};
