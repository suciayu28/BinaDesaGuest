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
    public function index(Request $request)
    {
        // MAP request 'gender' dari form → kolom database 'jenis_kelamin'
        if ($request->filled('gender')) {
            $request->merge([
                'jenis_kelamin' => $request->gender
            ]);
        }
        //kolom yang bisa difilter
        $filterableColumns = ['jenis_kelamin'];
        // Kolom yang bisa dicari
        $searchableColums = ['nama', 'email', 'no_ktp'];

        $pageData['dataWarga'] = Warga::filter($request, $filterableColumns)
            ->when($request->filled('search'), function ($query) use ($request) {

                $keyword = $request->search;

                $query->where(function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%")
                      ->orWhere('email', 'like', "%{$keyword}%")
                      ->orWhere('no_ktp', 'like', "%{$keyword}%");
                });
            })
            ->paginate(10);

        $wargas = $pageData['dataWarga'];
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
            ->with('success', 'Data Warga ' . $validated['nama'] . ' berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data warga.
     */
    public function edit(Warga $warga)
    {
        return view('pages.guest.warga.edit', compact('warga'));
    }

    /**
     * Memperbarui data warga yang sudah ada.
     */
    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'no_ktp' => ['required', 'string', 'max:20', Rule::unique('warga', 'no_ktp')->ignore($warga->warga_id, 'warga_id')],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'agama' => ['required', 'string', 'max:50'],
            'pekerjaan' => ['nullable', 'string', 'max:255'],
            'telp' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('warga', 'email')->ignore($warga->warga_id, 'warga_id')],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $warga->update($validated);

        return redirect()->route('warga.index')
            ->with('success', 'Data Warga ' . $validated['nama'] . ' berhasil diperbarui.');
    }

    /**
     * Menghapus data warga.
     */
    public function destroy(Warga $warga)
    {
        $nama = $warga->nama;
        $warga->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data Warga ' . $nama . ' berhasil dihapus.');
    }
}
