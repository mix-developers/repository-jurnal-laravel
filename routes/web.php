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

Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // lecturer 
    Route::get('/lecturer', [App\Http\Controllers\LecturerController::class, 'index'])->name('lecturer');
    // student 
    Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
    // major 
    Route::get('/major', [App\Http\Controllers\MajorController::class, 'index'])->name('major');
});
