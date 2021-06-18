<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalanPukalDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soalan_pukal_detail', function (Blueprint $table) {
            $table->integer('sp_id', true);
            $table->string('pukal_id', 32)->index('pukal_id');
            $table->string('soalan_id', 32)->index('soalan_id');
            $table->dateTime('create_dt')->nullable();
            $table->integer('create_by')->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->integer('update_by')->nullable();
            $table->tinyInteger('is_deleted')->default(0);
            $table->dateTime('deleted_dt')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soalan_pukal_detail');
    }
}
