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
        Schema::create('kewarganegaraan_penduduk', function (Blueprint $table) {
            $table->id('id_kewarganegaraan');
            $table->unsignedBigInteger('id_penduduk');
            $table->string('status_wn');
            $table->longText('no_paspor')->nullable();
            $table->date('tanggal_paspor')->nullable();
            $table->string('no_kitas_kitap')->nullable();
            $table->string('negara_asal')->nullable();

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
        Schema::dropIfExists('kewarganegaraan_penduduk');
    }
};
