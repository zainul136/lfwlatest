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
        Schema::create('profile_recoveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('death_confirmations')->constrained();
            $table->text('death_certificate')->nullable();
            $table->dateTime('date_of_death')->nullable();
            $table->string('place_of_death')->nullable();
            $table->text('confirmations_from')->nullable();
            $table->longText('recovery_confirmation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_recoveries');
    }
};
