<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        // Jika sudah login, redirect ke dashboard
        if (!Auth::check()) {
            return redirect()->route('guest.dashboard');
        }

        // Jika belum login, arahkan ke halaman login
        return redirect()->route('login.form');
    }
    /**
     * Menampilkan halaman login (Guest)
     */
    public function showLoginForm()
    {
        return view('pages.auth.login-form');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        // VALIDASI INPUT
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
        ]);

        // DATA CREDENTIAL UNTUK AUTH
        $credentials = $request->only('email', 'password');

        // AUTHENTICATION
        if (Auth::attempt($credentials)) {

            // REGENERATE SESSION
            $request->session()->regenerate();

            // SET SESSION (sesuai modul)
            Session::put('isLoggedIn', true);
            Session::put('user_email', Auth::user()->email);
            Session::put('user_id', Auth::user()->id);

            // REDIRECT KE DASHBOARD
            return redirect()->route('guest.dashboard')
                ->with('success', 'Login berhasil. Selamat datang!');
        }

        // LOGIN GAGAL
        return redirect()->route('login.form')
            ->withErrors(['gagal' => 'Email atau Password salah.'])
            ->withInput();
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // HAPUS SESSION
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();

        return redirect()->route('login.form')
            ->with('success', 'Logout berhasil.');
    }
}
