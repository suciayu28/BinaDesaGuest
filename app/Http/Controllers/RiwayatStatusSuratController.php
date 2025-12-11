<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use App\Models\RiwayatStatusSurat;

class RiwayatStatusSuratController extends Controller
{
    public function index($permohonan_id)
    {
        $riwayats = RiwayatStatusSurat::with('petugas')
            ->where('permohonan_id', $permohonan_id)
            ->orderBy('waktu', 'asc')
            ->get();

        return view('riwayat.index', compact('riwayats'));
    }
}
