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
        Schema::create('medical_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id'); 
            $table->date('preferred_date')->nullable(); 
            $table->text('notes')->nullable();
            $table->enum('status', ['request', 'approved']); 
            $table->timestamps(); 
            
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_requests');
    }
};
