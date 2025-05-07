<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint unsigned, auto increment
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); // varchar(100), nullable
            $table->timestamps(); // created_at & updated_at
            $table->string('role');
            $table->unsignedBigInteger('id_wilayah')->index();

            // Foreign key ke tabel wilayah
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
