<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Doctor;
use App\Http\Middleware\Nurse;
use App\Http\Middleware\Patient;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Patient\InfoController;
use App\Http\Controllers\Patient\HealthAssessmentController;
use App\Http\Controllers\Patient\TreatmentController;

// Auth routes
Route::middleware(PreventBackHistory::class)->post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Doctor routes
    Route::middleware(Doctor::class)->group(function () {
        //Dahboard routes
        Route::get('/doctor-dashboard', function () {
            return view('admin.index');
        });
        //Student management routes
        Route::get('/patients', [PatientController::class, 'index'])->name('admin.patient.index');
        Route::delete('/patients/{user}', [PatientController::class, 'destroy'])->name('admin.patient.destroy');
    });

    // Nurse routes
    Route::middleware(Nurse::class)->group(function () {
        Route::get('/nurse-dashboard', function () {
            return view('admin.index');
        });
    });
    
    Route::middleware(Patient::class)->group(function () {
        Route::get('/dashboard', function () {
            return view('patient.index');
        });
        Route::get('/info', [InfoController::class, 'getUserInfo'])->name('patient.info');
        Route::get('/health-record', [HealthAssessmentController::class, 'getHealthRecord'])->name('patient.health-record');
        Route::get('/treatment', [TreatmentController::class, 'index'])->name('patient.treatment');
    });
});

// RedirectIfAuthenticated
Route::get('/', function () {
    return view('auth.login')->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
        ]);
})->middleware(RedirectIfAuthenticated::class);
Route::get('/login', function () {
    return view('auth.login')->withHeaders([
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
        ]);
})->middleware(RedirectIfAuthenticated::class);

// Error 404 Not Found
Route::get('/error', function () {
    return view('error');
})->name('error');
