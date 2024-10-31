<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\RequestsController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Doctor;
use App\Http\Middleware\Nurse;
use App\Http\Middleware\Patient;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Patient\InfoController;
use App\Http\Controllers\Patient\HealthAssessmentController;
use App\Http\Controllers\Patient\TreatmentController;
use App\Http\Controllers\Patient\MedicalRequestController;
use App\Http\Controllers\Patient\PatientDashboardController;

// Auth routes
Route::middleware(PreventBackHistory::class)->post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Doctor routes
    Route::middleware(Doctor::class)->group(function () {
        //Dahboard routes
        Route::get('/doctor-dashboard', function () {
            return view('admin.index');
        })->name('doctor.index');
        //Student management routes
        Route::get('/patients', [PatientController::class, 'index'])->name('admin.patient.index');
        Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
        Route::delete('/patients/{user}', [PatientController::class, 'destroy'])->name('admin.patient.destroy');
        //Requests management routes
        Route::get('/requests', [RequestsController::class, 'index'])->name('admin.requests.index');
        Route::put('/approve-request/{id}', [RequestsController::class, 'approve'])->name('admin.requests.approve-status');
        Route::delete('/request/{request}', [RequestsController::class, 'destroy'])->name('admin.requests.destroy');
    });

    // Nurse routes
    Route::middleware(Nurse::class)->group(function () {
        Route::get('/nurse-dashboard', function () {
            return view('admin.index');
        });
    });
    
    Route::middleware(Patient::class)->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('patient.index');
        // })->name('patient.index');
        
        Route::get('/dashboard', [PatientDashboardController::class, 'dashboard'])->name('patient.index');
        Route::get('/info', [InfoController::class, 'getUserInfo'])->name('patient.info');
        Route::get('/health-assessment', [HealthAssessmentController::class, 'getHealthRecord'])->name('patient.health-assessment');
        Route::get('/health-assessment-add', [HealthAssessmentController::class, 'create'])->name('patient.create-health-assessment');
        Route::post('health-assessment-store', [HealthAssessmentController::class, 'store'])->name('patient.health-assessment.store');
        Route::get('/health-assessment/{id}/edit', [HealthAssessmentController::class, 'edit'])->name('health.edit');
        Route::post('/health-assessment/{id}/update', [HealthAssessmentController::class, 'update'])->name('health.update');

        Route::get('/treatment', [TreatmentController::class, 'getUserTreatment'])->name('patient.treatment');

        Route::get('medical-request/create', [MedicalRequestController::class, 'create'])->name('patient.medical-request');
        Route::post('medical-request', [MedicalRequestController::class, 'store'])->name('patient.medical-request.store');
        
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
