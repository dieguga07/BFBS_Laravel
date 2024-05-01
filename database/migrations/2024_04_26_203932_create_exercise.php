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
        Schema::create('exercise', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->integer('serie')->nullable();
            $table->integer('repetition')->nullable();
            $table->timestamps();
        });

        DB::table('exercise')->insert([
            [
                'name' => 'Flexiones de brazos',
                'image' => 'flexiones.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho y los brazos.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sentadillas',
                'image' => 'sentadillas.jpg',
                'description' => 'Ejercicio para fortalecer las piernas y glúteos.',
                'serie' => 4,
                'repetition' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abdominales',
                'image' => 'abdominales.jpg',
                'description' => 'Ejercicio para fortalecer los músculos abdominales.',
                'serie' => 3,
                'repetition' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Levantamiento de pesas',
                'image' => 'pesas.jpg',
                'description' => 'Ejercicio para aumentar la fuerza y masa muscular.',
                'serie' => 5,
                'repetition' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Burpees',
                'image' => 'burpees.jpg',
                'description' => 'Ejercicio cardiovascular que también fortalece los músculos.',
                'serie' => 3,
                'repetition' => 10,
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
        Schema::dropIfExists('exercise');
    }
};
