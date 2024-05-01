<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('category')->insert([
            [
                'name' => 'Brazos',
               'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Piernas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abdomen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pecho',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Espalda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hombros',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
