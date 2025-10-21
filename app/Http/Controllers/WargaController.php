<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * READ: Menampilkan semua data warga
     */
    public function index()
    {
        $wargas = Warga::latest()->paginate(10);
        return view('warga.index', compact('wargas'));
    }

    /**
     * CREATE: Menampilkan form tambah data warga
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * STORE: Menyimpan data warga baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga|max:30',
            'nama' => 'required|max:255',
        ]);

        // Masukkan data ke array sebelum create
        $data['no_ktp'] = $request->no_ktp;
        $data['nama'] = $request->nama;

        Warga::create($data);

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil disimpan!');
    }

    /**
     * SHOW: Menampilkan detail 1 warga
     */
    public function show(Warga $warga)
    {
        return view('warga.show', compact('warga'));
    }

    /**
     * EDIT: Menampilkan form edit warga
     */
    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    /**
     * UPDATE: Memperbarui data warga
     */
    public function update(Request $request, Warga $warga)
    {
        $request->validate([
            'no_ktp' => 'required|max:30|unique:warga,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama' => 'required|max:255',
        ]);

        // Masukkan data ke array sebelum update
        $data['no_ktp'] = $request->no_ktp;
        $data['nama'] = $request->nama;

        $warga->update($data);

        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil diperbarui!');
    }

    /**
     * DELETE: Menghapus data warga
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil dihapus!');
    }
}
