<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

//Statis (AFL2)
Route::get('/', [ContentController::class, 'index']);

Route::get('/programs', [ContentController::class, 'gallery']);

Route::get('/about-us', [TeacherController::class, 'index']);

Route::get('/our-facility', [FacilityController::class, 'index']);

Route::get('/enlist', function () {
    return view('static.enlist');
});

//Untuk portal
Route::get('/student-list', [StudentController::class, 'index']);

Route::get('/student/{studentId}', [StudentController::class, 'showStudent']);

//!DELETE NANTI SELESAI, UNTUK JADI ADMIN & GURU TANPA LOGIN, LANGSUNG!
Route::get('/dev', function () {
    $fakeUser = User::where('role', 'admin')->first(); // Pilih user pertama (Admin)
    Auth::login($fakeUser); //Login sebagai Admin
    return redirect('/student-list');
});

Route::get('/teach', function () {
    $fakeUser = User::where('role', 'teacher')->first(); // Pilih user pertama (Admin)
    Auth::login($fakeUser); //Login sebagai Admin
    return redirect('/student-list');
});

