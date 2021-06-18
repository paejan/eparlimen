<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhliparlimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahliparlimen', function (Blueprint $table) {
            $table->integer('id_ap', true);
            $table->string('nama_ap', 100);
            $table->string('no_kp_ap', 14)->nullable();
            $table->string('kod_kaw_ap', 10)->nullable();
            $table->string('kawasan_ap', 128)->nullable();
            $table->tinyInteger('status_ap')->nullable()->default(0);
            $table->string('gambar', 128)->nullable();
            $table->string('type', 5)->nullable();
            $table->string('tempoh', 50)->nullable();
            $table->date('tkh_mula')->nullable();
            $table->date('tkh_tamat')->nullable();
            $table->string('parti', 20)->nullable();
            $table->tinyInteger('is_deleted')->nullable()->default(0);
            $table->string('delete_by', 32)->nullable();
            $table->dateTime('delete_dt')->nullable();
            $table->index(['nama_ap', 'no_kp_ap'], 'nama_ap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ahliparlimen');
    }
}
