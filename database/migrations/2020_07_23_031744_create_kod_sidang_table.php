<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodSidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kod_sidang', function (Blueprint $table) {
            $table->bigInteger('id_sidang', true);
            $table->integer('j_dewan')->nullable();
            $table->string('persidangan', 254)->nullable()->index('persidangan');
            $table->tinyInteger('status')->nullable();
            $table->integer('tahun')->nullable();
            $table->date('start_dt')->nullable();
            $table->date('end_dt')->nullable();
            $table->dateTime('create_dt')->nullable();
            $table->integer('create_by')->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->integer('update_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kod_sidang');
    }
}
