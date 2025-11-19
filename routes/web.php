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

//Untuk portal (bagian student)
Route::get('/student-list', [StudentController::class, 'index']);

Route::get('/student/{studentId}', [StudentController::class, 'showStudent']);

Route::delete('/student-delete/{studentId}', [StudentController::class, 'deleteStudent']);

Route::get('/student-create', [StudentController::class, 'create']);
Route::post('/student/create', [StudentController::class, 'addStudent']);

Route::get('/student-edit/{studentId}', [StudentController::class, 'edit']);
Route::put('/student/edit/{studentId}', [StudentController::class, 'updateStudent']);

//Untuk portal (bagian teacher)
Route::get('/teacher-list', [TeacherController::class, 'indexTeacher']);

Route::get('/teacher/{teacher}', [TeacherController::class, 'show']);

Route::delete('/teacher-delete/{teacher}', [TeacherController::class, 'deleteTeacher']);

Route::get('/teacher-create', [TeacherController::class, 'create']);
Route::post('/teacher/create', [TeacherController::class, 'addTeacher']);

Route::get('/teacher-edit/{teacher}', [TeacherController::class, 'edit']);
Route::put('/teacher/edit/{teacher}', [TeacherController::class, 'updateTeacher']);

Route::get('/account-edit/{teacher}', [TeacherController::class, 'edit']);
Route::put('/account/edited/{teacher}', [TeacherController::class, 'updateTeacher']);


Route::get('/dev', function () {
    $fakeUser = User::where('role', 'admin')->first(); // Pilih user pertama (Admin)
    Auth::login($fakeUser); //Login sebagai Admin
    return redirect('/student-list');
});

Route::get('/teach', function () {
    $fakeUser = User::where('role', 'teacher')->first(); // Pilih user pertama (Admin)
    Auth::login($fakeUser); //Login sebagai seorang guru
    return redirect('/student-list');
});

