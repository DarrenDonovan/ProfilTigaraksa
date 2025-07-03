// database/migrations/xxxx_xx_xx_xxxxxx_create_kegiatan_table.php
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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan'); 
            $table->string('nama_kegiatan');  
            $table->longText('keterangan')->nullable();  
            $table->string('gambar_kegiatan')->nullable();  
            $table->unsignedBigInteger('id_wilayah');
            $table->unsignedBigInteger('id_jenis_kegiatan');
            $table->date('tanggal_kegiatan')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('updated_at', precision: 0)->nullable();

            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
            $table->foreign('id_jenis_kegiatan')->references('id_jenis_kegiatan')->on('jenis_kegiatan');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
;