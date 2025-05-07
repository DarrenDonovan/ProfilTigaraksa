<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKesehatanPendudukTable extends Migration
{
    public function up(): void
    {
        Schema::create('kesehatan_penduduk', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment
            $table->foreignId('id_penduduk')->constrained('penduduk')->onDelete('cascade'); // Foreign key to penduduk table
            $table->string('golongan_darah', 10); // Golongan darah with varchar(10)
            $table->longText('riwayat_penyakit'); // Riwayat penyakit with longtext
            $table->string('asuransi_kesehatan', 100)->nullable(); // Asuransi kesehatan with varchar(100), nullable
            $table->bigInteger('no_asuransi')->nullable(); // No asuransi with bigint(20), nullable
            $table->bigInteger('no_bpjs_naker')->nullable(); // No BPJS Naker with bigint(11), nullable
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kesehatan_penduduk');
    }
}
