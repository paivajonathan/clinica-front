<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name("dashboard");
Route::get('/patient', [DashboardController::class, 'patient'])->name("patient");
Route::get('/doctor', [DashboardController::class, 'doctor'])->name("doctor");

Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::post('/login/store', [LoginController::class, 'store'])->name("login.store");
Route::get('/login/destroy', [LoginController::class, 'destroy'])->name("login.destroy");

Route::get('/register', [RegisterController::class, 'index'])->name("register");
Route::post('/register/store', [RegisterController::class, 'store'])->name("register.store");

Route::get('/consultation/create/{doctorId}', [ConsultationController::class, 'index'])->name("consultation");
Route::post('/consultation/store', [ConsultationController::class, 'store'])->name("consultation.store");
Route::put('/consultation/{consultationId}/cancel', [ConsultationController::class, 'cancel'])->name("consultation.cancel");
Route::get('/consultation/history/', [ConsultationController::class, 'history'])->name("consultation.history");
Route::get('/consultation/doctor/history/', [ConsultationController::class, 'doctorHistory'])->name("consultation.doctor.history");

Route::get('/attendance/create/{patientId}/{consultationId}', [AttendanceController::class, 'index'])->name("attendance");
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name("attendance.store");
