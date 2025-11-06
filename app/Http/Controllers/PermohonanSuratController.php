<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\PermohonanSurat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PermohonanSuratController extends Controller
{
    /**
     * Menampilkan daftar riwayat permohonan surat milik Warga yang sedang login.
     */
    public function index()
    {
        $warga = Warga::where('user_id', Auth::id())->first();

        if (!$warga) {
            $permohonans = collect();
        } else {
            $permohonans = PermohonanSurat::where('pemohon_warga_id', $warga->warga_id)
                ->with('jenisSurat')
                ->orderBy('tanggal_pengajuan', 'desc')
                ->get();
        }

        return view('pages.guest.permohonan.index', compact('permohonans'));
    }

    /**
     * Tampilkan formulir pengajuan permohonan surat baru.
     * Sekarang mendukung query param: /permohonan/create?jenis_surat_id=1
     */
    public function create(Request $request)
    {
        $jenisSuratId = $request->query('jenis_surat_id');
        $jenisSurat = $jenisSuratId ? JenisSurat::findOrFail($jenisSuratId) : null;

        $listWarga = Warga::select('warga_id', 'nama', 'no_ktp')->orderBy('nama')->get();

        return view('pages.guest.permohonan.create', compact('jenisSurat', 'listWarga'));
    }

    /**
     * Simpan data permohonan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pemohon_warga_id'  => 'required|integer|exists:warga,warga_id',
            'jenis_id'          => 'required|integer|exists:jenis_surat,jenis_id',
            'catatan'           => 'required|string|max:1000',
            'lampiran'          => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            $jenisSurat = JenisSurat::find($request->jenis_id);
            $kodeSurat = $jenisSurat->kode_jenis ?? 'UNK';
            $nomorPermohonan = date('Ymd') . '/' . $kodeSurat . '/' . Str::random(5);

            $permohonan = PermohonanSurat::create([
                'nomor_permohonan'  => $nomorPermohonan,
                'pemohon_warga_id'  => $request->pemohon_warga_id,
                'jenis_id'          => $request->jenis_id,
                'tanggal_pengajuan' => now(),
                'status'            => 'Diajukan',
                'catatan'           => $request->catatan,
            ]);

            if ($request->hasFile('lampiran')) {
                $permohonan->addMediaFromRequest('lampiran')
                    ->toMediaCollection('permohonan_surat');
            }

            return redirect()->route('pages.guest.permohonan.index')
                ->with('success', "Permohonan surat **{$jenisSurat->nama_jenis}** berhasil diajukan dengan Nomor: **{$nomorPermohonan}**. Status dapat dicek di Riwayat Permohonan!");
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Gagal mengajukan permohonan. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail satu permohonan surat (dipanggil dari tombol "Lihat Detail").
     */
    public function show($id)
    {
        $permohonan = PermohonanSurat::with('jenisSurat', 'warga')->findOrFail($id);

        return view('pages.guest.permohonan.show', compact('permohonan'));
    }

    // Kamu bisa tambahkan edit(), update(), dan destroy() nanti kalau butuh.
}
