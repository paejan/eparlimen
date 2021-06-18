<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalanParlimen extends Model
{
    protected $table = "soalan_parlimen";

    protected $primaryKey = 'soalan_id';

    protected $keyType = 'string';

    protected $guarded = [];
    
    public $timestamps = false;

    public function tanya()
    {
        return $this->belongsTo('App\KodPertanyaan','j_tanya');
    }

    public function dewan()
    {
        return $this->belongsTo('App\KodDewan', 'j_dewan');
    }

    public function bahagian()
    {
        return $this->belongsTo('App\Bahagian', 'kod_bahagian');
    }
    
    public function kategori()
    {
        return $this->belongsTo('App\KodKategori', 'j_kategori');
    }

    public function sidang()
    {
        return $this->belongsTo('App\KodSidang','id_sidang');
    }

    public function attachment()
    {
        return $this->hasMany('App\Attachment','soalan_id');
    }

    public function sedia()
    {
        return $this->belongsTo('App\Kakitangan','sedia_oleh');
    }

    public function peg()
    {
        return $this->belongsTo('App\Kakitangan','peg_id');
    }
}
