<?php

use App\Http\Controllers\Doctor\DoctorCommentsController;
use App\Http\Controllers\Doctor\HealthRecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\RequestsController;
use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\DoctorTreatmentController;
use App\Http\Controllers\Nurse\NursePatientController;
use App\Http\Controllers\Nurse\NurseDashboardController;
use App\Http\Controllers\Nurse\NurseTreatmentController;
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
        //Search routes
        Route::prefix('doctor')->name('admin.')->group(function () {
            Route::get('/treatments/search', [DoctorTreatmentController::class, 'search'])->name('treatments.search');
            Route::get('/patients/search', [PatientController::class, 'search'])->name('patient.search');
            Route::get('/health-record/search', [HealthRecordController::class, 'search'])->name('health-record.search');
        });
        //Dahboard routes
        Route::get('/doctor-dashboard', [DashboardController::class, 'index'])->name('doctor.index');

        //Student management routes
        Route::get('/doctor/patients', [PatientController::class, 'index'])->name('admin.patient.index');
        Route::get('/doctor/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
        Route::get('/doctor/patient-info/{id}', [PatientController::class, 'edit'])->name('admin.patient.edit');
        Route::post('/doctor/patient-info/{id}/update', [PatientController::class, 'update'])->name('admin.patient.update');
        Route::delete('/doctor/patients/{user}', [PatientController::class, 'destroy'])->name('admin.patient.destroy');

        //Treatment management routes
        Route::get('/doctor/treatments', [DoctorTreatmentController::class, 'index'])->name('admin.treatment.index');
        Route::get('/doctor/treatment/{id}', [DoctorTreatmentController::class, 'show'])->name('admin.treatment.show');
        Route::get('/doctor/health-assessment/{id}', [DoctorTreatmentController::class, 'edit'])->name('admin.health.edit');
        Route::post('/doctor/health-assessment/{id}/', [DoctorTreatmentController::class, 'update'])->name('admin.health.update');
        Route::delete('/doctor/treatment/{treatment}', [DoctorTreatmentController::class, 'destroy'])->name('admin.treatment.destroy');

        //Doctor Treatment comments routes
        Route::get('/doctor/comments/create', [DoctorCommentsController::class, 'create'])->name('admin.create.comments');
        Route::post('/doctor/comments/store', [DoctorCommentsController::class, 'store'])->name('admin.comments.store');
        Route::get('/admin/comments/edit/{id}', [DoctorCommentsController::class, 'edit'])->name('admin.edit.comments');
        Route::put('/admin/comments/update/{id}', [DoctorCommentsController::class, 'update'])->name('admin.update.comments');

        //Requests management routes
        Route::get('/doctor/requests-input', [RequestsController::class, 'index'])->name('admin.requests.index');
        Route::put('/doctor/approve-request/{id}', [RequestsController::class, 'approve'])->name('admin.requests.approve-status');
        Route::delete('/doctor/request/{request}', [RequestsController::class, 'destroy'])->name('admin.requests.destroy');

        //Health record management routes
        Route::get('/doctor/health-record', [HealthRecordController::class, 'index'])->name('admin.health-record.index');
        Route::get('/patient/health-record-history/{id}', [HealthRecordController::class, 'show'])->name('patient.health-record-history.show');
    });

    // Nurse routes
    Route::middleware(Nurse::class)->group(function () {
        Route::get('/nurse/patients/search', [NursePatientController::class, 'search'])->name('admin.patient.search');

        Route::get('/nurse-dashboard', [NurseDashboardController::class, 'index'])->name('nurse.index');
        //search route
        Route::get('/nurse/patients/search', [NursePatientController::class, 'search'])->name('admin.patient.search');
        //Student management routes
        Route::get('/nurse/patients', [NursePatientController::class, 'index'])->name('nurse.patient.index');
        Route::get('/nurse/patients/{id}', [NursePatientController::class, 'show'])->name('nurse.patients.show');
        Route::get('/nurse/patient-info/{id}', [NursePatientController::class, 'edit'])->name('nurse.patient.edit');
        Route::post('/nurse/patient-info/{id}/update', [NursePatientController::class, 'update'])->name('nurse.patient.update');
        //Treatment management routes
        Route::get('/nurse/treatments', [NurseTreatmentController::class, 'index'])->name('nurse.treatment.index');
        Route::get('/nurse/treatment/{id}', [NurseTreatmentController::class, 'show'])->name('nurse.treatment.show');
        Route::get('/nurse/health-assessment/{id}', [NurseTreatmentController::class, 'edit'])->name('nurse.health.edit');
        Route::post('/nurse/health-assessment/{id}/', [NurseTreatmentController::class, 'update'])->name('nurse.health.update');

        // Doctor Comments Routes
    });

    Route::middleware(Patient::class)->group(function () {

        Route::get('/dashboard', [PatientDashboardController::class, 'dashboard'])->name('patient.index');
        Route::get('/info', [InfoController::class, 'getUserInfo'])->name('patient.info');
        Route::get('/health-assessment-create', [HealthAssessmentController::class, 'create'])->name('patient.create-health-assessment');
        Route::post('/health-assessment-store', [HealthAssessmentController::class, 'store'])->name('patient.health-assessment.store');
        Route::get('/health-assessment/{id}/edit', [HealthAssessmentController::class, 'edit'])->name('health.edit');
        Route::post('/health-assessment/{id}/update', [HealthAssessmentController::class, 'update'])->name('health.update');

        Route::get('/treatment', [TreatmentController::class, 'getUserTreatment'])->name('patient.treatment');
        Route::get('/medical-result', function () {
            return view('patient.medical-result');
        })->name('patient.medical-result');
        // need to edit for resposive
        Route::get('/health-record', function () {
            return view('patient.health-record');
        })->name('patient.health-record');

        Route::get('/health-record-history', function () {
            return view('patient.health-record-history');
        })->name('patient.health-record-history');
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
