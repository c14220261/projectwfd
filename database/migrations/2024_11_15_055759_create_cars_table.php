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
        Schema::create('cars', function (Blueprint $table) {
            $table->id('car_id');
            $table->string('car_model');
            $table->integer('year');
            $table->string('status')->default('available')->nullable(); // 'available', 'rented'
            $table->string('number_plate')->unique();
            $table->string('no_rangka')->unique();
            $table->unsignedInteger('price');
            $table->foreignId('current_profile_id')->nullable()->constrained('profiles','profile_id')->nullOnDelete();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
