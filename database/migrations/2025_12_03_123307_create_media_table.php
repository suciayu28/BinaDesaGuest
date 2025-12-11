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
        $table->bigIncrements('media_id');
        $table->string('ref_table');
        $table->unsignedBigInteger('ref_id');
        $table->string('file_name');
        $table->string('mime_type')->nullable();
        $table->string('caption')->nullable();
        $table->integer('sort_order')->default(0);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('media');
    }

};
