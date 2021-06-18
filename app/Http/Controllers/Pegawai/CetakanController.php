<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KodDewan;
use App\KodSidang;
use App\JadualTugas;

class CetakanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $dewan = KodDewan::get();

        $sidang = KodSidang::where('status',0);
        if(!empty($request->j_dewan)){
            $sidang->where('j_dewan',$request->j_dewan);
        }

        $sidang = $sidang->orderBy('tahun', 'DESC')->orderBy('start_dt', 'DESC')->get();

        if(!empty($request->id_sidang)){
            $date = KodSidang::where('id_sidang',$request->id_sidang)->first();
        } else {
            $date = '';
        }

        return view('pegawai/cetak/index',compact('dewan','sidang','date'));
    }

    public function view(Request $request)
    {
        // dd($request->all());
        if($request->pro == 'BLN') {
            $rs = JadualTugas::where('jad_tkh','<>','0000-00-00')->whereMonth('jad_tkh',$request->sel_mth)->whereYear('jad_tkh',$request->sel_year)->orderBy('jad_tkh')->get();
            // dd($rs);
            $rs_si = KodSidang::join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('kod_sidang.id_sidang',$request->id_sidang)->first();
            
            // dd($rs_si);
            
            return view('pegawai/cetak/cetak',compact('rs','rs_si'));
        } else {
            $rs = JadualTugas::where('jad_tkh','<>','0000-00-00');
    
            if(!empty($request->mula) && !empty($request->hingga)){
                $rs->where(function($query) use ($request) {
                    $query->whereBetween('jad_tkh',[$request->mula,$request->hingga]);
                });
            } else if(!empty($mula) && empty($hingga)){
                $rs->where('jad_tkh', '>=', $request->mula);
            }
    
            $rs = $rs->orderBy('jad_tkh')->get();
    
            $rs_si = KodSidang::join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('kod_sidang.id_sidang',$request->id_sidang)->first();
            // dd($rs);
            return view('pegawai/cetak/cetak',compact('rs','rs_si'));
        }
    }
}
