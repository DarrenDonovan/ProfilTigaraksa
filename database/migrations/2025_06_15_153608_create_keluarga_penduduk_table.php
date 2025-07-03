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
        Schema::create('keluarga_penduduk', function (Blueprint $table) {
            $table->id('id_keluarga');
            $table->unsignedBigInteger('id_penduduk');
            $table->bigInteger('no_kk');
            $table->unsignedBigInteger('hub_keluarga');
            $table->bigInteger('nik_ayah');
            $table->string('nama_ayah');
            $table->bigInteger('nik_ibu');
            $table->string('nama_ibu');

            $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk')->onDelete('cascade');
            $table->foreign('hub_keluarga')->references('id_hubungan')->on('hubungan_keluarga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluarga_penduduk');
    }
};
