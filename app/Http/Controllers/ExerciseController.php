<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\Exercise_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller{

    //----------------------------------------------------------------------------------------------------------//
    //-------------------------------------------------Users----------------------------------------------------//
    //----------------------------------------------------------------------------------------------------------//

    public function getExerciseByCategory($categoryName) {
        
    
        $category = Category::where('name', $categoryName)->first();
    
        if (!$category) {
            return response()->json(['error' => 'Category not found: ' . $categoryName], 404);
        }

        $exerciseIds = Exercise_category::where('category_id', $category->id)->pluck('exercise_id');
    
        $exercises = Exercise::whereIn('id', $exerciseIds)->paginate(12);
    
        return response()->json($exercises);
    }


    public function getAllExercises(){
        
        $exercises = Exercise::paginate(12);

        return response()->json($exercises);

    }

    public function searchExercise(Request $request){

        // Validar si la variable de búsqueda existe en la solicitud
        $request->validate([
            'query' => 'required|string',
        ]);
        
        $query = $request->input('query');

        $exercises = Exercise::where('name', 'like', "%{$query}%")->paginate(12);

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


