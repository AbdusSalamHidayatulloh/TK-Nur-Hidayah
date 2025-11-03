<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacilityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContentController::class, 'index']);

Route::get('/programs', [ContentController::class, 'gallery']);

Route::get('/about-us', [TeacherController::class, 'index']);

Route::get('/our-facility', [FacilityController::class, 'index']);

Route::get('/enlist', function () {
    return view('static.enlist');
});
