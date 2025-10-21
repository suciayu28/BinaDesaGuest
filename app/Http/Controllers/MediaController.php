<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * READ (INDEX) - Menampilkan semua media yang tersimpan
     */
    public function index()
    {
        $medias = Media::all();
        return view('media.index', compact('medias'));
    }

    /**
     * CREATE (UPLOAD) - Menyimpan file dan data media
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'ref_table' => 'required|string',
            'ref_id' => 'required|integer',
        ]);

        // Simpan file ke storage 'public/uploads'
        $path_with_disk = $request->file('file')->store('uploads', 'public');
        $path_relative = str_replace('public/', '', $path_with_disk);

        $data['ref_table'] = $request->ref_table;
        $data['ref_id'] = $request->ref_id;
        $data['file_url'] = $path_relative;
        $data['mime_type'] = $request->file('file')->getClientMimeType();

        $media = Media::create($data);

        // URL publik agar file bisa diakses
        $public_url = Storage::url($path_with_disk);

        return response()->json([
            'success' => true,
            'media_id' => $media->media_id,
            'url' => $public_url,
        ]);
    }

    /**
     * READ (SHOW) - Menampilkan detail satu media
     */
    public function show(Media $media)
    {
        return view('media.show', compact('media'));
    }

    /**
     * UPDATE - Mengganti file media yang sudah ada
     */
    public function update(Request $request, Media $media)
    {
        $request->validate([
            'file' => 'nullable|file',
            'ref_table' => 'required|string',
            'ref_id' => 'required|integer',
        ]);

        // Jika ada file baru, hapus file lama dan upload baru
        if ($request->hasFile('file')) {
            $old_file_path = 'public/' . $media->file_url;
            if (Storage::disk('public')->exists($old_file_path)) {
                Storage::disk('public')->delete($old_file_path);
            }

            // Upload file baru
            $path_with_disk = $request->file('file')->store('uploads', 'public');
            $path_relative = str_replace('public/', '', $path_with_disk);

            $media->file_url = $path_relative;
            $media->mime_type = $request->file('file')->getClientMimeType();
        }

        // Update data lainnya
        $media->ref_table = $request->ref_table;
        $media->ref_id = $request->ref_id;
        $media->save();

        return redirect()->route('media.index')->with('success', 'Media berhasil diperbarui.');
    }

    /**
     * DELETE - Menghapus data dan file fisik
     */
    public function destroy(Media $media)
    {
        // Hapus file fisik dari storage
        $file_path = 'public/' . $media->file_url;
        if (Storage::disk('public')->exists($file_path)) {
            Storage::disk('public')->delete($file_path);
        }

        // Hapus entri dari database
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus.');
    }
}
