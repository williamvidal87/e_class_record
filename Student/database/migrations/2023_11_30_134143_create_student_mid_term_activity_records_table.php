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
        Schema::create('student_mid_term_activity_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mid_term_activity_id');
            $table->unsignedBigInteger('student_id');
            $table->bigInteger('score')->nullable();
            
            $table->foreign('mid_term_activity_id')->references('id')->on('mid_term_activities');
            $table->foreign('student_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_mid_term_activity_records');
    }
};
