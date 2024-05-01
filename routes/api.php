<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// Rutas para administradores
Route::post('/createExercise', [ExerciseController::class, 'createExercise']);
Route::delete('/deleteExercise/{id}', [ExerciseController::class, 'deleteExercise']);
Route::put('/updateExercise{id}', [ExerciseController::class, 'updateExercise']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::get('/exercise/{categoryName}', [ExerciseController::class, 'getExerciseByCategory']);
Route::get('/exercise', [ExerciseController::class, 'getAllExercises']);
Route::get('/exercise/search', [ExerciseController::class, 'searchExercise']);

Route::middleware('auth:api')->group(function () {
    
    // Rutas para usuarios
 


});
