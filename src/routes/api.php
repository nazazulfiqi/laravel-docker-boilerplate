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

// Protected routes (JWT + role)
Route::middleware(['jwt.auth'])->group(function () {
    // Current authenticated user
    Route::get('/me', [AuthController::class, 'me']);

    // Contoh protected route dengan role admin
    Route::middleware(['role:admin'])->get('/admin/data', function () {
        return response()->json([
            'secret' => 'admin only data 🔒'
        ]);
    });
});
