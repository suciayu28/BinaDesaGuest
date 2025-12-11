<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Multipleuploads;
use Illuminate\Support\Facades\Storage;

class MultipleuploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Multipleuploads $multipleuploads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Multipleuploads $multipleuploads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Multipleuploads $multipleuploads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // Hapus file
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Path file fisik
        $path = 'public/permohonan/'.$media->permohonan_id.'/'.$media->file_name;

        // Hapus file fisik
        if (Storage::exists($path)) {
            Storage::delete($path);
        }

        // Hapus record di database
        $media->delete();

        return redirect()->back()->with('success', 'Lampiran berhasil dihapus.');
    }
}
