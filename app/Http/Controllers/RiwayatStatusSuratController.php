<?php

namespace App\Http\Controllers;

use App\Models\RiwayatStatusSurat;

class RiwayatStatusSuratController extends Controller
{
    public function index($permohonan_id)
    {
        $riwayat = RiwayatStatusSurat::with(['petugas'])
            ->where('permohonan_id', $permohonan_id)
            ->orderBy('waktu', 'asc')
            ->get();

        return view('pages.guest.riwayatStatusSurat.index', compact('riwayat'));
    }
}
