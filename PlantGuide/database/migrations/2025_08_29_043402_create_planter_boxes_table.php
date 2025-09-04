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
        Schema::create('planter_boxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('position'); // 0-17 for 6x3 grid
            $table->unsignedBigInteger('plant_id')->nullable();
            $table->string('status')->default('unbuilt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planter_boxes');
    }
};
