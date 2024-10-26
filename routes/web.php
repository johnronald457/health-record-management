<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;

// Auth routes
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Doctor routes
Route::middleware('role:doctor')->group(function () {
    Route::get('/doctor-dashboard', function () {
        return view('admin.index');
    });
});

// Nurse routes
Route::middleware('role:nurse')->group(function () {
    Route::get('/nurse-dashboard', function () {
        return view('admin.index');
    });
});

// Routes accessible by both teacher and student
Route::middleware('role:teacher,student')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
});

// RedirectIfAuthenticated
Route::get('/', function () {
    return view('auth.login');
})->middleware(RedirectIfAuthenticated::class);
