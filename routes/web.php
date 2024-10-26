<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Doctor;
use App\Http\Middleware\Nurse;
use App\Http\Middleware\Patient;


// Auth routes
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Doctor routes
    Route::middleware(Doctor::class)->group(function () {
        Route::get('/doctor-dashboard', function () {
            return view('admin.index');
        });
    });

    // Nurse routes
    Route::middleware(Nurse::class)->group(function () {
        Route::get('/nurse-dashboard', function () {
            return view('admin.index');
        });
    });

    // Routes accessible by both teacher and student
    Route::middleware(Patient::class)->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        });
    });
});

// RedirectIfAuthenticated
Route::get('/', function () {
    return view('auth.login');
})->middleware(RedirectIfAuthenticated::class);
Route::get('/login', function () {
    return view('auth.login');
})->middleware(RedirectIfAuthenticated::class);

// Error 404 Not Found
Route::get('/error', function () {
    return view('error');
})->name('error');
