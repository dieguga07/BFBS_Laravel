<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller{

    //----------------------------------------------------------------------------------------------------------//
    //-------------------------------------------------Users----------------------------------------------------//
    //----------------------------------------------------------------------------------------------------------//

    public function getExerciseByCategory($categoryName){
        
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            return response()->json(['message' => 'Exercises not found'], 404);
        }

        $exercises = $category->exercises()->paginate(12);

        return response()->json($exercises);
    }

    public function getAllExercises(){
        
        $exercises = Exercise::paginate(12);

        return response()->json($exercises);

    }

    public function searchExercise(Request $request){
        
        $query = $request->input('query');

        $exercises = Exercise::where('name', 'LIKE', "%{$query}%")->paginate(12);

        return response()->json($exercises);
    }

    public function getExercise($id){

        $exercise = Exercise::find($id);

        if($exercise){
            return response()->json($exercise);
        }

            return response()->json(['error' => 'El ejercicio no se encontró.'], 404);
            
    }

}


