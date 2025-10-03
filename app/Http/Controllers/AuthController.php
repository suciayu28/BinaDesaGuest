<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

 // Asumsi file view ada di 'resources/views/auth/login-form.blade.php'
        return view('login-form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
          // 1. Validasi
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3', // Minimal 3 karakter
                'regex:/[A-Z]/', // Harus mengandung huruf kapital
            ],
        ], [
            'username.required' => 'Nama pengguna (username) wajib diisi.',
            'password.required' => 'Kata sandi (password) wajib diisi.',
            'password.min' => 'Kata sandi minimal 3 karakter.',
            'password.regex' => 'Kata sandi harus mengandung minimal satu huruf kapital.',
        ]);

        // 2. Logika Khusus: 'Username' dan 'Password' harus memiliki value yang SAMA
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username !== $password) {
             return redirect('/auth')->withErrors(['gagal' => 'Login Gagal! Username dan Password harus memiliki nilai yang sama.']);
        }

        // 3. Logika Berhasil
        $pesan = "Login Berhasil! Selamat datang, **{$username}**. Semua rule berhasil dilalui.";


        return view('dashboard', compact('pesan'));  //alihkan ke halaman dasboard
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
