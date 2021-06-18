<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadualTugas extends Model
{
    protected $table = "jadual_tugas";

    protected $primaryKey = 'jad_id';

    protected $guarded = [];

    public $timestamps = false;

    public function us()
    {
        return $this->belongsTo('App\Kakitangan', 'urusetia');
    }

    public function p1()
    {
        return $this->belongsTo('App\Kakitangan', 'pegawai1');
    }

    public function p2()
    {
        return $this->belongsTo('App\Kakitangan', 'pegawai2');
    }

    public function p3()
    {
        return $this->belongsTo('App\Kakitangan', 'pegawai3');
    }

    public function pm()
    {
        return $this->belongsTo('App\Kakitangan', 'pemandu');
    }

    public function sidang()
    {
        return $this->belongsTo('App\KodSidang', 'id_sidang');
    }

    public function laporan()
    {
        return $this->hasOne('App\TableLaporanTugasan', 'jad_id');
    }
    
    public function bhgp1()
    {
        return $this->belongsTo('App\Bahagian', 'pegawai1_bhg');
    }
    
    public function bhgp2()
    {
        return $this->belongsTo('App\Bahagian', 'pegawai2_bhg');
    }
    
    public function bhgp3()
    {
        return $this->belongsTo('App\Bahagian', 'pegawai3_bhg');
    }
}
