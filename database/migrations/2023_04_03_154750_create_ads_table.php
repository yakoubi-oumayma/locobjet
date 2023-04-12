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
        Schema::create('ads', function (Blueprint $table) {

            $table->increments('id');
            $table->String('title');
            $table->enum('state', ['active', 'inactive']);
            $table->date('available_from');
            $table->integer('min_rent_period');
            $table->enum('availability', ['allTime', 'limited']);
            $table->date('createdAt');
            $table->unsignedInteger('item_id');
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade');
            Schema::enableForeignKeyConstraints();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};