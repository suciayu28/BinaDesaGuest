<?php

namespace App\Http\Controllers;

use App\Models\BerkasPersyaratan;
use App\Models\Media;
use App\Models\PermohonanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasPersyaratanController extends Controller
{
    /**
     * Menampilkan seluruh berkas persyaratan
     */
    public function index()
    {
        $permohonans = PermohonanSurat::with([
            'warga',
            'jenisSurat',
            'berkas.media', // WAJIB
        ])->get();

        return view('pages.guest.berkas.index', compact('permohonans'));
    }

    /**
     * Form tambah berkas
     */
    public function create($permohonan_id)
    {
        $permohonan = PermohonanSurat::findOrFail($permohonan_id);

        return view('pages.guest.berkas.create', compact('permohonan'));
    }

    /**
     * Simpan berkas + upload file
     */
    public function store(Request $request, $permohonan_id)
    {
        $request->validate([
            'nama_berkas' => 'required|string',
            'file'        => 'required|file|max:2048',
        ]);

        // simpan berkas
        $berkas = BerkasPersyaratan::create([
            'permohonan_id' => $permohonan_id,
            'nama_berkas'   => $request->nama_berkas,
            'valid'         => 0,
        ]);

        // simpan file
        $file     = $request->file('file');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();

        // SIMPAN FULL PATH
        $path = $file->storeAs('berkas_persyaratan', $fileName, 'public');

        Media::create([
            'ref_table'  => 'berkas_persyaratan',
            'ref_id'     => $berkas->berkas_id,
            'file_name'  => $path, // FULL PATH
            'caption'    => $request->nama_berkas,
            'mime_type'  => $file->getClientMimeType(),
            'sort_order' => 1,
        ]);

        return redirect()
            ->route('berkas.index')
            ->with('success', 'Berkas berhasil di-upload');
    }

    /**
     * Form edit berkas
     */
    public function edit($id)
    {
        $berkas = BerkasPersyaratan::with('media')->findOrFail($id);

        return view('pages.guest.berkas.edit', compact('berkas'));
    }

    /**
     * Update berkas
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_berkas' => 'required|string',
            'file'        => 'nullable|file|max:2048',
        ]);

        $berkas = BerkasPersyaratan::findOrFail($id);
        $berkas->update([
            'nama_berkas' => $request->nama_berkas,
        ]);

        // jika ganti file
        if ($request->hasFile('file')) {

            $media = Media::where('ref_table', 'berkas_persyaratan')
                ->where('ref_id', $id)
                ->first();

            // hapus file lama
            if ($media && Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
                $media->delete();
            }

            $file     = $request->file('file');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();

            // SIMPAN FULL PATH
            $path = $file->storeAs('berkas_persyaratan', $fileName, 'public');

            Media::create([
                'ref_table'  => 'berkas_persyaratan',
                'ref_id'     => $id,
                'file_name'  => $path, // FULL PATH
                'caption'    => $request->nama_berkas,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => 1,
            ]);
        }

        return redirect()
            ->route('berkas.index')
            ->with('success', 'Berkas berhasil diperbarui');
    }

    /**
     * Hapus berkas
     */
    public function destroy($id)
    {
        $media = Media::where('ref_table', 'berkas_persyaratan')
            ->where('ref_id', $id)
            ->first();

        if ($media) {
            if (Storage::disk('public')->exists($media->file_name)) {
                Storage::disk('public')->delete($media->file_name);
            }
            $media->delete();
        }

        BerkasPersyaratan::destroy($id);

        return redirect()
            ->route('berkas.index')
            ->with('success', 'Berkas berhasil dihapus');
    }
}
