<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id('id_about'); // INT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedInteger('id_wilayah')->index(); // Foreign key ke wilayah
            $table->longText('visi');
            $table->longText('misi');
            $table->string('gambar_about', 255);
            $table->string('bagan_organisasi', 255);
            $table->unsignedBigInteger('updated_by')->nullable()->index(); // Foreign key ke users.id
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();

            // Foreign key ke tabel wilayah
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah')->onDelete('cascade');

            // Foreign key ke tabel users (updated_by)
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
}
