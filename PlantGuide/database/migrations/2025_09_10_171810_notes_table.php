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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plant_id')->nullable();
            $table->unsignedBigInteger('variety_id')->nullable();
            $table->text('note');
            $table->string('url')->nullable();
            $table->timestamps();
            $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');
            $table->foreign('variety_id')->references('id')->on('varieties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('notes');
    }
};
