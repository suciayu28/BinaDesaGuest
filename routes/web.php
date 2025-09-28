<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layanan-surat', [GuestController::class, 'layananSurat'])->name('layanan_surat');
