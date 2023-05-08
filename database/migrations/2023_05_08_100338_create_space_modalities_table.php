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
        Schema::create('space_modalities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('space_id')->on('spaces')->constrained();
            $table->foreignId('modality_id')->on('modalities')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('space_modalities');
    }
};
