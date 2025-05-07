<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment
            $table->bigInteger('NIK', false, true)->nullable(); // NIK as bigint(16), nullable
            $table->string('nama_lengkap'); // Full name as varchar(255)
            $table->string('gambar_biodata'); // Biodata image as varchar(255)
            $table->string('jenis_kelamin', 20); // Gender as varchar(20)
            $table->string('tempat_lahir', 100); // Birthplace as varchar(100)
            $table->date('tanggal_lahir'); // Date of birth
            $table->string('alamat', 255); // Address as varchar(255)
            $table->string('suku_etnis', 255); // Ethnicity as varchar(255)
            $table->string('no_telepon', 20); // Phone number as varchar(20)
            $table->string('email', 255); // Email as varchar(255)
            $table->unsignedInteger('id_wilayah'); // Foreign key to wilayah
            $table->unsignedInteger('id_agama'); // Foreign key to agama
            $table->unsignedInteger('id_pendidikan'); // Foreign key to pendidikan
            $table->unsignedInteger('id_pekerjaan'); // Foreign key to pekerjaan
            $table->timestamp('tanggal_terdaftar')->useCurrent()->onUpdate(DB::raw('CURRENT_TIMESTAMP')); // Registration date with auto-updating timestamp
            $table->unsignedBigInteger('updated_by')->nullable(); // Updated by (user ID)
            $table->timestamp('updated_at')->nullable()->useCurrent()->onUpdate(DB::raw('CURRENT_TIMESTAMP')); // Updated at timestamp

            // Foreign key constraints (Assuming the relevant tables exist)
            $table->foreign('id_wilayah')->references('id')->on('wilayah');
            $table->foreign('id_agama')->references('id')->on('agama');
            $table->foreign('id_pendidikan')->references('id')->on('pendidikan');
            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaan');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
}
