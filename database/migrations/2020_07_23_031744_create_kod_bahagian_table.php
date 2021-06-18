<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodBahagianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kod_bahagian', function (Blueprint $table) {
            $table->integer('id_bahagian', true);
            $table->string('kod_bahagian', 12)->nullable();
            $table->string('nama_bahagian', 100)->nullable();
            $table->string('status', 8)->nullable();
            $table->integer('pegawai_sub')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kod_bahagian');
    }
}
