<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgamaTable extends Migration
{
    public function up(): void
    {
        Schema::create('agama', function (Blueprint $table) {
            $table->id('id_agama'); // Primary key dengan auto increment
            $table->string('agama', 100); // Kolom agama, tipe varchar(100)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agama');
    }
}
