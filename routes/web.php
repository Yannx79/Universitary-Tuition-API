<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DocentController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TuitonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('courses', CourseController::class);
// Route::resource('docents', DocentController::class);
Route::resources([
    'courses' => CourseController::class,
    'docents' => DocentController::class,
]);
Route::resource('persons', PersonController::class);
Route::resource('students', StudentController::class);
Route::resource('tuitons', TuitonController::class);