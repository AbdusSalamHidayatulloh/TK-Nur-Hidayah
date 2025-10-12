<?php

use App\Http\Controllers\TeaserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TeaserController::class, 'index']);

Route::get('/programs', function () {
    return view('program');
});

Route::get('/enlist', function () {
    return view('contact');
});

Route::get('/about-us', function () {
    return view('about-us');
});