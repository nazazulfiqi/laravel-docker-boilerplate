<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;

// --------------------------
// Public routes
// --------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Simple test route tanpa auth
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello World! 🌍']);
});

// --------------------------
// Protected routes (JWT required)
// --------------------------
Route::middleware(['jwt'])->group(function () {

    // Current authenticated user
    Route::get('/me', [AuthController::class, 'me']);

    // --------------------------
    // Admin routes (JWT + Role: Admin)
    // --------------------------
    Route::middleware(['role:admin'])->group(function () {

        // Admin-only test route
        Route::get('/admin/data', function () {
            return response()->json(['secret' => 'admin only 🔒']);
        });

        // Role management CRUD
        Route::resource('roles', RoleController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);

        // Permission management CRUD
        Route::prefix('permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index']);
            Route::get('/filter', [PermissionController::class, 'filter']);
            Route::post('/', [PermissionController::class, 'store']);
            Route::get('/{id}', [PermissionController::class, 'show']);
            Route::put('/{id}', [PermissionController::class, 'update']);
            Route::delete('/{id}', [PermissionController::class, 'destroy']);
        });

        // User management CRUD
        Route::resource('users', UserController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);

        // Attach permissions to role
        Route::post('/roles/{role}/permissions', [RoleController::class, 'attachPermissions']);
        // Detach permission from role
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'detachPermission']);

        // Assign/remove roles to/from user
        Route::post('/users/{user}/roles', [UserController::class, 'assignRoles']);
        Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole']);
    });
});
