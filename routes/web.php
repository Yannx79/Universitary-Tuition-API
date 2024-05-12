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
Route::apiResources([
    'courses' => CourseController::class,
    'docents' => DocentController::class,
]);
Route::apiResource('persons', PersonController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('tuitons', TuitonController::class);