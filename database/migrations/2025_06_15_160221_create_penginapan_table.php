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
        Schema::create('penginapan', function (Blueprint $table) {
            $table->id('id_penginapan');
            $table->unsignedBigInteger('id_paket');
            $table->string('nama_penginapan');
            $table->decimal('latitude', total: 20, places: 17)->nullable();
            $table->decimal('longitude', total: 20, places: 17)->nullable();
            $table->longText('keterangan');
            $table->string('estimasi_jarak');
            $table->string('harga_per_malam');
            $table->longText('fasilitas');
            $table->string('no_whatsapp');
            $table->string('gambar_penginapan')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('updated_at', precision: 0)->nullable();

            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('penginapan');
    }
};
