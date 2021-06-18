<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kod_kategori', function (Blueprint $table) {
            $table->integer('id_kategori', true);
            $table->string('kod_kategori', 3)->nullable();
            $table->string('nama_kategori', 100)->nullable();
            $table->string('status', 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kod_kategori');
    }
}
