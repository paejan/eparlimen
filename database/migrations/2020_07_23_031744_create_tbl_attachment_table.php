<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_attachment', function (Blueprint $table) {
            $table->string('soalan_id', 32)->nullable()->index('soalan_id');
            $table->string('file_tajuk', 128)->nullable();
            $table->string('file_name')->nullable()->default('');
            $table->string('file_type', 5)->nullable()->default('');
            $table->dateTime('update_dt')->nullable();
            $table->dateTime('search_upd_dt')->nullable();
            $table->bigInteger('attach_id', true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_attachment');
    }
}
