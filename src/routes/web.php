<?php

use App\Http\Controllers\Web\AuthWebController;
use App\Http\Controllers\Web\DashboardWebController;
use Illuminate\Support\Facades\Route;

//welocme
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

// Guest page
Route::get('/login', [AuthWebController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthWebController::class, 'showRegister'])->name('register');

// Auth action (request ke API)
Route::post('/login', [AuthWebController::class, 'login']);
Route::post('/register', [AuthWebController::class, 'register']);


// Dashboard (contoh)
Route::get('/dashboard', [DashboardWebController::class, 'index'])->middleware('auth.web');
Route::post('/logout', [AuthWebController::class, 'logout'])->name('logout');
