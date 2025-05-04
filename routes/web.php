<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['isLogin'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['checkLogin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas');
    Route::get('/tugas/pdf', [TugasController::class, 'pdf'])->name('tugasPdf');

    Route::middleware(['isAdmin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
    Route::post('/user/store', [UserController::class, 'store'])->name('userStore');

    Route::post('/tugas/store', [TugasController::class, 'store'])->name('tugasStore');
    Route::get('/tugas/edit/{id}', [TugasController::class, 'edit'])->name('tugasEdit');
    Route::post('/tugas/update/{id}', [TugasController::class, 'update'])->name('tugasUpdate');
    Route::get('/tugas/destroy/{id}', [TugasController::class, 'destroy'])->name('tugasDestroy');
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugasCreate');
    Route::get('/tugas/excel', [TugasController::class, 'excel'])->name('tugasExcel');

    Route::get('/user/excel', [UserController::class, 'excel'])->name('UserExcel');
    Route::get('/user/pdf', [UserController::class, 'pdf'])->name('UserPdf');
    });
});