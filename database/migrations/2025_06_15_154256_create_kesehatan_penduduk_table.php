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
        Schema::create('kesehatan_penduduk', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_penduduk');
            $table->string('golongan_darah');
            $table->longText('riwayat_penyakit')->nullable();
            $table->string('asuransi_kesehatan')->nullable();
            $table->string('no_asuransi')->nullable();
            $table->string('no_bpjs_naker')->nullable();

            $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kesehatan_penduduk');
    }
};
