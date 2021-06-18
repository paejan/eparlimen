<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AhliParlimen extends Model
{
    protected $table = "ahliparlimen";

    protected $primaryKey = 'id_ap';

    protected $guarded = [];

    public $timestamps = false;

    public function kod()
    {
        return $this->belongsTo('App\KodParlimen', 'kod_kaw_ap');
    }

}
