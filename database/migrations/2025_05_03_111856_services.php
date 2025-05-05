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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('name');
            $table->string('schedule'); // Example: "Mon-Fri, 9am-5pm"
            $table->integer('duration'); // Duration in minutes
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('image'); // Path to image file
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
