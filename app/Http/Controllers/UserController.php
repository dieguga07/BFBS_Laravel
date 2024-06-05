<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        public function register(Request $request)
    {
     
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:user,email',
            'password' => 'required|string',
        ]);

        $hashedPassword = Hash::make($request->input('password'));

       $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
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
        $user = User::find($id);

        if (!$user) {
            return response()->json(['msg' => 'Usuario no encontado'], 404);
        }

        $user->delete();

        return response()->json(['msg' => 'Usuario eliminado']);
    }

}
