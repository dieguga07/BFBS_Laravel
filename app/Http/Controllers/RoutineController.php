<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Routine;
use App\Models\Routine_exercise;
use App\Models\User;
use App\Models\User_routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function createRoutine(Request $request){

        $request->validate([
            'routine_name' => 'required',
            'exercises' => 'required',
            'exercises.*.exercise_id' => 'required',
            'exercises.*.serie' => 'required',
            'exercises.*.repetition' => 'required',
        ]);

        $routine = Routine::create([
            'name' => $request->input('routine_name'),
        ]);

        if(!$routine){
            return response()->json(['message' => 'Rutina no creada ',],400);
        }

        foreach ($request->input('exercises') as $exerciseData) {
            Routine_exercise::create([
                'routine_id' => $routine->id,
                'exercise_id' => $exerciseData['exercise_id'],
                'serie' => $exerciseData['serie'],
                'repetition' => $exerciseData['repetition'],
            ]);
        }
        
        return response()->json([
            'message' => 'Rutina creada exitosamente',
            'routine' => $routine->id
            ]
            ,201);
    }

    public function userRoutine($user_id, $id) {
     
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado', 'user_id' => $user_id], 404);
        }

        $routine = Routine::find($id);
        if (!$routine) {
            return response()->json(['message' => 'Rutina no encontrada', 'routine_id' => $id], 404);
        }
    
            $assigned = User_routine::create([
                'routine_id' => $id,
                'user_id' => $user_id,
            ]);
    
            if ($assigned) {
                return response()->json(['message' => 'Rutina asignada correctamente'], 201);
            } else {
                return response()->json(['message' => 'No se asigno la Rutina'], 400);
            }
      
    }

    public function getUserRoutines($id){   
    
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Obtener las rutinas del usuario
        $userRoutines = User_routine::where('user_id', $id)->get();

        $result = $userRoutines->map(function ($userRoutine) {
            $routine = Routine::find($userRoutine->routine_id);

            $exercises = Routine_exercise::where('routine_id', $routine->id)
                ->get()
                ->map(function ($routineExercise) {
                    $exercise = Exercise::find($routineExercise->exercise_id);
                    return [
                        'id' => $exercise->id,
                        'name' => $exercise->name,
                        'image' => $exercise->image,
                        'description' => $exercise->description,
                        'series' => $routineExercise->serie,
                        'repetitions' => $routineExercise->repetition,
                    ];
                });

            return [
                'routine_id' => $routine->id,
                'routine_name' => $routine->name,
                'exercises' => $exercises,
            ];
        });

        return response()->json($result);
    }




}



