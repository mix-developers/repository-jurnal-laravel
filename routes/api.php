<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/lecturer', [App\Http\Controllers\API\LecturerController::class, 'index'])->name('lecturer');
Route::get('/major', [App\Http\Controllers\API\MajorController::class, 'index'])->name('major');
Route::get('/student', [App\Http\Controllers\API\StudentsController::class, 'index'])->name('student');
Route::get('/mentor', [App\Http\Controllers\API\MentorController::class, 'index'])->name('mentor');
