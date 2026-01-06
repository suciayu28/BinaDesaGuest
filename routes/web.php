<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\PermohonanSuratController;
use App\Http\Controllers\BerkasPersyaratanController;
use App\Http\Controllers\RiwayatStatusSuratController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;

/*
|--------------------------------------------------------------------------
| PUBLIC (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'dashboard'])
    ->name('guest.dashboard');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login.form');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

/*
|--------------------------------------------------------------------------
| WAJIB LOGIN (PELAGGAN + ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware('checkislogin')->group(function () {

    /*
    |--------------------
    | JENIS SURAT
    |--------------------
    */
    Route::get('/jenis-surat', [JenisSuratController::class, 'index'])
        ->name('jenis-surat.index');

    /*
    |--------------------
    | PERMOHONAN SURAT
    |--------------------
    */
    Route::resource('permohonan', PermohonanSuratController::class);

    // Upload file permohonan
    Route::post(
        '/permohonan/{permohonan_id}/upload',
        [PermohonanSuratController::class, 'upload']
    )->name('permohonan.upload');

    // Hapus file permohonan
    Route::delete(
        '/permohonan/file/{media}',
        [MediaController::class, 'destroy']
    )->name('permohonan.file.destroy');

    /*
    |--------------------
    | BERKAS PERSYARATAN
    |--------------------
    */
    Route::resource('berkas', BerkasPersyaratanController::class);

    /*
    |--------------------
    | RIWAYAT STATUS
    |--------------------
    */
    Route::get(
        '/riwayat/{permohonan_id}',
        [RiwayatStatusSuratController::class, 'index']
    )->name('riwayat-status.index');

    /*
    |--------------------
    | LOGOUT
    |--------------------
    */
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

/*
|--------------------------------------------------------------------------
| KHUSUS SUPER ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin', 'checkrole:admin'])->group(function () {
/*
    |--------------------
    | JENIS SURAT (ADMIN CRUD)
    |--------------------
    */
    Route::prefix('jenis-surat')->name('jenis-surat.')->group(function () {
        Route::get('/create', [JenisSuratController::class, 'create'])->name('create');
        Route::post('/', [JenisSuratController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [JenisSuratController::class, 'edit'])->name('edit');
        Route::put('/{id}', [JenisSuratController::class, 'update'])->name('update');

        Route::delete('/{id}', [JenisSuratController::class, 'destroy'])->name('destroy');
    });

    /*
    |--------------------
    | APPROVE PERMOHONAN
    |--------------------
    */
    Route::post(
        '/permohonan/{permohonan}/approve',
        [PermohonanSuratController::class, 'approve']
    )->name('permohonan.approve');

    /*
    |--------------------
    | KELOLA USER
    |--------------------
    */
    Route::resource('users', UserController::class);

    /*
    |--------------------
    | KELOLA WARGA
    |--------------------
    */
    Route::resource('warga', WargaController::class);
});

/*
|--------------------------------------------------------------------------
| UPLOAD UMUM (OPSIONAL)
|--------------------------------------------------------------------------
*/
Route::post('/uploads', [MediaController::class, 'store'])
    ->name('uploads.store');

Route::delete('/uploads/{id}', [MediaController::class, 'destroy'])
    ->name('uploads.destroy');
