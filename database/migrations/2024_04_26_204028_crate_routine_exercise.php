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
        Schema::create('routine_exercise', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routine_id')->references('id')->on('routine')->onDelete('cascade');
            $table->foreignId('exercise_id')->references('id')->on('exercise')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routine_exercise');
    }
};
