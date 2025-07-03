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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id('id_penduduk');
            $table->bigInteger('NIK')->unique()->nullable();
            $table->string('nama_lengkap');
            $table->string('gambar_biodata')->nullable();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('suku_etnis');
            $table->string('no_telepon');
            $table->string('email');
            $table->unsignedBigInteger('id_wilayah');
            $table->unsignedBigInteger('id_agama');
            $table->unsignedBigInteger('id_pendidikan');
            $table->unsignedBigInteger('id_pekerjaan');
            $table->timestamp('tanggal_terdaftar', precision: 0);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('updated_at', precision: 0)->nullable();

            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
            $table->foreign('id_agama')->references('id_agama')->on('agama');
            $table->foreign('id_pendidikan')->references('id_pendidikan')->on('pendidikan');
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
};
