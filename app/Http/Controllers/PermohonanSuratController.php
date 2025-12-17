<?php
namespace App\Http\Controllers;

use App\Models\BerkasPersyaratan;
use App\Models\JenisSurat;
use App\Models\Media;
use App\Models\PermohonanSurat;
use App\Models\RiwayatStatusSurat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        $listWarga = Warga::select('warga_id', 'nama', 'no_ktp')
            ->orderBy('nama')
            ->get();

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
            $jenisSurat = JenisSurat::findOrFail($request->jenis_id);

            $nomorPermohonan = date('Ymd') . '/' . ($jenisSurat->kode_jenis ?? 'UNK') . '/' . Str::random(6);

            $permohonan = PermohonanSurat::create([
                'nomor_permohonan'  => $nomorPermohonan,
                'pemohon_warga_id'  => $request->pemohon_warga_id,
                'jenis_id'          => $request->jenis_id,
                'tanggal_pengajuan' => now(),
                'status'            => 'Diajukan',
                'catatan'           => $request->catatan,
            ]);
            // ===================== AUTO CREATE BERKAS =====================
            $syaratList = $jenisSurat->syarat_json;

            if (is_array($syaratList)) {
                foreach ($syaratList as $namaBerkas) {
                    BerkasPersyaratan::create([
                        'permohonan_id' => $permohonan->permohonan_id,
                        'nama_berkas'   => $namaBerkas,
                        'valid'         => 0,
                    ]);
                }
            }

            // ===================== FIX UTAMA =====================
            if ($request->hasFile('lampiran')) {
                foreach ($request->file('lampiran') as $index => $file) {

                    $original = $file->getClientOriginalName();
                    $fileName = time() . "_{$index}_" . Str::random(6) . "." . $file->extension();

                    // SIMPAN FILE
                    $path = $file->storeAs(
                        "permohonan/{$permohonan->permohonan_id}",
                        $fileName,
                        'public'
                    );

                    // SIMPAN DB (FULL PATH)
                    Media::create([
                        'ref_table'  => 'permohonan_surat',
                        'ref_id'     => $permohonan->permohonan_id,
                        'file_name'  => $path, // ✅ INI KUNCI
                        'caption'    => $original,
                        'mime_type'  => $file->getClientMimeType(),
                        'sort_order' => Media::where('ref_table', 'permohonan_surat')
                            ->where('ref_id', $permohonan->permohonan_id)
                            ->count() + 1,
                    ]);
                }
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
            'lampiran',
        ])->findOrFail($id);

        return view('pages.guest.permohonan.show', compact('permohonan'));
    }

    // ===================== FIX UPLOAD DETAIL =====================
    public function upload(Request $request, $permohonan_id)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240',
        ]);

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
                'file_name'  => $path, // ✅ FIX
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

    public function approve(PermohonanSurat $permohonan)
    {
        $permohonan->update(['status' => 'diproses']);

        RiwayatStatusSurat::create([
            'permohonan_id'    => $permohonan->permohonan_id,
            'status'           => 'diproses',
            'petugas_warga_id' => auth()->user()->warga->warga_id ?? null,
            'waktu'            => now(),
            'keterangan'       => 'Permohonan sedang diproses',
        ]);

        return back()->with('success', 'Permohonan diproses.');
    }

}
