<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodParlimen extends Model
{
    protected $table = "kod_parlimen";

    protected $primaryKey = 'p_kod';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;
}
