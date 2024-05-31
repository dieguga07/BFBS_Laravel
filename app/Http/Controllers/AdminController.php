<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller{

    public function createUser(Request $request){

        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }
    
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:user,email',
            'password' => 'required|string',
            'admin' => 'boolean|required'
        ]);

        $hashedPassword = Hash::make($request->input('password'));

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'admin' => $request->input('admin'),

        ]);

        if( !$user ){
            return response()->json(['msg' => 'Error , User not created']);
        }
        
        return response()->json([
            'msg' => 'User created',
            'User' => $user,
        ]);

    }

    public function deleteUser($id){

        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }

        $user = User::find($id);

        if ($user->admin) {
            return response()->json(["msg" => "No puede eliminar un usuario administrador."], 201);
        }

        $user->delete();
        
        return response()->json([
            'msg' => "Usuario eliminado correctamente.",
            'usuario' => $user
        ]);


    }

    public function updateUser(Request $request){
        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:user,email,'.$request->id,
            'password' => 'required|string',
            'admin' => 'required|boolean'
        ]);

       $user = User::find($request->id);
        if($user){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'admin' => $request->admin,
            ]);

            return response()->json([
                'msg' => 'User updated.',
                'recipe' => $user
            ]);
        } else {
            return response()->json([
                'msg' => 'User not found.'
            ], 404);
        }
    
    }
 
    public function getAllUsers(){

        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }

        $user = User::all();

        return response()->json($user);
    }

// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------

    public function createExercise(Request $request){

        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }

        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|string',
            'description' => 'required|string',
        ]);

        Exercise::create([
            'name'=> $request->name,
            'image'=> $request->image,
            'description'=> $request->description,
        ]);

        return response()->json(['message' => 'Exercise created'], 200);

    } 

    public function deleteExercise($id){
        
        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }

        $exercise = Exercise::find($id);

        if (!$exercise) {
            return response()->json(['error' => 'El ejercicio no fue encontrado'], 404);
        }

        $exercise->delete();

        return response()->json(['message' => 'El ejercicio fue eliminado exitosamente'],200);
    }

    public function updateExercise(Request $request, $id){

        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }

        $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'description' => 'required|string',
        ]);

        $exercise = Exercise::find($id);

        if (!$exercise) {
            return response()->json(['error' => 'El ejercicio no fue encontrado'], 404);
        }

        $exercise->update($request->all());

        return response()->json(['message' => 'El ejercicio fue actualizado exitosamente', 'exercise' => $exercise], 200);
    }


    public function getAllExercises(){

        if (!Auth::user()->admin) {
            return response()->json(['error' => 'No tienes permisos para realizar esta acción.'], 403);
        }
        
        $exercises = Exercise::all();

        return response()->json($exercises);

    }

    
   
 
}


