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
        Schema::create('rehome_pets', function (Blueprint $table) {
            $table->id(); // Custom primary key name
            $table->string('name');
            $table->date('birth_date');
            $table->string('type'); // e.g., dog, cat
            $table->string('breed');
            $table->enum('gender', ['male', 'female']);
            $table->string('height'); // e.g., small, medium, large
            $table->float('weight'); // kg or lbs, depending on use
            $table->string('temperament')->nullable(); // e.g., calm, energetic
            $table->string('good_with')->nullable(); // e.g., kids, other pets
            $table->string('spayed_neutered_status');
            $table->string('vaccination_status')->nullable();
            $table->text('existing_conditions')->nullable();
            $table->text('description');
            $table->string('status')->nullable();
            $table->string('image')->nullable(); // path to pet photo
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
