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
        Schema::create('class_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_class_id');
            $table->unsignedBigInteger('student_id');
            
            $table->foreign('my_class_id')->references('id')->on('my_classes');
            $table->foreign('student_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_students');
    }
};
