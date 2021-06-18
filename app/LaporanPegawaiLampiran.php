<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanPegawaiLampiran extends Model
{
    protected $table = "laporan_p_lampiran1";
    
    protected $primaryKey = 'lp_id';

    protected $guarded = [];

    public $timestamps = false;
}
