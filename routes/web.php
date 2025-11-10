<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\PermohonanSuratController;

// ===================================================================
// 1. ROUTE PUBLIK / LANDING PAGE
// ===================================================================
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('guest.dashboard');

// ===================================================================
// 2. ROUTE AUTHENTICATION
// ===================================================================
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================================================================
// 3. ROUTE JENIS SURAT (Publik)
// ===================================================================
Route::get('/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat.index');

// ===================================================================
// 4. ROUTE PERMOHONAN SURAT (Publik - nanti bisa ditambah proteksi login)
// ===================================================================
Route::resource('permohonan', PermohonanSuratController::class);
Route::get('/permohonan/riwayat', [PermohonanSuratController::class, 'riwayat'])
    ->name('permohonan.riwayat');
// 5. ROUTE USER (Admin nanti)
// ===================================================================

//routes warga
Route::resource('warga', WargaController::class);

Route::resource('users', UserController::class);



