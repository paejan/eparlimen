<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalanPukal extends Model
{
    protected $table = "soalan_pukal";

    protected $primaryKey = 'pukal_id';

    protected $keyType = 'string';

    protected $guarded = [];
    
    public $timestamps = false;

    public function dewan()
    {
        return $this->belongsTo('App\KodDewan', 'id_dewan');
    }

    public function sidang()
    {
        return $this->belongsTo('App\KodSidang', 'id_sidang');
    }

    public function detail()
    {
        return $this->hasMany('App\SoalanPukalDetail', 'pukal_id');
    }
}
