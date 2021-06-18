<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMenu extends Model
{
    protected $table = "kod_grpmenu";
    
    protected $primaryKey = 'grp_id';

    protected $guarded = [];

    public function tables()
    {
        return $this->hasMany('App\TableMenu');
    }
}
