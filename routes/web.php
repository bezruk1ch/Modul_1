<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;

Route::middleware(['auth'])->get('/', [ReportController::class, 'index'])->name('report.index');

Route::middleware(['auth'])->get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::middleware('auth')->group(function (){
    Route::get('/create', [ReportController::class,'create'])->name('reports.create');
    Route::post('/store',[ReportController::class,'store'])->name('reports.store');
    });

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard'); // Создайте файл resources/views/dashboard.blade.php
})->name('dashboard');

// Маршруты для авторизации и регистрации
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Выход из системы
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Профиль пользователя
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
