<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeroomTeacherController;
use App\Http\Controllers\HomeroomStudentController;
use App\Http\Controllers\HomeroomGradeController;

// ==== LOGIN ====
// Halaman login
Route::get('/login', function () {
    return view('login'); 
})->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// ==== LOGOUT ====
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==== DASHBOARD ADMIN ====
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('dashboard');

    // CRUD admin
    Route::resource('grades', GradeController::class);
    Route::resource('student', StudentController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('classrooms', ClassRoomController::class);
    Route::resource('homeroom', HomeroomTeacherController::class);
});



// ==== DASHBOARD HOMEROOM TEACHER / WALI KELAS ====
Route::middleware(['auth'])->prefix('homeroom')->name('homeroom.')->group(function () {

    // Dashboard Wali Kelas
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
         ->name('dashboard');

    // CRUD siswa khusus kelas yang dia ampu
    // StudentController@index sudah kita modifikasi agar
    // wali_kelas hanya melihat siswa di kelasnya
    Route::resource('students', StudentController::class);

    // CRUD nilai siswa (tugas, UTS, UAS, nilai akhir)
    Route::resource('grades', GradeController::class)->except(['show']);
});


// ==== DASHBOARD SISWA ====
Route::middleware(['auth'])->group(function () {
    Route::get('/student/grades', [GradeController::class, 'studentGrades'])
        ->name('student.grades');
});

// ==== LANDING PAGE ====
Route::get('/', function () {
    return redirect()->route('login');
});
