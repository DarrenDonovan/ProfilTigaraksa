<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPernikahanTable extends Migration
{
    public function up(): void
    {
        Schema::create('status_pernikahan', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment
            $table->foreignId('id_penduduk')->constrained()->onDelete('cascade'); // Foreign key referencing the penduduk table
            $table->foreignId('id_status')->constrained()->onDelete('cascade'); // Foreign key referencing the status table
            $table->string('no_akta_nikah', 20)->nullable(); // Akta nikah number
            $table->date('tanggal_nikah')->nullable(); // Date of marriage
            $table->date('tanggal_cerai')->nullable(); // Date of divorce (if applicable)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status_pernikahan');
    }
}
