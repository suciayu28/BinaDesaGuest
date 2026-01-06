<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Tampilkan daftar jenis surat (guest / user)
     */
    public function index()
    {
        $jenisSurats = JenisSurat::with('templates')->get();
        return view('pages.guest.jenisSurat.index', compact('jenisSurats'));
    }

    /**
     * Form tambah jenis surat (admin)
     */
    public function create()
    {
        return view('pages.guest.jenisSurat.create');
    }

    /**
     * Simpan data jenis surat (admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis'   => 'required|string|max:255',
            'kode'         => 'nullable|string|max:50|unique:jenis_surat,kode',
            'deskripsi'    => 'nullable|string',
            'icon'         => 'nullable|string|max:100',
            'syarat_json'  => 'nullable|array',
            'syarat_json.*'=> 'string'
        ]);

        JenisSurat::create([
            'nama_jenis'  => $request->nama_jenis,
            'kode'        => $request->kode,
            'deskripsi'   => $request->deskripsi,
            'icon'        => $request->icon,
            // (optional) bersihkan syarat kosong
            'syarat_json' => is_array($request->syarat_json)
                ? array_values(array_filter($request->syarat_json, fn($v) => trim((string)$v) !== ''))
                : [],
        ]);

        return redirect()
            ->route('jenis-surat.index')
            ->with('success', 'Jenis surat berhasil ditambahkan.');
    }

    /**
     * Form edit jenis surat (admin)
     */
    public function edit($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        return view('pages.guest.jenisSurat.edit', compact('jenisSurat'));
    }

    /**
     * Update jenis surat (admin)
     */
    public function update(Request $request, $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        $request->validate([
            'nama_jenis'   => 'required|string|max:255',

            // ✅ PERUBAHAN MINIMAL DI SINI:
            // sebelumnya: ... $jenisSurat->id (bisa salah kalau PK bukan id)
            // sekarang: pakai getKey() dan getKeyName() (aman untuk id / jenis_id)
            'kode'         => 'nullable|string|max:50|unique:jenis_surat,kode,' .
                              $jenisSurat->getKey() . ',' . $jenisSurat->getKeyName(),

            'deskripsi'    => 'nullable|string',
            'icon'         => 'nullable|string|max:100',
            'syarat_json'  => 'nullable|array',
            'syarat_json.*'=> 'string'
        ]);

        $jenisSurat->update([
            'nama_jenis'  => $request->nama_jenis,
            'kode'        => $request->kode,
            'deskripsi'   => $request->deskripsi,
            'icon'        => $request->icon,
            // (optional) bersihkan syarat kosong
            'syarat_json' => is_array($request->syarat_json)
                ? array_values(array_filter($request->syarat_json, fn($v) => trim((string)$v) !== ''))
                : [],
        ]);

        return redirect()
            ->route('jenis-surat.index')
            ->with('success', 'Jenis surat berhasil diperbarui.');
    }

    /**
     * Hapus jenis surat (admin)
     */
    public function destroy($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $jenisSurat->delete();

        return redirect()
            ->route('jenis-surat.index')
            ->with('success', 'Jenis surat berhasil dihapus.');
    }
}
