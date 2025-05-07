<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan'); // Primary key dengan auto increment
            $table->string('nama_kegiatan', 255); // Kolom nama_kegiatan, tipe varchar(255)
            $table->longText('keterangan')->nullable(); // Kolom keterangan, tipe longtext, nullable
            $table->string('gambar_kegiatan', 255)->nullable(); // Kolom gambar_kegiatan, tipe varchar(255), nullable
            $table->foreignId('id_wilayah')->constrained('wilayah')->onDelete('cascade'); // Kolom id_wilayah sebagai foreign key
            $table->foreignId('id_jenis_kegiatan')->constrained('jenis_kegiatan')->onDelete('cascade'); // Kolom id_jenis_kegiatan sebagai foreign key
            $table->date('tanggal_kegiatan')->nullable(); // Kolom tanggal_kegiatan, tipe date, nullable
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null'); // Kolom updated_by sebagai foreign key
            $table->timestamp('updated_at')->nullable(); // Kolom updated_at, tipe timestamp, nullable
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
}
