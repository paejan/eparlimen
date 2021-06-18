<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableMenuUser extends Model
{
    protected $table = "tbl_menu_user";
    
    protected $primaryKey = 'menu_uid';

    protected $guarded = [];

    public $timestamps = false;
}
