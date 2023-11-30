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
        Schema::create('mid_term_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_category_id');
            $table->string('activity_name');
            $table->date('date')->nullable();
            $table->bigInteger('maximum_score');
            
            $table->foreign('activity_category_id')->references('id')->on('activity_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mid_term_activities');
    }
};
