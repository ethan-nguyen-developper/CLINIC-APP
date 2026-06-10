<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Welcome', [
        'username' =>'ethan'
    ]);
});

Route::get('/auth', function () {
    return inertia('Welcome', [
        'username' =>'ethan'
    ]);
})->name('auth.index');

Route::get('/setup', function () {
    return inertia('Welcome', [
        'username' =>'ethan'
    ]);
})->name('setup.index');
