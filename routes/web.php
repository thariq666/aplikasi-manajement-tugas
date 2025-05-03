<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['checkLogin'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/create', [UserController::class, 'create'])->name('userCreate');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
Route::post('/user/store', [UserController::class, 'store'])->name('userStore');
Route::get('/tugas', [TugasController::class, 'index'])->name('tugas');
});