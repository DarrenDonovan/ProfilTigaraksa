<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerangkatTable extends Migration
{
    public function up(): void
    {
        Schema::create('perangkat', function (Blueprint $table) {
            $table->id(); // Primary key with auto increment
            $table->string('nama'); // Name as varchar(255)
            $table->string('jabatan'); // Position as varchar(255)
            $table->string('link_facebook', 255)->nullable(); // Facebook link, nullable
            $table->string('link_instagram', 255)->nullable(); // Instagram link, nullable
            $table->string('link_tiktok', 255)->nullable(); // TikTok link, nullable
            $table->unsignedInteger('id_wilayah')->nullable(); // Foreign key to wilayah, nullable
            $table->string('gambar_perangkat'); // Image as varchar(255)
            $table->unsignedBigInteger('updated_by')->nullable(); // Updated by (user ID), nullable
            $table->timestamp('updated_at')->nullable()->useCurrent()->onUpdate(DB::raw('CURRENT_TIMESTAMP')); // Updated at timestamp

            // Foreign key constraints (Assuming the relevant tables exist)
            $table->foreign('id_wilayah')->references('id')->on('wilayah');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkat');
    }
}
