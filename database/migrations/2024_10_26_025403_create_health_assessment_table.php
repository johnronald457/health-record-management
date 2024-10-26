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
        Schema::create('health_assessment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('medical_history')->nullable(); 
            $table->float('height')->nullable(); 
            $table->float('weight')->nullable(); 
            $table->float('blood_pressure')->nullable(); 
            $table->float('heart_rate')->nullable(); 
            $table->text('symptoms')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_assessment');
    }
};
