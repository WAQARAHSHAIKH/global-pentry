<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('home');



Route::get('/browse', function () {
    return view('browse');
});


Route::get('/login', function () {
    return view('login');
});