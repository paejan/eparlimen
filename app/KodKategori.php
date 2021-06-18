<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodKategori extends Model
{
    protected $table = "kod_kategori";

    protected $primaryKey = 'id_kategori';

    protected $guarded = [];

    public $timestamps = false;

    public function parlimens()
    {
        return $this->hasMany('App\SoalanParlimen','id_kategori');
    }
}
