<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableLaporanTugasan extends Model
{
    protected $table = "tbllaporantugasan";
    
    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

    public function sidang()
    {
        return $this->belongsTo('App\KodSidang', 'id_sidang');
    }
}
