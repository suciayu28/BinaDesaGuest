<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('permohonan_surat', function (Blueprint $table) {
            $table->id('permohonan_id'); // PK
            $table->string('nomor_permohonan')->unique();

            // Relasi ke tabel warga (kolom warga_id)
            $table->unsignedBigInteger('pemohon_warga_id');
            $table->foreign('pemohon_warga_id')
                  ->references('warga_id')
                  ->on('warga')
                  ->onDelete('cascade');

            // Relasi ke tabel jenis_surat (kolom jenis_id)
            $table->unsignedBigInteger('jenis_id');
            $table->foreign('jenis_id')
                  ->references('jenis_id')
                  ->on('jenis_surat')
                  ->onDelete('cascade');

            $table->date('tanggal_pengajuan');
            $table->string('status', 20)->default('menunggu');
            $table->text('catatan')->nullable();
            $table->string('lampiran')->nullable(); // untuk file (lampiran permohonan)
            $table->timestamps();
        });
    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_surat');
    }
};
