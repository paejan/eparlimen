<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodPertanyaan extends Model
{
    protected $table = "kod_pertanyaan";

    protected $primaryKey = 'j_tanya';

    protected $guarded = [];

    public function parlimens()
    {
        return $this->hasMany('App\SoalanParlimen');
    }
}
