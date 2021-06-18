<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchTable extends Model
{
    protected $table = "search_table";

    protected $primaryKey = null;
    
    public $incrementing = false;
}
