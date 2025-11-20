<?php

use App\Models\User;
use App\Models\Teacher;
use App\Models\Photo;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/my-profile', function () {
        return view('portal.profile');
    });

    Route::get('/student-list', [StudentController::class, 'index']);
    Route::get('/student/{studentId}', [StudentController::class, 'showStudent']);

    Route::get('/student-create', function () {
        return view('portal.student-create');
    });
    Route::post('/student-create', [StudentController::class, 'addStudent']);

    Route::get('/student-edit/{studentId}', [StudentController::class, 'editStudent']);
    Route::put('/student/{studentId}', [StudentController::class, 'updateStudent']);
    Route::delete('/student-delete/{studentId}', [StudentController::class, 'deleteStudent']);

    Route::get('/teacher-list', [TeacherController::class, 'listTeachers']);
    Route::get('/teacher/{teacher}', [TeacherController::class, 'show']);
    Route::get('/teacher-create', function () {
        return view('portal.teacher-create');
    });
    Route::post('/teacher-create', [TeacherController::class, 'addTeacher']);
    Route::get('/teacher-edit/{teacher}', [TeacherController::class, 'editTeacher']);

    Route::put('/teacher/{teacher}', [TeacherController::class, 'updateTeacher']);
    Route::delete('/teacher-delete/{userId}', [TeacherController::class, 'deleteTeacher']);

    Route::get('/event-list', [EventController::class, 'index']);
    Route::get('/event/{event}', [ContentController::class, 'show']);
    Route::get('/event-create', function () {
        return view('portal.event-create');
    });

    Route::post('/event-create', [EventController::class, 'makeEvent']);
    Route::get('/event-edit/{event}', [EventController::class, 'editEvent']);
    Route::get('/event-edit/{event}', function(Event $event) {
        return view('portal.event-edit', ['event' => $event]);
    });

    Route::put('/event/{event}', [EventController::class, 'updateEvent']);
    Route::delete('/event-delete/{eventId}', [EventController::class, 'deleteEvent']);

    Route::post('/event/{event}/photos', [ContentController::class, 'addPhoto']);

    Route::get('/photo-create/{event}', function(Event $event) {
        return view('portal.photo-create', ['event' => $event]);
    });
    Route::post('/event/{event}/photos', [ContentController::class, 'addPhoto']);
    
    Route::get('/photo-edit/{photo}', function(Photo $photo) {
        return view('portal.photo-edit', ['photo' => $photo]);
    });
    Route::put('/photo-update/{photo}', [ContentController::class, 'updatePhoto']);
    Route::delete('/photo-delete/{photo}', [ContentController::class, 'deletePhoto']);
});

//Statis (AFL2)
Route::get('/', [ContentController::class, 'index']);
Route::get('/programs', [ContentController::class, 'gallery']);
Route::get('/about-us', [TeacherController::class, 'index']);
Route::get('/facility', [FacilityController::class, 'index']);
Route::get('/enlist', function () {
    return view('static.enlist');
});

//!DELETE NANTI SELESAI, UNTUK JADI ADMIN & GURU TANPA LOGIN, LANGSUNG!
// Route::get('/dev', function () {
//     $fakeUser = User::where('role', 'admin')->first(); // Pilih user pertama (Admin)
//     Auth::login($fakeUser); //Login sebagai Admin
//     return redirect('/dashboard');
// });

// Route::get('/teach', function () {
//     $fakeUser = User::where('role', 'teacher')->first(); // Pilih user pertama (Admin)
//     Auth::login($fakeUser); //Login sebagai Admin
//     return redirect('/dashboard');
// });

require __DIR__.'/auth.php';
