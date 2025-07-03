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
        Schema::create('pernikahan_penduduk', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_penduduk');
            $table->unsignedBigInteger('id_status');
            $table->string('no_akta_nikah')->nullable();
            $table->date('tanggal_nikah')->nullable();
            $table->date('tanggal_cerai')->nullable();

            $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk')->onDelete('cascade');
            $table->foreign('id_status')->references('id_status')->on('status_nikah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pernikahan_penduduk');
    }
};
