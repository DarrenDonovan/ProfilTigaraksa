<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahTable extends Migration
{
    public function up(): void
    {
        Schema::create('wilayah', function (Blueprint $table) {
            $table->id('id_wilayah'); // INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nama_wilayah', 255);
            $table->string('jenis_wilayah', 50);
            $table->integer('luas_wilayah');
            $table->decimal('latitude', 20, 17);
            $table->decimal('longitude', 20, 17);
            $table->string('batas_utara', 255);
            $table->string('batas_timur', 255);
            $table->string('batas_barat', 255);
            $table->string('batas_selatan', 255);
            $table->string('gambar_wilayah', 255);
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
}
