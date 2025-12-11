<?php

namespace App\Http\Controllers;

use App\Models\BerkasPersyaratan;
use App\Models\PermohonanSurat;
use App\Models\Media;
use Illuminate\Http\Request;

class BerkasPersyaratanController extends Controller
{
    /**
     * Menampilkan seluruh berkas,
     * atau berkas berdasarkan permohonan jika ada parameter.
     */
    public function index($permohonan_id = null)
    {
        // Jika tanpa parameter → tampil semua berkas
        if ($permohonan_id === null) {
            $berkas = BerkasPersyaratan::with('media')->get();
            return view('pages.guest.berkas.index', [
                'berkas' => $berkas,
                'permohonan' => null
            ]);
        }

        // Jika dengan parameter → tampil berdasarkan permohonan
        $permohonan = PermohonanSurat::findOrFail($permohonan_id);
        $berkas = BerkasPersyaratan::where('permohonan_id', $permohonan_id)
                    ->with('media')
                    ->get();

        return view('pages.guest.berkas.index', compact('permohonan', 'berkas'));
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
     * Simpan berkas + upload file media
     */
    public function store(Request $request, $permohonan_id)
    {
        $request->validate([
            'nama_berkas' => 'required|string',
            'file' => 'required|file|max:2048'
        ]);

        $berkas = BerkasPersyaratan::create([
            'permohonan_id' => $permohonan_id,
            'nama_berkas' => $request->nama_berkas,
            'valid' => 0
        ]);

        // upload file
        $file = $request->file('file');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->storeAs('berkas_persyaratan', $fileName, 'public');

        // simpan ke media
        Media::create([
            'ref_table' => 'berkas_persyaratan',
            'ref_id' => $berkas->berkas_id,
            'file_name' => $fileName,
            'caption' => $request->nama_berkas,
            'mime_type' => $file->getClientMimeType(),
            'sort_order' => 1
        ]);

        return redirect()->back()->with('success', 'Berkas berhasil di-upload.');
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $berkas = BerkasPersyaratan::with('media')->findOrFail($id);
        return view('pages.guest.berkas.edit', compact('berkas'));
    }

    /**
     * Update berkas + file opsional
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_berkas' => 'required|string',
            'file' => 'nullable|file'
        ]);

        $berkas = BerkasPersyaratan::findOrFail($id);
        $berkas->update(['nama_berkas' => $request->nama_berkas]);

        // jika update file
        if ($request->hasFile('file')) {
            $media = Media::where('ref_table', 'berkas_persyaratan')
                          ->where('ref_id', $id)
                          ->first();

            if ($media) {
                \Storage::disk('public')->delete('berkas_persyaratan/' . $media->file_name);
                $media->delete();
            }

            $file = $request->file('file');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->storeAs('berkas_persyaratan', $fileName, 'public');

            Media::create([
                'ref_table' => 'berkas_persyaratan',
                'ref_id' => $id,
                'file_name' => $fileName,
                'caption' => $request->nama_berkas,
                'mime_type' => $file->getClientMimeType(),
                'sort_order' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Hapus berkas + media file
     */
    public function destroy($id)
    {
        $media = Media::where('ref_table', 'berkas_persyaratan')
                      ->where('ref_id', $id)
                      ->first();

        if ($media) {
            \Storage::disk('public')->delete('berkas_persyaratan/' . $media->file_name);
            $media->delete();
        }

        BerkasPersyaratan::destroy($id);

        return redirect()->back()->with('success', 'Berkas berhasil dihapus');
    }
}
