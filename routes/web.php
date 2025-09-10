<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DashboardController;

// ==== LOGIN ====
// Halaman login
Route::get('/login', function () {
    return view('login'); // file: resources/views/login.blade.php
})->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
// ==== LOGOUT ====
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==== DASHBOARD WALI KELAS ====
Route::prefix('wali_kelas')->name('homeroom.')->group(function () {
    Route::get('/dashboard', function () {
        return view('homeroom.dashboard'); // file: resources/views/homeroom/dashboard.blade.php
    })->name('dashboard');

    Route::resource('grades', GradeController::class);
    Route::resource('student', StudentController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('classrooms', ClassRoomController::class);
});




// ==== DASHBOARD SISWA ====


// Dashboard siswa
Route::prefix('students')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'studentDashboard'])
        ->name('student.dashboard');
});


// ==== OPSIONAL (landing page) ====
Route::get('/', function () {
    return redirect()->route('login');
});


// ==== Resource CRUD (opsional) ====

Route::resource('students', StudentController::class);


