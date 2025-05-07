<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisKegiatanTable extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_kegiatan', function (Blueprint $table) {
            $table->id('id_jenis_kegiatan'); // Primary key dengan auto increment
            $table->string('nama_jenis_kegiatan', 50); // Kolom nama_jenis_kegiatan, tipe varchar(50)
            $table->string('gambar_jenis_kegiatan', 255); // Kolom gambar_jenis_kegiatan, tipe varchar(255)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_kegiatan');
    }
}
