<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name("auth");

Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::post('/login/store', [LoginController::class, 'store'])->name("login.store");

Route::get('/register', [RegisterController::class, 'index'])->name("register");
Route::post('/register/store', [RegisterController::class, 'store'])->name("register.store");

Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");
