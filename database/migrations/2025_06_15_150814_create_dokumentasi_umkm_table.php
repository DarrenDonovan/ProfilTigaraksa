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
        Schema::create('dokumentasi_umkm', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_umkm');
            $table->longText('gambar')->nullable();

            $table->foreign('id_umkm')->references('id_umkm')->on('umkm')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumentasi_umkm');
    }
};
