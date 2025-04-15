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
            $table->string('request_type');
            $table->string('description')->nullable();
            $table->enum('status', ['pending', 'in-progress', 'done'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->date('preferred_date')->nullable();
            $table->date('schedule_date')->nullable();
            $table->date('test_date')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('findings')->nullable();
            $table->string('doctor_comments')->nullable();
            $table->string('AI_comments')->nullable();
            $table->enum('condition', ['Unspecified', 'Sensitive', 'Non-sensitive'])->default('Unspecified');
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
