<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocRujukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_rujukan', function (Blueprint $table) {
            $table->string('doc_id', 32)->default('')->primary();
            $table->string('dokumen_tajuk')->default('');
            $table->text('dokumen')->nullable();
            $table->string('doc_status', 10)->nullable();
            $table->string('doc_type', 5)->nullable()->default('DOC');
            $table->date('tarikh')->nullable();
            $table->dateTime('create_dt')->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->dateTime('search_updm_dt')->nullable();
            $table->tinyInteger('is_deleted')->nullable()->default(0);
            $table->dateTime('delete_dt')->nullable();
            $table->string('delete_by', 32)->nullable();
            $table->tinyInteger('is_doc')->nullable()->default(0);
            $table->string('file_name')->nullable();
            $table->string('file_type', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_rujukan');
    }
}
