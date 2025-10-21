<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\Guest\LayananMandiriController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layanan-surat', [GuestController::class, 'layananSurat'])->name('layanan_surat');

// Route GET /auth untuk menampilkan form login
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

// Route POST /auth/login untuk memproses login
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');



//PROJEK//
Route::get('/dashboard', [DashboardController::class, 'dashboard'])
->name('guest.dashboard');

// Route Resource untuk Jenis Surat
Route::get('/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat.index');


Route::prefix('layanan-mandiri')->group(function () {

    // 1. Route GET: Menampilkan formulir login (View)
   Route::get('/login', [LayananMandiriController::class, 'showLoginForm'])
        ->name('guest.layanan_mandiri.login');

    // 2. Route POST: Memproses upaya login (Controller Logic)
    Route::post('/login', [LayananMandiriController::class, 'login'])
        ->name('guest.layanan_mandiri.attempt');

    // 3. Route Dashboard Layanan Mandiri (Setelah Login)
    // Nama route ini akan digunakan di Controller dan View Layanan Mandiri
    Route::get('/dashboard', [LayananMandiriController::class, 'index'])
        ->name('guest.layanan_mandiri.index');

    // 4. Route Logout
    // PERBAIKAN PENTING: Panggil fungsi 'destroy' (sesuai Controller Anda), BUKAN 'logout'.
    Route::post('/logout', [LayananMandiriController::class, 'destroy'])
        ->name('guest.layanan_mandiri.logout');
});
