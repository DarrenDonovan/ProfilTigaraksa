<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanTable extends Migration
{
    public function up(): void
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment
            $table->string('pekerjaan', 100); // Pekerjaan with varchar(100)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pekerjaan');
    }
}
