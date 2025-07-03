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
        Schema::create('kelahiran_penduduk', function (Blueprint $table) {
            $table->id('id_kelahiran');
            $table->unsignedBigInteger('id_penduduk');
            $table->string('no_akta');
            $table->time('waktu_lahir')->nullable();
            $table->string('tempat_dilahirkan');
            $table->integer('anak_ke');
            $table->integer('berat_lahir');
            $table->integer('tinggi_lahir');

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
        Schema::dropIfExists('kelahiran_penduduk');
    }
};
