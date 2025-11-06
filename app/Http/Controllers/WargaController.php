<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class WargaController extends Controller
{
    /**
     * Menampilkan daftar semua warga.
     */
    public function index()
    {
        $wargas = Warga::orderBy('nama')->paginate(10);
        return view('pages.guest.warga.index', compact('wargas'));
    }

    /**
     * Menampilkan form untuk membuat warga baru.
     */
    public function create()
    {
        return view('pages.guest.warga.create');
    }

    /**
     * Menyimpan data warga baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp' => ['required', 'string', 'max:20', 'unique:warga,no_ktp'],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'agama' => ['required', 'string', 'max:50'],
            'pekerjaan' => ['nullable', 'string', 'max:255'],
            'telp' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:warga,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Hash password sebelum disimpan
        $validated['password'] = Hash::make($validated['password']);

        Warga::create($validated);

        return redirect()->route('pages.guest.warga.index')
            ->with('success', 'Data Warga **' . $validated['nama'] . '** berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data warga.
     */
    public function edit(Warga $warga)
    {
        // Parameter 'warga' otomatis di-resolve oleh Laravel (Route Model Binding)
        return view('pages.guest.warga.edit', compact('warga'));
    }

    /**
     * Memperbarui data warga yang sudah ada.
     */
    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            // no_ktp harus unik, kecuali untuk data warga saat ini
            'no_ktp' => ['required', 'string', 'max:20', Rule::unique('warga', 'no_ktp')->ignore($warga->warga_id, 'warga_id')],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'agama' => ['required', 'string', 'max:50'],
            'pekerjaan' => ['nullable', 'string', 'max:255'],
            'telp' => ['nullable', 'string', 'max:20'],
            // email harus unik, kecuali untuk data warga saat ini
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('warga', 'email')->ignore($warga->warga_id, 'warga_id')],
            // password hanya diwajibkan jika diisi
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if (!empty($validated['password'])) {
            // Hash password baru jika diisi
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Jika password kosong, hapus dari data yang divalidasi agar tidak menimpa password lama
            unset($validated['password']);
        }

        $warga->update($validated);

        return redirect()->route('pages.guest.warga.index')
            ->with('success', 'Data Warga **' . $validated['nama'] . '** berhasil diperbarui.');
    }

    /**
     * Menghapus data warga.
     */
    public function destroy(Warga $warga)
    {
        $nama = $warga->nama;
        $warga->delete();

        return redirect()->route('pages.guest.warga.index')
            ->with('success', 'Data Warga **' . $nama . '** berhasil dihapus.');
    }
}
