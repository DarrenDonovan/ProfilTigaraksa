<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmTable extends Migration
{
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('id_umkm'); // Primary key with auto increment
            $table->string('nama_umkm', 255); // Name of UMKM
            $table->foreignId('id_wilayah')->constrained()->onDelete('cascade'); // Foreign key to wilayah table
            $table->longText('keterangan'); // Description of UMKM
            $table->string('gambar_umkm', 255); // Image link
            $table->foreignId('id_jenis_umkm')->constrained()->onDelete('cascade'); // Foreign key to jenis_umkm table
            $table->decimal('latitude', 20, 17); // Latitude of UMKM
            $table->decimal('longitude', 20, 17); // Longitude of UMKM
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null'); // Foreign key to users table (optional)
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Timestamp for updates
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
}
