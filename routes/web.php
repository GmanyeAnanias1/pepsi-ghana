<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Applicant\ApplicationController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\Applicant\JobController as ApplicantJobController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Applicant\ApplicationController as ApplicantApplicationController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Jobs management
    Route::resource('jobs', AdminJobController::class);

    // Applications management
    Route::get('/applications', [AdminApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [AdminApplicationController::class, 'show'])->name('applications.show');
    Route::post('/applications/{application}/interview', [AdminApplicationController::class, 'setInterview'])->name('applications.interview');
    Route::post('/applications/{application}/approve', [AdminApplicationController::class, 'approve'])->name('applications.approve');
    Route::post('/applications/{application}/reject', [AdminApplicationController::class, 'reject'])->name('applications.reject');
});

// Applicant routes
Route::middleware(['auth','applicant'])->prefix('applicant')->name('applicant.')->group(function () {
    // Dashboard
    Route::get('/user-dashboard', [ApplicationController::class,'index'])->name('applicant.dashboard');

    // Browse jobs
    Route::get('/jobs', [ApplicantJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [ApplicantJobController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{job}/apply', [ApplicantJobController::class, 'showApplyForm'])->name('jobs.apply.form');
    // Apply for a job
    Route::post('/jobs/{job}/apply', [ApplicantJobController::class, 'apply'])->name('jobs.apply');

    // View applications
    Route::get('/applications', [ApplicantApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [ApplicantApplicationController::class, 'show'])->name('applications.show');
});
require __DIR__.'/auth.php';
