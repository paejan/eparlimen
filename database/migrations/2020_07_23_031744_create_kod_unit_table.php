<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kod_unit', function (Blueprint $table) {
            $table->integer('id_unit', true);
            $table->integer('id_bahagian')->nullable();
            $table->string('nama_unit', 64)->nullable();
            $table->tinyInteger('status_unit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kod_unit');
    }
}
