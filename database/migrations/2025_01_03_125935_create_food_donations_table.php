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
        Schema::create('food_donations', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->text('food_description');
            $table->string('donor_name');
            $table->string('phone_number');
            $table->string('city');
            $table->string('subdistrict');
            $table->text('address');
            $table->string('postal_code', 10);
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_donations');
    }
};
