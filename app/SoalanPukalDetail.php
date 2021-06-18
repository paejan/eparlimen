<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalanPukalDetail extends Model
{
    protected $table = "soalan_pukal_detail";

    protected $primaryKey = 'sp_id';
    
    protected $guarded = [];
    
    public $timestamps = false;

    public function pukal()
    {
        return $this->belongsTo('App\SoalanPukal');
    }
}
