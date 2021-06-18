<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodKategoriSub extends Model
{
    protected $table = "kod_kategori_sub";

    protected $primaryKey = 'idsub_kategori';

    protected $guarded = [];

    public $timestamps = false;
}
