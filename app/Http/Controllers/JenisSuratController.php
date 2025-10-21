<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index()
    {
        // Ambil semua Jenis Surat, beserta relasi templates (media)
        $jenisSurats = JenisSurat::with('templates')->get();
        // Menggunakan $jenisSurats (plural) untuk konsistensi di Blade

        // Mengirim data ke View. Perbaikan di sini:
        // 'guest.jenis-surat' merujuk ke resources/views/guest/jenis-surat.blade.php
        return view('guest.jenis_surat', compact('jenisSurats'));
    }

    // Catatan: Redirect, Validation, dan Flash Data akan diterapkan di Controller lain
    // yaitu: PermohonanSuratController saat memproses POST request.
}
