<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Simple test route tanpa auth
Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello World! 🌍'
    ]);
});

Route::middleware(['jwt'])->group(function () {

    Route::get('/me', [AuthController::class, 'me']);

    Route::middleware(['role:admin'])->get('/admin/data', function () {
        return response()->json(['secret' => 'admin only 🔒']);
    });
});
