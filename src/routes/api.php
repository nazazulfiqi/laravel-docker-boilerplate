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


Route::middleware(['jwt', 'role:admin'])->group(function () {
    Route::get('/roles', [\App\Http\Controllers\Api\RoleController::class, 'index']);
    Route::post('/roles', [\App\Http\Controllers\Api\RoleController::class, 'store']);
    Route::get('/roles/{id}', [\App\Http\Controllers\Api\RoleController::class, 'show']);
    Route::put('/roles/{id}', [\App\Http\Controllers\Api\RoleController::class, 'update']);
    Route::delete('/roles/{id}', [\App\Http\Controllers\Api\RoleController::class, 'destroy']);
});
