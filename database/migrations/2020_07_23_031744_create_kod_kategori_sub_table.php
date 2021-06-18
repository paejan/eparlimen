<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodKategoriSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kod_kategori_sub', function (Blueprint $table) {
            $table->integer('idsub_kategori', true);
            $table->integer('id_kategori')->index('id_kategori');
            $table->string('nama_sub_kategori', 32);
            $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kod_kategori_sub');
    }
}
