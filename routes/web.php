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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/layanan-surat', [GuestController::class, 'layananSurat'])->name('layanan_surat');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('guest.dashboard');

// ===================================================================
// 2. ROUTE AUTHENTICATION
// ===================================================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================================================================
// 3. ROUTE JENIS SURAT (Publik)
// ===================================================================
Route::get('/jenis-surat', [JenisSuratController::class, 'index'])->name('jenis-surat.index');

// ===================================================================
// 4. ROUTE PERMOHONAN SURAT (Publik - nanti bisa ditambah proteksi login)
// ===================================================================
Route::get('/permohonan/create/{jenis_surat_id}', [PermohonanSuratController::class, 'create'])
->name('permohonan.create');
// Route untuk menampilkan daftar riwayat permohonan
Route::get('/permohonan/riwayat', [PermohonanSuratController::class, 'index'])
->name('permohonan.index');
// Rute untuk memproses pengajuan (STORE)
Route::post('/permohonan/store', [PermohonanSuratController::class, 'store'])
->name('permohonan.store');
Route::get('/permohonan/{id}', [PermohonanSuratController::class, 'show'])
->name('permohonan.show');
// 5. ROUTE USER (Admin nanti)
// ===================================================================

// Daftar user
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Form tambah user
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Simpan user baru
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Form edit user
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// Update user
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Hapus user
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/dashboard/user', [DashboardController::class, 'index'])->name('dashboard');

//routes warga
Route::resource('warga', WargaController::class);

Route::get('/save-intended', function (Request $request) {
    \Illuminate\Support\Facades\Session::put('url.intended', $request->query('url'));
    return response()->json(['status'=>'ok']);
})->name('save.intended');

