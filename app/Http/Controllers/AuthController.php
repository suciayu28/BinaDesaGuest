<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * 🔹 Tampilkan halaman login (Guest)
     */
    public function showLoginForm()
    {
        return view('login-form');
    }

    /**
     * 🔹 Proses login dengan validasi email & password
     */
    public function login(Request $request)
    {
        // 1️⃣ VALIDASI INPUT
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/', // Minimal 1 huruf kapital - Aturan ini tetap dipertahankan
            ],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital.',
        ]);

        $email = $validated['email'];
        $password = $validated['password'];

        $user = User::where('email', $email)->first();

        // 2️⃣ LOGIKA VERIFIKASI STANDAR LARAVEL (TANPA KEWAJIBAN EMAIL = PASSWORD)
        // Cek: 1. Apakah user ditemukan? DAN 2. Apakah password input cocok dengan hash di DB?
        if ($user && Hash::check($password, $user->password)) {

            // 3️⃣ LOGIN BERHASIL
            // Pastikan Anda memanggil Auth::login($user) jika ingin menggunakan middleware 'auth' standar
            // Jika Anda menggunakan sesi manual seperti di bawah, kode ini akan berfungsi:
            $request->session()->regenerate();

            // SET SESSION MANUAL
            Session::put('isLoggedIn', true);
            Session::put('user_email', $email);
            Session::put('email', $email);

            // 🔹 Ambil URL intended, jika ada
            $redirectUrl = Session::pull('url.intended', route('guest.dashboard'));

            return redirect($redirectUrl)
                ->with('success', "Login berhasil! Selamat datang, {$email}.");
        }

        // 4️⃣ LOGIN GAGAL
        // Ganti pesan kesalahan menjadi standar
        return redirect()->route('login.form')
            ->withErrors(['gagal' => 'Login gagal! Kredensial tidak cocok (Email atau Password salah).'])
            ->withInput();
    }

    /**
     * 🔹 Logout user
     */
    public function logout()
    {
        // Sebaiknya gunakan Auth::logout() jika menggunakan Auth bawaan
        Session::flush();
        return redirect()->route('login.form')
            ->with('success', 'Logout berhasil! Anda telah keluar dari sistem.');
    }
}
