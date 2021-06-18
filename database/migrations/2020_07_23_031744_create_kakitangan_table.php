<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKakitanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kakitangan', function (Blueprint $table) {
            $table->integer('id_kakitangan', true);
            $table->string('nama_kakitangan', 100);
            $table->bigInteger('no_kp_kakitangan')->nullable();
            $table->string('jawatan_kakitangan', 100)->nullable();
            $table->string('no_telefon', 15)->nullable();
            $table->string('no_hp', 32)->nullable();
            $table->integer('id_bahagian')->nullable();
            $table->integer('id_unit')->nullable()->default(0);
            $table->string('gred', 12)->nullable();
            $table->char('type', 1)->nullable();
            $table->string('userid', 20)->nullable();
            $table->string('pass', 50)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('user_level', 1)->nullable();
            $table->tinyInteger('is_semak')->nullable()->default(0);
            $table->tinyInteger('is_lulus')->nullable()->default(0);
            $table->tinyInteger('is_delete')->nullable()->default(0);
            $table->dateTime('is_deletedt')->nullable();
            $table->string('is_deleteby', 32)->nullable();
            $table->dateTime('fldupdate_dt')->nullable();
            $table->integer('fldupdate_by')->nullable();
            $table->string('status', 1)->nullable()->default('0');
            $table->index(['nama_kakitangan', 'no_kp_kakitangan'], 'nama_kakitangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kakitangan');
    }
}
