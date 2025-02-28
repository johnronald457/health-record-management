<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('treatments', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    //         $table->foreignId('health_assessment_id')->constrained('health_assessments')->onDelete('cascade');
    //         $table->text('interpretation_comments');
    //         $table->text('recommendations');
    //         $table->text('prescriptions');
    //         $table->text('result_summary');
    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('health_assessment_id');
            $table->text('interpretation_comments')->nullable();
            $table->text('recommendations')->nullable();
            $table->text('prescriptions')->nullable();
            $table->text('result_summary')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('health_assessment_id')->references('id')->on('health_assessments')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
