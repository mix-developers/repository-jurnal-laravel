<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ThesesController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\FileCategoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/theses', [FrontController::class, 'theses'])->name('theses');
Route::get('/journal', [FrontController::class, 'journal'])->name('journal');
Route::get('/search', [FrontController::class, 'search'])->name('search');
Route::get('/download_theses/{id}', [ThesesController::class, 'download'])->name('download_theses');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        // lecturer
        Route::resource('lecturer', LecturerController::class)->except('show');
        // file categories
        Route::resource('file_categories', FileCategoryController::class)->except('show');
        // student
        Route::resource('student', StudentController::class)->except('show');
        // major
        Route::resource('major', MajorController::class)->except('show');
        // theses
        Route::resource('theses', ThesesController::class)->only(['index', 'show']);
        // journal
        Route::resource('journal', JournalController::class)->only(['index', 'show']);
        // users
        Route::get('/users/lecturers', [UserController::class, 'lecturers'])->name('users.lecturers');
        Route::get('/users/students', [UserController::class, 'students'])->name('users.students');
        Route::get('/users/lecturers_pending', [UserController::class, 'lecturers_pending'])->name('users.lecturers_pending');
        Route::get('/users/students_pending', [UserController::class, 'students_pending'])->name('users.students_pending');
        Route::put('/users/verifications/{id}', [UserController::class, 'verifications'])->name('users.verifications');
        Route::put('/users/graduated/{id}', [UserController::class, 'graduated'])->name('users.graduated');
        // profile
        Route::get('/profile', [UserController::class, 'profileAdmin'])->name('profileAdmin');
        Route::put('/updateProfile/{id}', [UserController::class, 'updateProfileAdmin'])->name('updateProfileAdmin');
    });

    Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa', 'middleware' => ['mahasiswa']], function () {
        Route::get('/', [HomeController::class, 'mahasiswa'])->name('dashboard');
        // theses
        Route::get('/theses', [ThesesController::class, 'mahasiswa'])->name('theses');
        // journal
        Route::get('/journal', [JournalController::class, 'mahasiswa'])->name('journal');
        Route::post('/journal/store', [JournalController::class, 'store'])->name('journal.store');
        // akun
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/updateProfile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
    });
});
