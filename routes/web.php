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
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ReportController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/theses', [FrontController::class, 'theses'])->name('theses');
Route::get('/journal', [FrontController::class, 'journal'])->name('journal');
Route::get('/search', [FrontController::class, 'search'])->name('search');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/download_theses/{id}', [ThesesController::class, 'download'])->name('download_theses');
    Route::get('/akun', [FrontController::class, 'akun'])->name('akun');
    Route::get('/data_mahasiswa', [FrontController::class, 'data_mahasiswa'])->name('data_mahasiswa');

    Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        // lecturer
        Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer');
        Route::post('/lecturer/store', [LecturerController::class, 'store'])->name('lecturer.store');
        Route::get('/lecturer/show/{id}', [LecturerController::class, 'show'])->name('lecturer.show');
        Route::put('/lecturer/update/{id}', [LecturerController::class, 'update'])->name('lecturer.update');
        Route::delete('/lecturer/destroy/{id}', [LecturerController::class, 'destroy'])->name('lecturer.destroy');
        // file categories
        Route::get('/file_categories', [FileCategoryController::class, 'index'])->name('file_categories');
        Route::post('/file_categories/store', [FileCategoryController::class, 'store'])->name('file_categories.store');
        Route::put('/file_categories/update/{id}', [FileCategoryController::class, 'update'])->name('file_categories.update');
        Route::delete('/file_categories/destroy/{id}', [FileCategoryController::class, 'destroy'])->name('file_categories.destroy');
        // student
        Route::get('/student', [StudentController::class, 'index'])->name('student');
        Route::get('/student/show/{id}', [StudentController::class, 'show'])->name('student.show');
        // major
        Route::get('/major', [MajorController::class, 'index'])->name('major');
        Route::post('/major/store', [MajorController::class, 'store'])->name('major.store');
        Route::put('/major/update/{id}', [MajorController::class, 'update'])->name('major.update');
        Route::delete('/major/destroy/{id}', [MajorController::class, 'destroy'])->name('major.destroy');
        // theses
        Route::get('/theses', [ThesesController::class, 'index'])->name('theses');
        Route::get('/theses/show/{id}', [ThesesController::class, 'show'])->name('theses.show');
        Route::post('/theses/storeAdmin', [ThesesController::class, 'storeAdmin'])->name('theses.storeAdmin');
        Route::post('/theses/storeAdditional', [ThesesController::class, 'storeAdditional'])->name('theses.storeAdditional');
        Route::put('/theses/update/{id}', [ThesesController::class, 'update'])->name('theses.update');
        Route::put('/theses/updateAdditional/{id}', [ThesesController::class, 'updateAdditional'])->name('theses.updateAdditional');
        // journal
        Route::get('journal', [JournalController::class, 'index'])->name('journal');
        Route::get('journal/show/{id}', [JournalController::class, 'show'])->name('journal.show');
        Route::post('/journal/check', [JournalController::class, 'check'])->name('journal.check');
        Route::put('/journal/publish/{id}', [JournalController::class, 'publish'])->name('journal.publish');
        Route::post('/journal/accept', [JournalController::class, 'accept'])->name('journal.accept');
        Route::post('/journal/reject', [JournalController::class, 'reject'])->name('journal.reject');
        Route::post('/journal/storeAdmin', [JournalController::class, 'storeAdmin'])->name('journal.storeAdmin');
        Route::put('/journal/updateAdmin/{id}', [JournalController::class, 'updateAdmin'])->name('journal.updateAdmin');
        //mentor
        Route::post('/mentor/store', [MentorController::class, 'store'])->name('mentor.store');
        Route::put('/mentor/update/{id}', [MentorController::class, 'update'])->name('mentor.update');
        Route::delete('/mentor/destroy/{id}', [MentorController::class, 'destroy'])->name('mentor.destroy');
        // users
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/lecturers', [UserController::class, 'lecturers'])->name('users.lecturers');
        Route::get('/users/admin', [UserController::class, 'admin'])->name('users.admin');
        Route::get('/users/students', [UserController::class, 'students'])->name('users.students');
        Route::get('/users/lecturers_pending', [UserController::class, 'lecturers_pending'])->name('users.lecturers_pending');
        Route::get('/users/students_pending', [UserController::class, 'students_pending'])->name('users.students_pending');
        Route::put('/users/verifications/{id}', [UserController::class, 'verifications'])->name('users.verifications');
        Route::put('/users/graduated/{id}', [UserController::class, 'graduated'])->name('users.graduated');
        Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        // profile
        Route::get('/profile', [UserController::class, 'profileAdmin'])->name('profileAdmin');
        Route::put('/updateProfile/{id}', [UserController::class, 'updateProfileAdmin'])->name('updateProfileAdmin');
        //laporan
        Route::get('/report/mahasiswa', [ReportController::class, 'mahasiswa'])->name('report.mahasiswa');
        Route::get('/report/exportMahasiswa', [ReportController::class, 'exportMahasiswa'])->name('report.exportMahasiswa');
        Route::get('/report/journal', [ReportController::class, 'journal'])->name('report.journal');
        Route::get('/report/exportJournal', [ReportController::class, 'exportJournal'])->name('report.exportJournal');
        Route::get('/report/theses', [ReportController::class, 'theses'])->name('report.theses');
        Route::get('/report/exportTheses', [ReportController::class, 'exportTheses'])->name('report.exportTheses');
        Route::get('/report/dosen', [ReportController::class, 'dosen'])->name('report.dosen');
        Route::get('/report/exportDosen', [ReportController::class, 'exportDosen'])->name('report.exportDosen');
    });

    Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa', 'middleware' => ['mahasiswa']], function () {
        Route::get('/', [HomeController::class, 'mahasiswa'])->name('dashboard');
        // theses
        Route::get('/theses', [ThesesController::class, 'mahasiswa'])->name('theses');
        Route::post('/theses/store', [ThesesController::class, 'store'])->name('theses.store');
        Route::post('/theses/storeAdditional', [ThesesController::class, 'storeAdditional'])->name('theses.storeAdditional');
        Route::put('/theses/update/{id}', [ThesesController::class, 'update'])->name('theses.update');
        Route::put('/theses/updateAdditional/{id}', [ThesesController::class, 'updateAdditional'])->name('theses.updateAdditional');
        // journal
        Route::get('/journal', [JournalController::class, 'mahasiswa'])->name('journal');
        Route::post('/journal/store', [JournalController::class, 'store'])->name('journal.store');
        Route::put('/journal/update/{id}', [JournalController::class, 'update'])->name('journal.update');
        Route::put('/journal/revisi/{id}', [JournalController::class, 'revisi'])->name('journal.revisi');
        // mentors
        Route::get('/mentor/create', [MentorController::class, 'create'])->name('mentor.create');
        Route::post('/mentor/store', [MentorController::class, 'store'])->name('mentor.store');
        Route::put('/mentor/update/{id}', [MentorController::class, 'update'])->name('mentor.update');
        Route::delete('/mentor/destroy/{id}', [MentorController::class, 'destroy'])->name('mentor.destroy');
        // akun

        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/updateProfile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::put('/updatePassword/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
    });
    Route::group(['prefix' => 'jurusan', 'as' => 'jurusan', 'middleware' => ['jurusan']], function () {
        Route::get('/', [HomeController::class, 'jurusan'])->name('dashboard');
        Route::get('/report/mahasiswa', [ReportController::class, 'mahasiswa'])->name('report.mahasiswa');
        Route::get('/report/exportMahasiswa', [ReportController::class, 'exportMahasiswa'])->name('report.exportMahasiswa');
        Route::get('/report/journal', [ReportController::class, 'journal'])->name('report.journal');
        Route::get('/report/exportJournal', [ReportController::class, 'exportJournal'])->name('report.exportJournal');
        Route::get('/report/theses', [ReportController::class, 'theses'])->name('report.theses');
        Route::get('/report/exportTheses', [ReportController::class, 'exportTheses'])->name('report.exportTheses');
        Route::get('/report/dosen', [ReportController::class, 'dosen'])->name('report.dosen');
        Route::get('/report/exportDosen', [ReportController::class, 'exportDosen'])->name('report.exportDosen');
        // akun
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/updateProfile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::put('/updatePassword/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
    });
});
