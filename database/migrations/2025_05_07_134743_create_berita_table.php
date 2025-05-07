<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); // Primary key dengan auto increment
            $table->longText('judul_berita'); // Kolom judul_berita, tipe longtext
            $table->longText('konten_berita'); // Kolom konten_berita, tipe longtext
            $table->string('gambar_berita', 255); // Kolom gambar_berita, tipe varchar(255)
            $table->string('penulis_berita', 255); // Kolom penulis_berita, tipe varchar(255)
            $table->date('tanggal_berita'); // Kolom tanggal_berita, tipe date
            $table->foreignId('id_wilayah')->constrained()->onDelete('cascade'); // Kolom id_wilayah, foreign key

            // Kolom created_by, dengan referensi ke users.id
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('created_at')->nullable(); // Kolom created_at manual

            // Kolom updated_by, dengan referensi ke users.id
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('updated_at')->nullable(); // Kolom updated_at manual
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
}
