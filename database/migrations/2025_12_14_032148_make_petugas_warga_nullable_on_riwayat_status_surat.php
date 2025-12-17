<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('riwayat_status_surat', function (Blueprint $table) {
        $table->unsignedBigInteger('petugas_warga_id')->nullable()->change();
    });
}

public function down()
{
    Schema::table('riwayat_status_surat', function (Blueprint $table) {
        $table->unsignedBigInteger('petugas_warga_id')->nullable(false)->change();
    });
}
};
