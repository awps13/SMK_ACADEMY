<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Teacher\MateriController as TeacherMateri;
use App\Http\Controllers\Teacher\KursusController as TeacherKursusController;
use App\Http\Controllers\Teacher\DiskusiController as TeacherDiskusiController;
use App\Http\Controllers\Student\MateriController as StudentMateri;
use App\Http\Controllers\Student\KursusController as StudentKursusController;
use App\Http\Controllers\KomentarController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard untuk Student
Route::get('/dashboard', function () {
    return view('student/dashboard');
})->middleware(['auth', 'verified', 'rolemanager:student'])->name('student.dashboard');

// Dashboard untuk Teacher
Route::get('/teacher/dashboard', function () {
    return view('teacher/dashboard');
})->middleware(['auth', 'verified', 'rolemanager:teacher'])->name('teacher.dashboard');

// ROUTE DENGAN AUTH
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | TEACHER ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware('rolemanager:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::resource('materi', TeacherMateri::class);
        Route::resource('users', UserController::class);
        Route::get('/diskusi', [TeacherDiskusiController::class, 'index'])->name('diskusi.index');
        Route::get('/diskusi/{subMateri}', [TeacherDiskusiController::class, 'show'])->name('diskusi.show');
    });

    /*
    |--------------------------------------------------------------------------
    | STUDENT ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware('rolemanager:student')->prefix('student')->name('student.')->group(function () {
        Route::get('materi', [StudentMateri::class, 'index'])->name('materi.index');
        Route::get('materi/{id}', [StudentMateri::class, 'show'])->name('materi.show');
        Route::get('materi-saya', [StudentMateri::class, 'materiSaya'])->name('materi.saya');
        Route::post('materi/ambil/{id}', [StudentMateri::class, 'ambilMateri'])->name('ambil.materi');
        Route::post('materi/{id}/ambil', [StudentMateri::class, 'ambilMateri'])->name('materi.ambil');
    });

    /*
    |--------------------------------------------------------------------------
    | PROFILE ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('komentar/{subMateriId}', [KomentarController::class, 'store'])->name('komentar.store');
});

require __DIR__ . '/auth.php';
