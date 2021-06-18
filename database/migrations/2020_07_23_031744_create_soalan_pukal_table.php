<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalanPukalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soalan_pukal', function (Blueprint $table) {
            $table->string('pukal_id', 32)->primary();
            $table->smallInteger('id_dewan')->index('id_dewan');
            $table->integer('id_sidang')->index('id_sidang');
            $table->date('tarikh_soalan');
            $table->date('tarikh_sasaran')->nullable();
            $table->string('menteri', 32)->nullable();
            $table->date('tkh_dedline')->nullable();
            $table->date('tkh_jwb_parlimen')->nullable();
            $table->tinyInteger('is_deleted')->nullable()->default(0);
            $table->dateTime('create_dt')->nullable();
            $table->integer('create_by')->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->integer('update_by')->nullable();
            $table->tinyInteger('pukal_status')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soalan_pukal');
    }
}
