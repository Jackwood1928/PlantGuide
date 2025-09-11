<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('planter_box_varieties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planter_box_id');
            $table->unsignedBigInteger('variety_id');
            $table->timestamps();
            $table->foreign('planter_box_id')->references('id')->on('planter_boxes')->onDelete('cascade');
            $table->foreign('variety_id')->references('id')->on('varieties')->onDelete('cascade');
            $table->unique(['planter_box_id', 'variety_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planter_box_varieties');
    }
};
