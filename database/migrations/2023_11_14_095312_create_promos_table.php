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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();; // The title of the promo
            $table->text('description')->nullable();; // A description of the promo
            $table->date('start_date')->nullable();; // The start date of the promo
            $table->date('end_date')->nullable();; // The end date of the promo
            $table->decimal('discount_percentage', 5, 2)->nullable();; // The discount percentage for the promo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
