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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id('id_wisata');
            $table->unsignedBigInteger('id_wilayah');
            $table->string('nama_tempat');
            $table->longText('keterangan');
            $table->string('gambar_wisata')->nullable();
            $table->decimal('latitude', total: 20, places: 17)->nullable();
            $table->decimal('longitude', total: 20, places: 17)->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('updated_at', precision: 0)->nullable();

            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata');
    }
};
