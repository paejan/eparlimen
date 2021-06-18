<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPLampiran1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_p_lampiran1', function (Blueprint $table) {
            $table->bigInteger('lp_id', true);
            $table->bigInteger('id_laporan');
            $table->bigInteger('oleh_id')->default(0);
            $table->string('ahli_parlimen', 128)->nullable();
            $table->string('kawasan_parlimen', 128)->nullable();
            $table->date('tarikh')->nullable();
            $table->string('masa', 20)->nullable();
            $table->text('soalan')->nullable();
            $table->text('tindakan')->nullable();
            $table->dateTime('create_dt');
            $table->integer('create_by');
            $table->dateTime('update_dt');
            $table->integer('update_by');
            $table->string('type', 1)->default('L');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_p_lampiran1');
    }
}
