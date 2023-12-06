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
        Schema::create('user_tree', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->comment('user id');
            $table->unsignedBigInteger('p_id')->nullable()->comment('parent id');
            $table->unsignedBigInteger('f_id')->nullable()->comment('father id');
            $table->unsignedBigInteger('m_id')->nullable()->comment('mother id');
            $table->timestamps();
        });	

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tree');
    }
};
