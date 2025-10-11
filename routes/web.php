<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/programs', function () {
    return view('program');
});

Route::get('/enlist', function () {
    return view('contact');
});

Route::get('/about-us', function () {
    return view('aboutus');
});





