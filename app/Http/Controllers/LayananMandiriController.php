<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Menggunakan Facade Session
use Illuminate\Validation\ValidationException;
use App\Models\Warga;

class LayananMandiriController extends Controller
{
    /**
     * Menampilkan formulir login Layanan Mandiri.
     * Path View: resources/views/guest/login.blade.php
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showLoginForm()
    {
        // Pengecekan otentikasi lebih bersih menggunakan Facade Session
        if (Session::has('layanan_mandiri_logged_in')) {
            return redirect()->route('guest.layanan_mandiri.index');
        }

        return view('guest.login');
    }

    /**
     * Memproses upaya LOGIN (Authenticate) dengan Model Warga.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validation: NIK 16 digit dan Password wajib diisi.
        $credentials = $request->validate([
            // Menggunakan rule 'size:16' untuk memastikan panjang string/angka tepat 16 karakter
            'nik' => ['required', 'string', 'size:16'],
            'password' => ['required', 'string'],
        ], [
            'nik.required' => 'Nomor Induk Kependudukan (NIK) wajib diisi.',
            'nik.size' => 'NIK harus tepat 16 digit.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        // 2. Logika Otentikasi DENGAN MODEL WARGA

        // Cari pengguna berdasarkan NIK/no_ktp
        $user = Warga::where('no_ktp', $credentials['nik'])->first();

        // Cek jika pengguna ditemukan DAN password cocok
        if ($user && Hash::check($credentials['password'], $user->password)) {

            // Login Berhasil
            // Penggunaan helper session() atau Facade Session adalah setara,
            // namun menggunakan Facade yang di-import bisa lebih jelas.
            Session::put([
                'layanan_mandiri_logged_in' => true,
                'layanan_mandiri_id' => $user->warga_id,
                'layanan_mandiri_nik' => $user->no_ktp,
                'layanan_mandiri_nama' => $user->nama,
            ]);

            // Regenerate session ID untuk mencegah Session Fixation Attack
            $request->session()->regenerate();

            // Redirect & Success Flash Data
            return redirect()->route('guest.layanan_mandiri.index')
                             ->with('success', 'Login Berhasil! Selamat datang, ' . $user->nama . '.');
        }

        // Login Gagal
        // Error Flash Data & Repopulate Form
        // Pastikan pesan error terlempar pada field 'nik' agar bisa di-handle oleh blade
        throw ValidationException::withMessages([
            'nik' => ['NIK atau Kata Sandi yang Anda masukkan tidak valid. Silakan coba lagi.']
        ])->redirectTo(route('guest.layanan_mandiri.login'));
    }

    /**
     * Dashboard Layanan Mandiri (index).
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // Redirect: Proteksi halaman
        // Menggunakan Facade Session::has() untuk konsistensi
        if (!Session::has('layanan_mandiri_logged_in')) {
            return redirect()->route('guest.layanan_mandiri.login')
                             ->with('error', 'Anda harus login terlebih dahulu untuk mengakses Layanan Mandiri.');
        }

        // Mengirim data nama dan NIK ke view
        $data = [
            'nama' => Session::get('layanan_mandiri_nama'),
            'nik' => Session::get('layanan_mandiri_nik'),
        ];

        return view('guest.layanan_mandiri.dashboard', $data);
    }

    /**
     * Memproses LOGOUT (destroy).
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Menggunakan Facade Session::forget() atau Session::remove() lebih bersih
        Session::forget(['layanan_mandiri_logged_in', 'layanan_mandiri_id', 'layanan_mandiri_nik', 'layanan_mandiri_nama']);

        // Invalidate session untuk keamanan tambahan setelah logout
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect & Success Flash Data
        return redirect()->route('guest.layanan_mandiri.login')->with('success', 'Anda telah berhasil logout.');
    }
}
