<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditrailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditrail', function (Blueprint $table) {
            $table->bigInteger('aid', true);
            $table->integer('id_user')->index('id_user');
            $table->string('log_user', 32)->nullable();
            $table->string('ip', 32)->nullable();
            $table->text('remarks')->nullable();
            $table->dateTime('trans_date')->nullable();
            $table->string('actions', 64)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditrail');
    }
}
