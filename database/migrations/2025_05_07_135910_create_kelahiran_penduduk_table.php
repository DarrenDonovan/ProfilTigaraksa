<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelahiranPendudukTable extends Migration
{
    public function up(): void
    {
        Schema::create('kelahiran_penduduk', function (Blueprint $table) {
            $table->id('id_kelahiran'); // Primary key dengan auto increment
            $table->foreignId('id_penduduk')->constrained('penduduk')->onDelete('cascade'); // Kolom id_penduduk sebagai foreign key
            $table->string('no_akta', 50); // Kolom no_akta, tipe varchar(50)
            $table->time('waktu_lahir')->nullable(); // Kolom waktu_lahir, tipe time, nullable
            $table->string('tempat_dilahirkan', 255); // Kolom tempat_dilahirkan, tipe varchar(255)
            $table->integer('anak_ke'); // Kolom anak_ke, tipe integer
            $table->integer('berat_lahir'); // Kolom berat_lahir, tipe integer
            $table->integer('tinggi_lahir'); // Kolom tinggi_lahir, tipe integer
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelahiran_penduduk');
    }
}
