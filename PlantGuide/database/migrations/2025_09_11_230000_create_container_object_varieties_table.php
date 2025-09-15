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
        Schema::create('container_object_varieties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('container_object_id');
            $table->unsignedBigInteger('variety_id');
            $table->foreign('container_object_id')->references('id')->on('container_objects')->onDelete('cascade');
            $table->foreign('variety_id')->references('id')->on('varieties')->onDelete('cascade');
            $table->unique(['container_object_id', 'variety_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('container_object_varieties');
    }
};
