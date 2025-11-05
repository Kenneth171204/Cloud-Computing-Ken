<?php

// PERBAIKAN 1: Impor 'Route' yang hilang
use Illuminate\Support\Facades\Route;

// PERBAIKAN 2: Gunakan backslash '\' dan 'App' kapital
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ini akan mengalihkan halaman utama (http://cc.test)
// ke halaman registrasi (http://cc.test/register)
Route::get('/', function () {
    return redirect('/register');
});

// Rute-rute ini sekarang akan berfungsi karena 'Route' dan 'RegistrationController' sudah diimpor
Route::get('/register', [RegistrationController::class, 'create'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

// PERBAIKAN 3: Menghapus '}' ekstra yang menyebabkan syntax error
// } 
