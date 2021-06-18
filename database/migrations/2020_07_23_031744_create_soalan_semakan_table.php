<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalanSemakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soalan_semakan', function (Blueprint $table) {
            $table->integer('semakan_id', true);
            $table->string('soalan_id', 32)->nullable();
            $table->string('semakan_jenis', 12)->nullable();
            $table->dateTime('tkh_hantar')->nullable();
            $table->dateTime('tkh_kemaskini')->nullable();
            $table->text('kenyataan')->nullable();
            $table->tinyInteger('semakan_status')->nullable()->default(0);
            $table->string('semakan_oleh', 32)->nullable();
            $table->string('semakan_ip', 24)->nullable();
            $table->dateTime('tkh_serah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soalan_semakan');
    }
}
