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
        Schema::create('activity_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_class_id');
            $table->string('activity_category');
            $table->bigInteger('percentage');
            $table->bigInteger('multiply');
            $table->bigInteger('addition');
            
            $table->foreign('my_class_id')->references('id')->on('my_classes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_categories');
    }
};
