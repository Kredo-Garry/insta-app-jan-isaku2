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
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); //the id the user who liked the post
            $table->unsignedBigInteger('post_id'); // this is the post the user liked

            //Connecting the tables now
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // the user table
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); // the posts table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
