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
        Schema::create('galeri_aktivitas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_paket');
            $table->string('nama_aktivitas');
            $table->longText('gambar_aktivitas')->nullable();

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
        Schema::dropIfExists('galeri_aktivitas');
    }
};
