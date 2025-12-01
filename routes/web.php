<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;


// ==========================
// HALAMAN GUEST (BELUM LOGIN)
// ==========================
Route::middleware('guest')->group(function () {

    // Halaman Form Login
    Route::get('/auth', [AuthController::class, 'index'])->name('login');

    // Proses Submit Login
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

    // Halaman Depan (welcome)
    Route::get('/', function () {
        return view('welcome');
    });
});


// ==========================
// HALAMAN WAJIB LOGIN
// ==========================
Route::middleware('auth')->group(function () {

    // Logout (Bisa diakses semua user yang login)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard User Biasa
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fitur User Biasa (Kirim Pertanyaan)
    Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');

    Route::get('/home', [HomeController::class, 'index']);

    // =======================
    // KHUSUS ADMIN
    // =======================
    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->group(function () {
            Route::resource('user', UserController::class);
            Route::resource('pelanggan', PelangganController::class);
        });
});
