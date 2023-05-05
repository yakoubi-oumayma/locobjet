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
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('rating');
            $table->text('comment');
            $table->unsignedInteger('from_user_id');
            $table->foreign('from_user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('reservation_id');
            $table->foreign('reservation_id')->references('reservation_id')->on('reservation')->onDelete('cascade');
            $table->unsignedInteger('to_user_id');
            $table->foreign('to_user_id')->references('user_id')->on('users')->onDelete('cascade');


            $table->timestamps();
            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reviews');
    }
};
