<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\Auth\HomeController;
use App\Interfaces\Http\Controllers\Auth\LoginController;
use App\Interfaces\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('app');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');


Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.post');