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
        Schema::create('pilihan_paket', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_paket');
            $table->string('nama_pilihan');
            $table->longText('keterangan');
            $table->string('durasi');
            $table->string('harga');
            $table->string('gambar_pilihan')->nullable();
            $table->string('no_whatsapp');
            
            $table->foreign('id_paket')->references('id_paket')->on('paket_wisata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_paket');
    }
};
