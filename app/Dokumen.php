<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = "doc_rujukan";

    protected $primaryKey = 'doc_id';

    protected $keyType = 'string';

    protected $guarded = [];

    public $timestamps = false;
}
