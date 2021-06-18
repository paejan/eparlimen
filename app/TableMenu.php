<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableMenu extends Model
{
    protected $table = "tbl_menu";
    
    protected $primaryKey = 'menu_id';

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo('App\GroupMenu', 'grp_id');
    }
}
