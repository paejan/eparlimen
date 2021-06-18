<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalanSemakan extends Model
{
    protected $table = "soalan_semakan";

    protected $primaryKey = 'semakan_id';
    
    protected $guarded = [];
    
    public $timestamps = false;
}
