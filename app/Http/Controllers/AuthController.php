<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  
    public function login(Request $request){
    
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:3',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token')->accessToken;
     
            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function validateToken(){

        $user = Auth::user();

        if ($user) {
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }


}

