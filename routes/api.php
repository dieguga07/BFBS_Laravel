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


Route::middleware('auth:api')->group(function () {
    
    // Usuarios
    Route::get('/validate-user', [AuthController::class, 'validateToken']);
    Route::delete('/delete-account/{id}',[UserController::class, 'deleteUser']);

    // Exercise
    Route::get('/exercise', [ExerciseController::class, 'getAllExercises']);
    Route::get('/exercise/{id}', [ExerciseController::class, 'getExercise']);
    Route::get('/exercise-category/{categoryName}', [ExerciseController::class, 'getExerciseByCategory']);
    Route::get('/exercise-search/search', [ExerciseController::class, 'searchExercise']);

    // Routine
    Route::post('/create-routine',[RoutineController::class, 'createRoutine']);
    Route::post('/create-user-routine/{id}/{user_id}',[RoutineController::class, 'userRoutine']);
    Route::get('/get-user-routines/{id}',[RoutineController::class, 'getUserRoutines']);
    Route::delete('/delete-routine/{id}',[RoutineController::class, 'deleteRoutine']);

    //Admin
    Route::post('/create-exercise', [AdminController::class, 'createExercise']);
    Route::delete('/deleteExercise/{id}', [AdminController::class, 'deleteExercise']);
    Route::put('/updateExercise/{id}', [AdminController::class, 'editExercise']);
    Route::get('/get-all-exercises', [AdminController::class, 'getAllExercises']);

    Route::post('/create-user', [AdminController::class, 'createUser']);
    Route::delete('/deleteUser/{id}', [AdminController::class, 'deleteUser']);
    Route::put('/edit-user/{id}', [AdminController::class, 'editUser']);
    Route::get('/get-all-users', [AdminController::class, 'getAllUsers']);
    
});
