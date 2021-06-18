<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMenuUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menu_user', function (Blueprint $table) {
            $table->bigInteger('menu_uid', true);
            $table->integer('menu_id');
            $table->integer('id_kakitangan');
            $table->tinyInteger('is_add')->nullable();
            $table->tinyInteger('is_upd')->nullable();
            $table->tinyInteger('is_del')->nullable();
            $table->index(['id_kakitangan', 'menu_id'], 'id_kakitangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_menu_user');
    }
}
