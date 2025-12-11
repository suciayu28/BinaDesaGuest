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
            'files.*' => 'required|file|max:10240', // max 10MB
            'permohonan_id' => 'required|exists:permohonan_surat,permohonan_id',
        ]);

        foreach ($request->file('files') as $file) {
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/permohonan/'.$request->permohonan_id, $filename);

            Media::create([
                'permohonan_id' => $request->permohonan_id,
                'file_name' => $filename,
                'mime_type' => $file->getClientMimeType(),
                'caption' => null
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
