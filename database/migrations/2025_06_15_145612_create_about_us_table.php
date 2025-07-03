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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id('id_about');
            $table->unsignedBigInteger('id_wilayah');
            $table->longText('visi');
            $table->longText('misi');
            $table->string('gambar_about')->nullable();
            $table->string('bagan_organisasi');
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
        Schema::dropIfExists('about_us');
    }
};
