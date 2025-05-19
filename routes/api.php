<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\Auth\RegisterController;
use App\Interfaces\Http\Controllers\Auth\LoginController;
use App\Interfaces\Http\Controllers\Auth\ForgotPasswordController;
use App\Interfaces\Http\Controllers\Auth\ResetPasswordController;
use App\Interfaces\Http\Controllers\Auth\HomeController;

// 📌 ROTAS PÚBLICAS
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login',    [LoginController::class, 'login']);
Route::post('/password-forgot', [ForgotPasswordController::class, 'sendResetLink']);
Route::post('/password-reset',  [ResetPasswordController::class, 'reset']);

// 📌 ROTAS PROTEGIDAS COM SANCTUM
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

