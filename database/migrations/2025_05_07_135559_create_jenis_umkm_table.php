<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisUmkmTable extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_umkm', function (Blueprint $table) {
            $table->id('id_jenis_umkm'); // Primary key dengan auto increment
            $table->string('jenis_umkm', 255); // Kolom jenis_umkm, tipe varchar(255)
            $table->longText('keterangan'); // Kolom keterangan, tipe longtext
            $table->string('gambar_jenis_umkm', 255); // Kolom gambar_jenis_umkm, tipe varchar(255)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_umkm');
    }
}
