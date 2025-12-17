<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultipleuploadsController extends Controller
{
    /**
     * Upload lampiran permohonan (MULTI FILE)
     */
    public function store(Request $request)
    {
        $request->validate([
            'permohonan_id' => 'required',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        foreach ($request->file('files') as $index => $file) {

            $filename = time().'_'.$file->getClientOriginalName();

            // Simpan file ke storage
            $file->storeAs(
                'public/permohonan/'.$request->permohonan_id,
                $filename
            );

            // Simpan metadata ke database (tabel media)
            Media::create([
                'ref_table'  => 'permohonan_surat',
                'ref_id'     => $request->permohonan_id,
                'file_name'  => $filename,
                'file_type'  => $file->getClientMimeType(),
                'sort_order' => $index + 1,
            ]);
        }

        return back()->with('success', 'Lampiran berhasil diunggah.');
    }

    /**
     * Hapus lampiran
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        $path = 'public/permohonan/'.$media->ref_id.'/'.$media->file_name;

        if (Storage::exists($path)) {
            Storage::delete($path);
        }

        $media->delete();

        return back()->with('success', 'Lampiran berhasil dihapus.');
    }
}
