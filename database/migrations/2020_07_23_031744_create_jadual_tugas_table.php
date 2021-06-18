<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadualTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadual_tugas', function (Blueprint $table) {
            $table->bigInteger('jad_id', true);
            $table->bigInteger('id_sidang');
            $table->smallInteger('num_week')->nullable();
            $table->date('jad_tkh')->nullable();
            $table->string('dewan', 32)->nullable();
            $table->tinyInteger('jad_status')->nullable();
            $table->integer('urusetia')->nullable();
            $table->integer('pemandu')->nullable();
            $table->integer('pegawai1')->nullable();
            $table->integer('pegawai2')->nullable();
            $table->integer('pegawai3')->nullable();
            $table->text('catatan')->nullable();
            $table->dateTime('create_dt')->nullable();
            $table->integer('create_by')->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->integer('update_by')->nullable();
            $table->tinyInteger('is_deleted')->nullable()->default(0);
            $table->index(['id_sidang', 'jad_tkh'], 'id_sidang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadual_tugas');
    }
}
