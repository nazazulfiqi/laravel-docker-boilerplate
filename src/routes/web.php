<?php

use App\Http\Controllers\Web\AuthWebController;
use App\Http\Controllers\Web\DashboardWebController;
use App\Http\Controllers\Web\PermissionWebController;
use App\Http\Controllers\Web\RoleWebController;
use App\Http\Controllers\Web\UserWebController;
use Illuminate\Support\Facades\Route;

//welocme
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

// Guest page
Route::get('/', [AuthWebController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthWebController::class, 'showRegister'])->name('register');

// Auth action (request ke API)
Route::post('/login', [AuthWebController::class, 'login']);
Route::post('/register', [AuthWebController::class, 'register']);


// Dashboard
Route::get('/dashboard', [DashboardWebController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth.web');

Route::get('/users', [UserWebController::class, 'index'])
    ->name('users')
    ->middleware('auth.web');

Route::middleware(['auth.web'])->group(function () {
    Route::get('/permissions', [PermissionWebController::class, 'index'])->name('permissions');

    Route::get('/permissions/create', [PermissionWebController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/save', [PermissionWebController::class, 'save'])->name('permissions.save');

    Route::get('/permissions/{id}/edit', [PermissionWebController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}/update', [PermissionWebController::class, 'update'])->name('permissions.update');

    Route::delete('/permissions/{id}', [PermissionWebController::class, 'delete'])->name('permissions.delete');
});


Route::get('/roles', [RoleWebController::class, 'index'])
    ->name('roles')
    ->middleware('auth.web');

Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');
