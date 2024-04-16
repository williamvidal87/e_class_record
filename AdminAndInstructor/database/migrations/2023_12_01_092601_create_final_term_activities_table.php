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
        Schema::create('final_term_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_category_id');
            $table->string('activity_name');
            $table->date('date')->nullable();
            $table->bigInteger('maximum_score');
            
            $table->foreign('activity_category_id')->references('id')->on('final_activity_categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_term_activities');
    }
};
