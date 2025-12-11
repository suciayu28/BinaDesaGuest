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
       Schema::create('riwayat_status_surat', function (Blueprint $table) {
            $table->id('riwayat_id');
            $table->unsignedBigInteger('permohonan_id');
            $table->string('status');
            $table->unsignedBigInteger('petugas_warga_id')->nullable();
            $table->timestamp('waktu')->useCurrent();
            $table->text('keterangan')->nullable();

            // Foreign key
            $table->foreign('petugas_warga_id')->references('warga_id')->on('warga')->onDelete('set null');
            $table->foreign('permohonan_id')->references('id')->on('permohonan')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_status_surat');
    }
};
