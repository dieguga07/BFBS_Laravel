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
                'name' => 'Flexiones de Brazos',
                'image' => 'flexiones.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho y los brazos.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dominadas',
                'image' => 'dominadas.jpg',
                'description' => 'Ejercicio para fortalecer los músculos de la espalda y los brazos.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peso Muerto',
                'image' => 'peso_muerto.jpg',
                'description' => 'Ejercicio para fortalecer la parte baja de la espalda y las piernas.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Press de Banca con Barra',
                'image' => 'press_banca_barra.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho, hombros y tríceps.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Press de Pecho en Multipower',
                'image' => 'press_pecho_multipower.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho y los tríceps.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Press Militar',
                'image' => 'press_militar.jpg',
                'description' => 'Ejercicio para fortalecer los hombros y los tríceps.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elevaciones Laterales',
                'image' => 'elevaciones_laterales.jpg',
                'description' => 'Ejercicio para fortalecer los músculos laterales de los hombros.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elevaciones Posteriores',
                'image' => 'elevaciones_posteriores.jpg',
                'description' => 'Ejercicio para fortalecer los músculos posteriores de los hombros.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prensa',
                'image' => 'prensa.jpg',
                'description' => 'Ejercicio para fortalecer los músculos de las piernas.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Curl Predicador',
                'image' => 'curl_predicador.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del bíceps.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Curl con Barra Z',
                'image' => 'curl_barra_z.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del bíceps con una barra Z.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Curl Martillo con Mancuernas',
                'image' => 'curl_martillo_mancuernas.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del bíceps con mancuernas.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Curl en Polea Baja',
                'image' => 'curl_polea_baja.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del bíceps con polea baja.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Press de Copa',
                'image' => 'press_copa.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del tríceps.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Press Francés',
                'image' => 'press_frances.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del tríceps con barra.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Flexiones Diamante',
                'image' => 'flexiones_diamante.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del tríceps y el pecho.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Extensión de Tríceps en Polea',
                'image' => 'extension_triceps_polea.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del tríceps con polea alta.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fondos en Banca',
                'image' => 'fondos_banca.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho y los tríceps con el peso corporal.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plancha Lateral',
                'image' => 'plancha_lateral.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del abdomen y los oblicuos.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Crunch Sentado',
                'image' => 'crunch_sentado.jpg',
                'description' => 'Ejercicio para fortalecer los músculos abdominales.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plancha',
                'image' => 'plancha.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del core y la parte superior del cuerpo.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abdominales',
                'image' => 'abdominales.jpg',
                'description' => 'Ejercicio para fortalecer los músculos abdominales.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abdominales Cruzados',
                'image' => 'abdominales_cruzados.jpg',
                'description' => 'Ejercicio para fortalecer los músculos abdominales oblicuos.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Squeeze Bench Press',
                'image' => 'squeeze_bench_press.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho y los tríceps.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cruces en Polea Baja',
                'image' => 'cruces_polea_baja.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cruces en Polea Alta',
                'image' => 'cruces_polea_alta.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aperturas con Mancuernas',
                'image' => 'aperturas_mancuernas.jpg',
                'description' => 'Ejercicio para fortalecer los músculos del pecho.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Remo en Polea',
                'image' => 'remo_polea.jpg',
                'description' => 'Ejercicio para fortalecer los músculos de la espalda y los brazos.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jalón al Pecho',
                'image' => 'jalon_pecho.jpg',
                'description' => 'Ejercicio para fortalecer los músculos de la espalda y los brazos.',
                'serie' => 3,
                'repetition' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Remo Supino',
                'image' => 'remo_supino.jpg',
                'description' => 'Ejercicio para fortalecer los músculos de la espalda.',
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
