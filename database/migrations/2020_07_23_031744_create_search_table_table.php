<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_table', function (Blueprint $table) {
            $table->string('type', 10)->nullable();
            $table->string('doc_title')->nullable()->index('doc_title');
            $table->text('content')->nullable();
            $table->string('link', 128)->nullable()->index('link');
            $table->string('ref_id', 32)->nullable()->index('ref_id');
            $table->dateTime('update_dt')->nullable();
            $table->integer('kod_bahagian')->nullable();
            $table->integer('id_sidang')->nullable();
            $table->integer('j_kategori')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_table');
    }
}
