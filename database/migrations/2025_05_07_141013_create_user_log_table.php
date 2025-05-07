<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_log', function (Blueprint $table) {
            $table->id('id_log'); // Primary key
            $table->bigInteger('user_id')->unsigned(); // Foreign key column
            $table->string('email');
            $table->string('action');
            $table->timestamp('time')->useCurrent()->onUpdate(DB::raw('CURRENT_TIMESTAMP')); // Timestamp column

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Adjust onDelete if needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_log');
    }
}
