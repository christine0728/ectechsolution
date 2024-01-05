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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid')->constrained('users');
            $table->foreignId('serviceId')->constrained('services');
            $table->text('description', 100)->nullable();
            $table->text('comment')->nullable();
            $table->text('status', 100)->default('pending');
            $table->date('status_updated')->nullable();
            $table->date('start');
            $table->date('end');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
