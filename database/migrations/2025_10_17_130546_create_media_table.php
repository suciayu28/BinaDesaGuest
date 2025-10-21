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
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id'); // PK
            $table->string('ref_table', 50); // Contoh: 'jenis_surat' atau 'permohonan'
            $table->unsignedBigInteger('ref_id'); // ID dari tabel referensi (misal: jenis_id)
            $table->string('file_url');
            $table->string('caption')->nullable();
            $table->string('mime_type', 50)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            // Indeks untuk mempercepat pencarian
            $table->index(['ref_table', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
