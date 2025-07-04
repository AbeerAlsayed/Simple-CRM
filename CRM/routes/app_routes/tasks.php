<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tasks', TaskController::class);
});
