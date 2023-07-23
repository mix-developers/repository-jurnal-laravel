<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::get('/download_theses/{id}', [App\Http\Controllers\ThesesController::class, 'download'])->name('download_theses');

Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // lecturer 
    Route::get('/lecturer', [App\Http\Controllers\LecturerController::class, 'index'])->name('lecturer');
    Route::post('/lecturer/store', [App\Http\Controllers\LecturerController::class, 'store'])->name('lecturer.store');
    Route::get('/lecturer/show/{id}', [App\Http\Controllers\LecturerController::class, 'show'])->name('lecturer.show');
    Route::put('/lecturer/update/{id}', [App\Http\Controllers\LecturerController::class, 'update'])->name('lecturer.update');
    Route::delete('/lecturer/destroy/{id}', [App\Http\Controllers\LecturerController::class, 'destroy'])->name('lecturer.destroy');
    // student 
    Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
    Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    Route::get('/student/show/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
    Route::put('/student/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/destroy/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
    // student 
    Route::get('/major', [App\Http\Controllers\MajorController::class, 'index'])->name('major');
    Route::post('/major/store', [App\Http\Controllers\MajorController::class, 'store'])->name('major.store');
    Route::get('/major/show/{id}', [App\Http\Controllers\MajorController::class, 'show'])->name('major.show');
    Route::put('/major/update/{id}', [App\Http\Controllers\MajorController::class, 'update'])->name('major.update');
    Route::delete('/major/destroy/{id}', [App\Http\Controllers\MajorController::class, 'destroy'])->name('major.destroy');
    // theses 
    Route::get('/theses', [App\Http\Controllers\ThesesController::class, 'index'])->name('theses');
    Route::get('/theses/show/{id}', [App\Http\Controllers\ThesesController::class, 'show'])->name('theses.show');
    // journal 
    Route::get('/journal', [App\Http\Controllers\JournalController::class, 'index'])->name('journal');
    Route::get('/journal/show/{id}', [App\Http\Controllers\JournalController::class, 'show'])->name('journal.show');
});
Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa', 'middleware' => ['mahasiswa']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'mahasiswa'])->name('dashboard');
    // theses 
    Route::get('/theses', [App\Http\Controllers\ThesesController::class, 'mahasiswa'])->name('theses');
    Route::post('/theses/store', [App\Http\Controllers\ThesesController::class, 'store'])->name('theses.store');
    Route::put('/theses/update/{id}', [App\Http\Controllers\ThesesController::class, 'update'])->name('theses.update');
    Route::get('/theses/show/{id}', [App\Http\Controllers\ThesesController::class, 'show'])->name('theses.show');
    Route::get('/theses/download/{id}', [App\Http\Controllers\ThesesController::class, 'download'])->name('theses.download');
    // journal 
    Route::get('/journal', [App\Http\Controllers\JournalController::class, 'mahasiswa'])->name('journal');
    Route::get('/journal/create', [App\Http\Controllers\JournalController::class, 'create'])->name('journal.create');
    Route::get('/journal/show/{id}', [App\Http\Controllers\JournalController::class, 'show'])->name('journal.show');
    // akun 
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
});
