<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menu', function (Blueprint $table) {
            $table->integer('menu_id', true);
            $table->integer('grp_id')->default(0)->index('grp_id');
            $table->string('menu_name', 64)->nullable();
            $table->string('menu_link', 128)->nullable();
            $table->tinyInteger('menu_status')->nullable();
            $table->smallInteger('sort')->nullable();
            $table->tinyInteger('is_admin')->default(0);
            $table->tinyInteger('is_urusetia')->default(0);
            $table->tinyInteger('is_bahagian')->default(0);
            $table->tinyInteger('is_pegawai')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_menu');
    }
}
