<?php

use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('projects',ProjectController::class);
    Route::apiResource('tasks',TaskController::class);

//------------------------------------------------------------------------------
    Route::post('logout', [RegisterController::class,'logout']);
});
Route::apiResource('users', UserController::class);
