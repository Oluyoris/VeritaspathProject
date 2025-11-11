<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/works', [WorkController::class, 'indexPublic'])->name('works.index');
Route::get('/works/{work}', [WorkController::class, 'show'])->name('works.show');
Route::get('/works/{work}/apply', [ApplicantController::class, 'create'])->name('applicants.create');
Route::post('/works/{work}/apply', [ApplicantController::class, 'store'])->name('applicants.store');

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Admin routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/settings', [AdminController::class, 'showSettingsForm'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::resource('works', WorkController::class)->names('admin.works');
    Route::get('works/{work}/applicants', [ApplicantController::class, 'index'])->name('admin.applicants.index');
    Route::get('/applicants', [ApplicantController::class, 'allApplicants'])->name('admin.applicants.all');
});