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
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description_es');
            $table->text('description_cat');
            $table->text('description_en');
            $table->time('start_date');
            $table->time('end_date');
            $table->enum('accessibility', ['small','medium','high']);
            $table->string('zone');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->integer('construction_year');
            $table->boolean('is_featured');

            $table->foreignId('type_id')->on('types')->constrained();
            $table->foreignId('city_id')->on('cities')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaces');
    }
};
