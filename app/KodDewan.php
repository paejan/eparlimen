<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodDewan extends Model
{
    protected $table = "kod_dewan";

    protected $primaryKey = 'j_dewan';

    protected $guarded = [];

    public function sidangs()
    {
        return $this->hasMany('App\KodSidang');
    }

    public function soalans()
    {
        return $this->hasMany('App\SoalanPukal');
    }

    public function parlimens()
    {
        return $this->hasMany('App\SoalanParlimen');
    }
}
