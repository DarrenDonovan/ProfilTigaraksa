<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubunganKeluargaTable extends Migration
{
    public function up(): void
    {
        Schema::create('hubungan_keluarga', function (Blueprint $table) {
            $table->id('id_hubungan'); // Primary key dengan auto increment
            $table->string('hubungan_keluarga', 50); // Kolom hubungan_keluarga, tipe varchar(50)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hubungan_keluarga');
    }
}
