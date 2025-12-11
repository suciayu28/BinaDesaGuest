<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('berkas_persyaratan', function (Blueprint $table) {
            $table->id('berkas_id'); // Primary Key

            // Foreign Key ke tabel permohonan_surat
            $table->unsignedBigInteger('permohonan_id');

            $table->string('nama_berkas', 150)->comment('Nama persyaratan, misal: KTP, Kartu Keluarga');

            // Status validitas berkas: 0=Belum diunggah/Belum valid, 1=Valid
            $table->boolean('valid')->default(0);

            $table->timestamps();

            // Definisikan Foreign Key (Relasi)
            $table->foreign('permohonan_id')
                  ->references('permohonan_id')
                  ->on('permohonan_surat')
                  ->onDelete('cascade'); // Jika permohonan dihapus, berkas persyaratannya ikut terhapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_persyaratan');
    }
};
