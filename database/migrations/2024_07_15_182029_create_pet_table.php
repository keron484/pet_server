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
        Schema::create('pet', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('species');
            $table->string('breed');
            $table->string('age');
            $table->string('weight');
            $table->string('sex');
            $table->text('description');
            $table->string('pet_image');
            $table->string('adoption_status');
            $table->string('petcategory_id');
            $table->decimal('price', 8,2);
            $table->foreign('petcategory_id')->references('id')->on('petcategory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet');
    }
};
