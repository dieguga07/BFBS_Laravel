<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Routine;
use App\Models\Routine_exercise;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function createRoutine(Request $request){

        $request->validate([
            'routine_name' => 'required|string',
            'exercises' => 'required|array',
            'exercises.*.exercise_id' => 'required|integer|exists:exercise,id',
            'exercises.*.serie' => 'required|integer|min:1',
            'exercises.*.repetition' => 'required|integer|min:1',
        ]);

        $routine = Routine::create([
            'name' => $request->input('routine_name'),
        ]);

        foreach ($request->input('exercises') as $exerciseData) {
            Routine_exercise::create([
                'routine_id' => $routine->id,
                'exercise_id' => $exerciseData['exercise_id'],
                'serie' => $exerciseData['serie'],
                'repetition' => $exerciseData['repetition'],
            ]);
        }
        
        return response()->json(
            [
            'message' => 'Rutina creada exitosamente',
            'routine' => $routine->id
            ]
            ,201);
    }
}



