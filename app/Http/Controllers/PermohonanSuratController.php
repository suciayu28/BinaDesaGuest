<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Warga;
use App\Models\JenisSurat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PermohonanSurat;
use App\Models\BerkasPersyaratan;
use App\Models\RiwayatStatusSurat;

class PermohonanSuratController extends Controller
{
    public function index()
    {
        $permohonans = PermohonanSurat::with('jenisSurat')
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        return view('pages.guest.permohonan.index', compact('permohonans'));
    }

    public function create(Request $request)
    {
        $jenisSuratId = $request->query('jenis_surat_id');
        $jenisSurat   = $jenisSuratId ? JenisSurat::findOrFail($jenisSuratId) : null;

        $listWarga = Warga::select('warga_id', 'nama', 'no_ktp')->orderBy('nama')->get();

        return view('pages.guest.permohonan.create', compact('jenisSurat', 'listWarga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemohon_warga_id' => 'required|exists:warga,warga_id',
            'jenis_id'         => 'required|exists:jenis_surat,jenis_id',
            'catatan'          => 'required|string|max:1000',
            'lampiran'         => 'required',
            'lampiran.*'       => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            $jenisSurat = JenisSurat::find($request->jenis_id);

            $nomorPermohonan = date('Ymd') . '/' . ($jenisSurat->kode_jenis ?? 'UNK') . '/' . Str::random(6);

            $permohonan = PermohonanSurat::create([
                'nomor_permohonan'  => $nomorPermohonan,
                'pemohon_warga_id'  => $request->pemohon_warga_id,
                'jenis_id'          => $request->jenis_id,
                'tanggal_pengajuan' => now(),
                'status'            => 'Diajukan',
                'catatan'           => $request->catatan,
            ]);

            // ============== UPLOAD LAMPIRAN ==============
            if ($request->hasFile('lampiran')) {
                foreach ($request->file('lampiran') as $index => $file) {

                    $original = $file->getClientOriginalName();
                    $fileName = time() . "_{$index}_" . Str::random(6) . "." . $file->extension();

                    $path = $file->storeAs(
                        "permohonan/{$permohonan->permohonan_id}",
                        $fileName,
                        'public'
                    );

                    Media::create([
                        'ref_table'  => 'permohonan_surat',
                        'ref_id'     => $permohonan->permohonan_id,
                        'file_name'  => $path,
                        'caption'    => $original,
                        'mime_type'  => $file->getClientMimeType(),
                        'sort_order' => Media::where('ref_table', 'permohonan_surat')
                                            ->where('ref_id', $permohonan->permohonan_id)
                                            ->count() + 1,
                    ]);
                }
            }

            // ============== GENERATE SYARAT BERKAS ==============
            foreach ($jenisSurat->syarat_json ?? [] as $syarat) {
                BerkasPersyaratan::create([
                    'permohonan_id' => $permohonan->permohonan_id,
                    'nama_berkas'   => $syarat,
                    'valid'         => 0,
                ]);
            }

            return redirect()->route('permohonan.index')
                ->with('success', 'Permohonan berhasil diajukan!');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $permohonan = PermohonanSurat::with([
            'jenisSurat',
            'warga',
            'berkas.media',
            'lampiran'   // RELASI BENAR
        ])->findOrFail($id);

        return view('pages.guest.permohonan.show', compact('permohonan'));
    }

    public function upload(Request $request, $permohonan_id)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240'
        ]);

        $permohonan = PermohonanSurat::findOrFail($permohonan_id);

        foreach ($request->file('files') as $index => $file) {

            $original = $file->getClientOriginalName();
            $fileName = time() . "_{$index}_" . Str::random(5) . "." . $file->extension();

            $path = $file->storeAs(
                "permohonan/{$permohonan_id}",
                $fileName,
                'public'
            );

            Media::create([
                'ref_table'  => 'permohonan_surat',
                'ref_id'     => $permohonan_id,
                'file_name'  => $path,
                'mime_type'  => $file->getClientMimeType(),
                'caption'    => $original,
                'sort_order' => Media::where('ref_table', 'permohonan_surat')
                    ->where('ref_id', $permohonan_id)
                    ->count() + 1,
            ]);
        }

        return redirect()->back()->with('success', 'File berhasil diunggah');
    }

    public function destroyFile($id)
    {
        $file = Media::findOrFail($id);

        if (Storage::disk('public')->exists($file->file_name)) {
            Storage::disk('public')->delete($file->file_name);
        }

        $file->delete();

        return redirect()->back()->with('success', 'File berhasil dihapus');
    }
}
