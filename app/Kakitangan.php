<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Kakitangan extends Model implements Authenticatable, Auditable
{
    use AuthenticableTrait;
    use \OwenIt\Auditing\Auditable;

    protected $table = "kakitangan";

    protected $primaryKey = 'id_kakitangan';

    protected $guarded = [];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->pass;
    }

    public function bahagian()
    {
        return $this->belongsTo('App\Bahagian', 'id_bahagian');
    }
}
