<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata_vr', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_wisata');
            $table->string('nama_tempat');
            $table->string('gambar_depan');
            $table->string('gambar_kanan');
            $table->string('gambar_belakang');
            $table->string('gambar_kiri');
            $table->string('gambar_atas');
            $table->string('gambar_bawah');

            $table->foreign('id_wisata')->references('id_wisata')->on('wisata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata_vr');
    }
};
