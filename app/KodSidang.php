<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodSidang extends Model
{
    protected $table = "kod_sidang";

    protected $primaryKey = 'id_sidang';

    protected $guarded = [];

    public $timestamps = false;

    public function dewan()
    {
        return $this->belongsTo('App\KodDewan', 'j_dewan');
    }
}
