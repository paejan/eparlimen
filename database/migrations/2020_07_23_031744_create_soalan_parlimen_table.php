<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalanParlimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soalan_parlimen', function (Blueprint $table) {
            $table->string('soalan_id', 32)->default('')->primary();
            $table->string('no_soalan', 10)->nullable();
            $table->bigInteger('id_sidang')->default(0);
            $table->date('tkh_soalan')->nullable();
            $table->date('tkh_sasaran')->nullable();
            $table->date('tkh_agihan')->nullable();
            $table->date('tkh_dikembalikan')->nullable();
            $table->date('tkh_dedline')->nullable();
            $table->date('tkh_jwb_parlimen')->nullable();
            $table->integer('j_tanya')->nullable()->default(0);
            $table->string('j_tanya_det', 12)->nullable();
            $table->integer('j_dewan')->nullable()->default(0);
            $table->integer('j_kategori')->nullable()->default(0);
            $table->integer('kod_bahagian')->nullable()->default(0);
            $table->integer('kod_unit')->nullable();
            $table->integer('peg_id')->nullable();
            $table->string('parti')->nullable();
            $table->integer('s_oleh')->nullable()->default(0);
            $table->string('soalan_oleh', 128)->nullable();
            $table->string('soalan_kawasan', 128)->nullable();
            $table->string('menteri', 64)->nullable();
            $table->text('soalan')->nullable();
            $table->text('jawapan')->nullable();
            $table->date('tkh_jawab_soalan')->nullable();
            $table->text('jawapan_menteri')->nullable();
            $table->integer('sedia_oleh')->nullable();
            $table->string('sedia_nama', 128)->nullable();
            $table->string('sedia_jawatan', 128)->nullable();
            $table->string('sedia_bahagian', 128)->nullable();
            $table->string('sedia_tel', 15)->nullable();
            $table->integer('semak_oleh')->nullable();
            $table->string('semak_nama', 128)->nullable();
            $table->string('semak_jawatan', 128)->nullable();
            $table->string('semak_bahagian', 128)->nullable();
            $table->string('semak_tel', 15)->nullable();
            $table->integer('lulus_oleh')->nullable();
            $table->string('lulus_nama', 128)->nullable();
            $table->string('lulus_jawatan', 128)->nullable();
            $table->string('lulus_bahagian', 128)->nullable();
            $table->string('lulus_tel', 15)->nullable();
            $table->text('maklumat_tambah')->nullable();
            $table->string('attach_1', 128)->nullable();
            $table->string('attach_2', 128)->nullable();
            $table->tinyInteger('is_semak')->nullable()->default(0);
            $table->tinyInteger('is_sah')->nullable()->default(0);
            $table->dateTime('create_dt')->nullable();
            $table->integer('create_by')->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->integer('update_by')->nullable();
            $table->tinyInteger('is_deleted')->nullable();
            $table->dateTime('deleted_dt')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->dateTime('search_upd_dt')->nullable();
            $table->dateTime('search_updj_dt')->nullable();
            $table->dateTime('search_updm_dt')->nullable();
            $table->index(['j_tanya', 'j_dewan', 'j_kategori', 'kod_bahagian'], 'j_tanya');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soalan_parlimen');
    }
}
