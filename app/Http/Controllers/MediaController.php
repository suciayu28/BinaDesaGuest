<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Upload multiple file
    public function store(Request $request)
{
    $request->validate([
        'permohonan_id' => 'required',
        'files.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    foreach ($request->file('files') as $index => $file) {

        $filename = time().'_'.$file->getClientOriginalName();

        // simpan file
        $file->storeAs(
            'public/permohonan/'.$request->permohonan_id,
            $filename
        );

        // simpan metadata ke tabel media
        Media::create([
            'ref_table'  => 'permohonan_surat',   // 🔴 WAJIB
            'ref_id'     => $request->permohonan_id, // 🔴 WAJIB
            'file_name'  => $filename,
            'mime_type'  => $file->getClientMimeType(),
            'caption'    => null,
            'sort_order' => $index + 1,
        ]);
    }

    return back()->with('success', 'Lampiran berhasil diunggah.');
}


    // Hapus file
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        $path = 'public/permohonan/'.$media->permohonan_id.'/'.$media->file_name;

        if (Storage::exists($path)) {
            Storage::delete($path);
        }

        $media->delete();

        return back()->with('success', 'Lampiran berhasil dihapus.');
    }
}
