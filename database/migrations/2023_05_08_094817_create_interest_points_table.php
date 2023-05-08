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
        Schema::create('interest_points', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description_es');
            $table->text('description_cat');
            $table->text('description_en');
            $table->string('audio_es')->nullable();
            $table->string('audio_cat')->nullable();
            $table->string('audio_en')->nullable();
            $table->foreignId('interest_point_id')->on('interest_points')->constrained();
            $table->foreignId('image_id')->on('images')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interest_points');
    }
};
