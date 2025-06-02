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
    $table->id();
    $table->foreignId('service_id')->constrained('services', 'service_id')->onDelete('cascade');
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    
    $table->string('pet_name');
    $table->string('pet_type');
    $table->string('pet_breed');
    $table->float('pet_weight');
    $table->integer('pet_age');
    $table->date('date');
    $table->time('time');
    $table->timestamps();
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
