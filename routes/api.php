<?php

use App\Interfaces\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::post('/registerUser', [UserController::class, 'store']);
    // Route::get('/', [UserController::class, 'index']);
    // Route::put('/{id}', [UserController::class, 'update']);
});

