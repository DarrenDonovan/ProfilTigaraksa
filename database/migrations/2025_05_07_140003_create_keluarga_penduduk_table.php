<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaPendudukTable extends Migration
{
    public function up(): void
    {
        Schema::create('keluarga_penduduk', function (Blueprint $table) {
            $table->id('id_keluarga'); // Primary key dengan auto increment
            $table->foreignId('id_penduduk')->constrained('penduduk')->onDelete('cascade'); // Kolom id_penduduk sebagai foreign key
            $table->bigInteger('no_kk'); // Kolom no_kk, tipe bigint(16)
            $table->foreignId('hub_keluarga')->constrained('hubungan_keluarga')->onDelete('cascade'); // Kolom hub_keluarga sebagai foreign key
            $table->bigInteger('nik_ayah'); // Kolom nik_ayah, tipe bigint(16)
            $table->string('nama_ayah', 255); // Kolom nama_ayah, tipe varchar(255)
            $table->bigInteger('nik_ibu'); // Kolom nik_ibu, tipe bigint(16)
            $table->string('nama_ibu', 255); // Kolom nama_ibu, tipe varchar(255)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keluarga_penduduk');
    }
}
