<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layanan-surat', [GuestController::class, 'layananSurat'])->name('layanan_surat');

// Route GET /auth untuk menampilkan form login
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

// Route POST /auth/login untuk memproses login
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
