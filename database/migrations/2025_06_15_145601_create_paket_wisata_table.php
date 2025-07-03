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
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id('id_paket');
            $table->unsignedBigInteger('id_wisata');
            $table->string('nama_paket');
            $table->longText('tentang_paket');
            $table->string('gambar_paket')->nullable();
            $table->longText('fasilitas_umum')->nullable();
            $table->longText('fasilitas_hiburan')->nullable();
            $table->longText('fasilitas_kenyamanan')->nullable();
            $table->longText('fasilitas_keamanan')->nullable();
            $table->longText('kuliner_belanja')->nullable();
            $table->longText('aksesibilitas')->nullable();
            $table->string('no_whatsapp')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('updated_at', precision: 0)->nullable();

            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('id_wisata')->references('id_wisata')->on('wisata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_wisata');
    }
};
