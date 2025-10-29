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
        Schema::table('warga', function (Blueprint $table) {
            // Menambahkan Foreign Key user_id
            // 'user_id' akan merujuk ke 'id' di tabel 'users'.
            $table->foreignId('user_id')
                  ->nullable()
                  ->unique()
                  ->after('warga_id') // Posisikan setelah Primary Key Anda
                  ->constrained('users') // Merujuk ke tabel 'users'
                  ->onDelete('set null'); // Jika data user dihapus, kolom ini di-set NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            // Hapus constraint foreign key sebelum menghapus kolom
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
