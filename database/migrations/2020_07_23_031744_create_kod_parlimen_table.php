<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodParlimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kod_parlimen', function (Blueprint $table) {
            $table->string('p_kod', 5)->default('')->primary();
            $table->string('p_nama', 64)->nullable();
            $table->string('p_ahli', 100)->nullable();
            $table->tinyInteger('p_status')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kod_parlimen');
    }
}
