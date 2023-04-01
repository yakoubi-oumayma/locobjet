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
        Schema::create('ad_reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('rating');
            $table->text('comment');
            $table->unsignedInteger('ad_id');
            $table->foreign('ad_id')->references('ad_id')->on('ads')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->timestamps();
            Schema::enableForeignKeyConstraints();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_reviews');
    }
};
