<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbllaporantugasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbllaporantugasan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('jad_id');
            $table->integer('id_sidang')->default(0);
            $table->string('dewan', 20)->nullable();
            $table->date('tarikh')->nullable();
            $table->string('hari', 15)->nullable();
            $table->string('pegawai1', 60)->nullable();
            $table->string('pegawai1_unit', 60)->nullable();
            $table->string('pegawai1_bhgn', 60)->nullable();
            $table->string('pegawai1_telpej', 11)->nullable();
            $table->string('pegawai1_telhp', 11)->nullable();
            $table->string('pegawai2', 60)->nullable();
            $table->string('pegawai2_unit', 60)->nullable();
            $table->string('pegawai2_bhgn', 60)->nullable();
            $table->string('pegawai2_telpej', 11)->nullable();
            $table->string('pegawai2_telhp', 11)->nullable();
            $table->string('pegawai3', 64)->nullable();
            $table->string('soalan1', 10)->nullable();
            $table->string('soalan2', 10)->nullable();
            $table->string('soalan3', 10)->nullable();
            $table->string('soalan3a', 10)->nullable();
            $table->string('soalan4', 10)->nullable();
            $table->string('soalan4a', 10)->nullable();
            $table->string('soalan5', 10)->nullable();
            $table->string('soalan6', 10)->nullable();
            $table->text('soalan7')->nullable();
            $table->string('soalan8_1')->nullable();
            $table->string('soalan8_2')->nullable();
            $table->string('soalan8_3')->nullable();
            $table->string('soalan8_4')->nullable();
            $table->string('soalan8_5')->nullable();
            $table->string('soalan9', 10)->nullable();
            $table->string('soalan10_1', 20)->nullable();
            $table->string('soalan10_1a')->nullable();
            $table->string('soalan10_2', 20)->nullable();
            $table->string('soalan10_2a')->nullable();
            $table->string('soalan10_3', 20)->nullable();
            $table->string('soalan10_3a')->nullable();
            $table->string('soalan10_4', 20)->nullable();
            $table->string('soalan10_4a')->nullable();
            $table->string('soalan10_5', 20)->nullable();
            $table->string('soalan10_5a')->nullable();
            $table->string('soalan11_1')->nullable();
            $table->string('soalan11_2')->nullable();
            $table->string('soalan11_3')->nullable();
            $table->string('soalan11_4')->nullable();
            $table->string('soalan11_5')->nullable();
            $table->string('dewan_tangguh', 10)->nullable();
            $table->string('sidang_sambung', 10)->nullable();
            $table->string('reporter_nama', 128)->nullable();
            $table->string('reporter_nama2', 128)->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->index(['jad_id', 'id_sidang'], 'jad_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbllaporantugasan');
    }
}
