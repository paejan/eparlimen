<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KodDewan;
use App\KodSidang;
use App\SoalanParlimen;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $dewan = KodDewan::get();

        $sidang = KodSidang::where('status',0);

        if(!empty($request->j_dewan)){ $sidang->where('j_dewan',$request->j_dewan); }

        $sidang = $sidang->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();

        if(!empty($request->id_sidang)){
            $tarikh = KodSidang::find($request->id_sidang);
        } else {
            $tarikh = '';
        }

        // dd($tarikh);

        return view('laporan/lapor/index',compact('dewan','sidang','tarikh'));
    }

    public function view($mula,$tamat,$dewan,$sidang)
    {
        // dd($mula);
        $sqlks = DB::table('kod_sidang')
                    ->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')
                    ->where('kod_sidang.status',0)
                    ->where('kod_sidang.id_sidang',$sidang)
                    ->first();

        // dd($dewan);
        $j_dewan = $sqlks->j_dewan;
        $dewan = $sqlks->dewan;        

        $soalan = SoalanParlimen::where('soalan_id','<>','')->where('id_sidang',$sidang);
        
        if(!empty($mula) && !empty($tamat)){
            $start = $mula;
            $end = $tamat;
            $soalan->whereBetween('tkh_jwb_parlimen',array($mula,$tamat));
        } else if(!empty($mula) && empty($tamat)){
            $start = $mula;
            $end = '';
            $soalan->where('tkh_jwb_parlimen','>=',$mula);
        } else if(empty($mula) && !empty($tamat)){
            $start = '';
            $end = $tamat;
            $soalan->where('tkh_jwb_parlimen','<=',$tamat);
        } else {
            $start = '';
            $end = '';
        }

        $soalan = $soalan->orderBy('tkh_jwb_parlimen')->get();

        $persidangan = KodSidang::find($sidang);

        // dd($soalan);

        return view('laporan/lapor/cetak', compact('j_dewan','dewan','sidang','start','end','persidangan','soalan'));
    }
}
