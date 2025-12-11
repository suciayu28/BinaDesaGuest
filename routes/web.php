<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\MultipleuploadsController;
use App\Http\Controllers\PermohonanSuratController;
use App\Http\Controllers\BerkasPersyaratanController;
use App\Http\Controllers\RiwayatStatusSuratController;

// ===================================================================
// 1. ROUTE AUTHENTICATION (Guest Only)
// ===================================================================
Route::get('/', [AuthController::class, 'showLoginForm'])
    ->name('login.form')
    ->middleware('guest');

Route::post('/', [AuthController::class, 'login'])
    ->name('login.process')
    ->middleware('guest');
// ===================================================================
//  HALAMAN DASHBOARD (boleh dilihat tanpa login)
// ===================================================================
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->name('guest.dashboard');

// ===================================================================
// 2. ROUTE YANG HARUS LOGIN
// ===================================================================
Route::group(['middleware'=>['checkislogin']],function() {


    // JENIS SURAT
    Route::get('/jenis-surat', [JenisSuratController::class, 'index'])
        ->name('jenis-surat.index');

    // PERMOHONAN SURAT
    Route::resource('permohonan', PermohonanSuratController::class);

    Route::get('/permohonan/riwayat', [PermohonanSuratController::class, 'riwayat'])
        ->name('permohonan.riwayat');

    // DATA WARGA
    Route::resource('warga', WargaController::class);

    // DATA USER
    Route::resource('users', UserController::class);

    // BERKAS PERSYARATAN
    Route::resource('berkas', BerkasPersyaratanController::class);
    Route::get('/berkas/permohonan/{permohonan_id}',
    [BerkasPersyaratanController::class, 'index']
)->name('berkas.bypermohonan');
//riwayat status surat
Route::get('/riwayat/{permohonan_id}', [RiwayatStatusSuratController::class, 'index'])
    ->name('riwayat-status.index');
    Route::post('/permohonan/{permohonan}/approve', [PermohonanSuratController::class, 'approve'])
    ->name('permohonan.approve');

});
// ===================================================================
// LOGOUT (hanya untuk yang login)
// ===================================================================
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');



// Route baru: hapus file upload
Route::post('/uploads', [MediaController::class, 'store'])->name('uploads.store');
Route::delete('/uploads/{id}', [MediaController::class, 'destroy'])->name('uploads.destroy');


