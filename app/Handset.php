<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handset extends Model
{
    protected $table = "doc_handset";

    protected $primaryKey = 'doc_id';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;
}
