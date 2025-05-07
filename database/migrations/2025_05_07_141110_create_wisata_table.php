<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id('id_wisata'); // Primary key
            $table->integer('id_wilayah')->unsigned(); // Foreign key (for wilayah)
            $table->string('nama_tempat'); // Name of the tourist place
            $table->longText('keterangan'); // Description of the place
            $table->string('gambar_wisata')->nullable(); // Image of the place (nullable)
            $table->decimal('latitude', 20, 17)->nullable(); // Latitude (nullable)
            $table->decimal('longitude', 20, 17)->nullable(); // Longitude (nullable)
            $table->bigInteger('updated_by')->unsigned()->nullable(); // Updated by (nullable)
            $table->timestamp('updated_at')->nullable(); // Timestamp for the last update

            // Foreign key constraints
            $table->foreign('id_wilayah')->references('id')->on('wilayah')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            $table->timestamps(); // Laravel's created_at and updated_at columns
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
}
