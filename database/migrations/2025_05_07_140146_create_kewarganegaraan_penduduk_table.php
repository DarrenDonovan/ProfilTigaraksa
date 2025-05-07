<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKewarganegaraanPendudukTable extends Migration
{
    public function up(): void
    {
        Schema::create('kewarganegaraan_penduduk', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment
            $table->foreignId('id_penduduk')->constrained('penduduk')->onDelete('cascade'); // Foreign key to penduduk table
            $table->string('status_wn', 5); // Status WN with varchar(5)
            $table->string('no_paspor', 10)->nullable(); // No paspor with varchar(10), nullable
            $table->date('tanggal_paspor')->nullable(); // Tanggal paspor with date, nullable
            $table->integer('no_kitas_kitap')->nullable(); // No Kitas Kitap with int(11), nullable
            $table->string('negara_asal', 50)->nullable(); // Negara asal with varchar(50), nullable
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kewarganegaraan_penduduk');
    }
}
