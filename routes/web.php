<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/pcr', function () {
    return 'selamat datang di website kampus PCR!';
});


Route::get('/mahasiswa', function () {
    return 'hallo mahasiswa!';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'nama saya: ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'nim saya: ' . $param1;
});

Route::get('/mahasiswa/{param1?}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});


Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah');

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

//pelanggan
Route::resource('pelanggan', PelangganController::class);

//user
Route::resource('user', UserController::class);

