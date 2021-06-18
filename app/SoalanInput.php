<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalanInput extends Model
{
    protected $table = "soalan_input";

    protected $primaryKey = 'input_id';

    protected $guarded = [];

    public $timestamps = false;

    public function bahagian()
    {
        return $this->belongsTo('App\Bahagian', 'bahagian_id');
    }

}
