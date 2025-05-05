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
        Schema::create('service_appointments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('user_id');
            $table->string('pet_name');
            $table->string('pet_type');
            $table->string('pet_breed');
            $table->float('pet_weight'); // e.g. 999.99 max
            $table->integer('pet_age'); // Age in years or months depending on context
            $table->date('date');
            $table->time('time');
            $table->timestamps();

            // Foreign key constraints (assuming `services` and `users` tables exist)
            $table->foreign('service_id')->references('service_id')->on('services')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
