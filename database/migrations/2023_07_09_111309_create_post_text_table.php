<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTextTable extends Migration
{
    public function up()
    {
        Schema::create('post_text', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->text('post_content');
            $table->timestamp('posted_at')->useCurrent();
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_text');
    }
}
