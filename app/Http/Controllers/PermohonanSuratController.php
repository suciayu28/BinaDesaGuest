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
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Untuk kepentingan Warga yang melihat riwayat permohonan yang dia ajukan,
        // filter tetap dilakukan berdasarkan warga_id dari akun yang login.
        $warga = Warga::where('user_id', Auth::id())->first();

        if (!$warga) {
            $permohonans = collect();
        } else {
            $permohonans = PermohonanSurat::where('pemohon_warga_id', $warga->warga_id)
                                         ->with('jenisSurat')
                                         ->orderBy('tanggal_pengajuan', 'desc')
                                         ->get();
        }

        return view('guest.permohonan.index', compact('permohonans'));
    }

    // ----------------------------------------------------------------------------------

    /**
     * Tampilkan formulir pengajuan permohonan surat baru.
     *
     * @param  string $jenis_id ID Jenis Surat yang diajukan.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create($jenis_id)
    {
        $jenisSurat = JenisSurat::findOrFail($jenis_id);

        // Mengambil SEMUA data Warga (warga_id, nama, dan no_ktp) untuk ditampilkan di dropdown.
        $listWarga = Warga::select('warga_id', 'nama', 'no_ktp')->orderBy('nama')->get();

        return view('guest.permohonan.create', compact('jenisSurat', 'listWarga'));
    }

    // ----------------------------------------------------------------------------------

    /**
     * Simpan data permohonan yang diajukan ke database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validasi Data Masukan
        $request->validate([
            'pemohon_warga_id'  => 'required|integer|exists:warga,warga_id',
            'jenis_id'          => 'required|integer|exists:jenis_surat,jenis_id',
            'catatan'           => 'required|string|max:1000',
            'lampiran'          => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // ⭐ Ambil Jenis Surat dan Generate Nomor Permohonan
            $jenisSurat = JenisSurat::find($request->jenis_id);
            $kodeSurat = $jenisSurat->kode_jenis ?? 'UNK';

            $nomorPermohonan = date('Ymd') . '/' . $kodeSurat . '/' . Str::random(5);

            // 2. Buat Entri Permohonan Surat
            $permohonan = PermohonanSurat::create([
                'nomor_permohonan'  => $nomorPermohonan,
                'pemohon_warga_id'  => $request->pemohon_warga_id,
                'jenis_id'          => $request->jenis_id,
                'tanggal_pengajuan' => now(),
                'status'            => 'Diajukan',
                'catatan'           => $request->catatan,
            ]);

            // 3. Proses Lampiran (Spatie MediaLibrary)
            if ($request->hasFile('lampiran')) {
                $permohonan->addMediaFromRequest('lampiran')
                    ->toMediaCollection('permohonan_surat');
            }

            // 4. Redirect sukses ke halaman permohonan index
            $namaSurat = $jenisSurat->nama_jenis ?? 'Surat Permohonan';

            return redirect()->route('permohonan.index')
                             ->with('success', "Permohonan surat **{$namaSurat}** berhasil diajukan dengan Nomor: **{$nomorPermohonan}**. Status dapat dicek di Riwayat Permohonan!");

        } catch (\Exception $e) {
            // 5. Handle error
            return back()->withInput()
                         ->with('error', 'Gagal mengajukan permohonan. Silakan coba lagi. Detail Error: ' . $e->getMessage());
        }
    }
}
