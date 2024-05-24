<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\RoutineController;
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


Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::get('/prueba', [AdminController::class, 'prueba']);


Route::middleware('auth:api')->group(function () {
    
    // Usuarios
    Route::get('/validate-user', [AuthController::class, 'validateToken']);


    // Exercise
    Route::get('/exercise', [ExerciseController::class, 'getAllExercises']);
    Route::get('/exercise/{id}', [ExerciseController::class, 'getExercise']);
    Route::get('/exercise-category/{categoryName}', [ExerciseController::class, 'getExerciseByCategory']);
    Route::get('/exercise-search/search', [ExerciseController::class, 'searchExercise']);

    // Routine
    Route::post('/create-routine',[RoutineController::class, 'createRoutine']);


    //Admin
    Route::post('/createExercise', [AdminController::class, 'createExercise']);
    Route::delete('/deleteExercise/{id}', [AdminController::class, 'deleteExercise']);
    Route::put('/updateExercise{id}', [AdminController::class, 'updateExercise']);
    

    

});
