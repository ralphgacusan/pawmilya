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
        Schema::create('rehomes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to the users table
            $table->foreignId('rehome_pet_id')->constrained()->onDelete('cascade'); // Foreign key to the rehome_pets table
            $table->date('meet_up_date'); // Meetup date
            $table->time('meet_up_time'); // Meetup time
            $table->string('status')->default('pending'); // Added status column
            $table->timestamps(); // Created at and updated at timestamps
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