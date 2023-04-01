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
        Schema::create('ads_availab', function (Blueprint $table) {
            $table->integer('day');
            $table->integer('month');
            $table->unsignedInteger('ad_id');
            $table->foreign('ad_id')->references('ad_id')->on('ads')->onDelete('cascade');
            $table->primary(['day', 'month', 'ad_id']);
            $table->timestamps();
            schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads_availab');
    }
};
