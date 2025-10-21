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
         Schema::create('jenis_surat', function (Blueprint $table) {
            $table->id('jenis_id'); // PK
            $table->string('kode', 10)->unique(); // UNQ
            $table->string('nama_jenis', 150);
            $table->json('syarat_json')->nullable(); // Syarat dalam format JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_surat');
    }
};
