<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanTable extends Migration
{
    public function up(): void
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment
            $table->string('tingkat_pendidikan', 100); // Tingkat pendidikan with varchar(100)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
}
