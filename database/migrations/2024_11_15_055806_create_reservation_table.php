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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('car_id')->constrained('cars','car_id')->onDelete('cascade');
            $table->dateTime('reservation_date');
            $table->dateTime('pickup_date');
            $table->dateTime('return_date');
            $table->string('status')->default('pending'); //  'pending', 'active', 'completed', 'canceled'
            $table->boolean('extendable')->default(true); // bisa entend ga
            $table->integer('subtotal')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
