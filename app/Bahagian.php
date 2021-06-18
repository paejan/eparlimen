<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahagian extends Model
{
    protected $table = "kod_bahagian";

    protected $primaryKey = 'id_bahagian';

    protected $guarded = [];

    public $timestamps = false;

    public function kakitangans()
    {
        return $this->hasMany('App\Kakitangan');
    }

    public function parlimens()
    {
        return $this->hasMany('App\SoalanParlimen','id_bahagian');
    }
}
