<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RedirectIfAuthenticated;


Route::get('/', function () {
    return view('auth.login');
})->middleware(RedirectIfAuthenticated::class);

// Auth routes
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return 'Welcome to your dashboard!';
})->middleware('auth');


Route::get('/hello', function () {
    return view('admin.index');
});