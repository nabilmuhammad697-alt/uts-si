<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard bawaan Laravel Breeze setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group Route yang wajib menggunakan login (Middleware Auth)
Route::middleware(['auth'])->group(function () {
    // Route untuk Profile User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk CRUD Departemen dan Pegawai
    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);
});

// Mengikutkan rute autentikasi bawaan Breeze (login, register, logout, dll)
require __DIR__.'/auth.php';
