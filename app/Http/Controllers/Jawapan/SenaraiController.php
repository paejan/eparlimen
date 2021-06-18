<?php

namespace App\Http\Controllers\Jawapan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TableMenuUser;
use App\AhliParlimen;
use App\Kakitangan;
use App\Attachment;
use App\SoalanSemakan;
use App\SoalanParlimen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SenaraiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->all());
        $type = Auth::user()->type;

        //Sidang
        $sidang = DB::table('kod_sidang')
                    ->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')
                    ->where('kod_sidang.status',0);
        if(!empty($request->lj_dewan)){ $sidang->where('kod_sidang.j_dewan',$request->lj_dewan); }

        $sidang = $sidang->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();

        //Kategori
        $kategori = DB::table('kod_kategori')->join('soalan_parlimen','kod_kategori.id_kategori','soalan_parlimen.j_kategori');

        if(!empty($request->lj_tanya)){ $kategori->where('j_tanya',$request->lj_tanya); }
        if(!empty($request->lj_dewan)){ $kategori->where('j_dewan',$request->lj_dewan); }
        if(!empty($request->ljid_sidang)){ $kategori->where('id_sidang',$request->ljid_sidang); }
        
        $kategori = $kategori->groupBy('kod_kategori.id_kategori')->distinct()->get();

        //Soalan
        $soalan = SoalanParlimen::where('soalan_id','<>','')->where('type_soalan','<>','B')->where('is_semak',0)->where('is_sah',0)->where('is_deleted',0)->where('status',2);

        if($type == 'B' || $type == 'P'){ $soalan->where('kod_bahagian',Auth::user()->id_bahagian); }
        if(!empty($request->l_cari)){ $soalan->where('soalan','LIKE','%'.$request->l_cari.'%'); }
        if(!empty($request->lj_tanya)){ $soalan->where('j_tanya',$request->lj_tanya); }
        if(!empty($request->lj_dewan)){ $soalan->where('j_dewan',$request->lj_dewan); }
        if(!empty($request->ljid_sidang)){ $soalan->where('id_sidang',$request->ljid_sidang); }
        if(!empty($request->lj_kategori)){ $soalan->where('j_kategori',$request->lj_kategori); }

        $soalan = $soalan->orderBy('tkh_soalan','DESC')->orderBy('no_soalan','ASC')->paginate(10);

        // dd($kategori);

        return view('jawapan/senarai/index',compact('sidang','kategori','soalan'));
    }

    public function cetak($id)
    {
        // dd($id);

        $soalan = SoalanParlimen::find($id);

        $sedia = DB::table('kakitangan')->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan',$soalan->sedia_oleh)->first();

        $semak = DB::table('kakitangan')->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan',$soalan->semak_oleh)->first();
        
        $lulus = DB::table('kakitangan')->join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan',$soalan->lulus_oleh)->first();
        
        // dd($sedia);

        return view('jawapan/cetak', compact('soalan','sedia','semak','lulus'));
    }

    public function edit($id)
    {
        // dd($id);
        $usermenu = TableMenuUser::where('menu_id',19)->where('id_kakitangan',Auth::user()->id_kakitangan)->first();

        $title="Maklumat Soalan dan Jawapan";

        $soalan = SoalanParlimen::find($id);

        if($soalan->j_dewan == 1){
            $ahli = DB::table('ahliparlimen')->join('kod_parlimen','ahliparlimen.kod_kaw_ap','kod_parlimen.p_kod')->where('ahliparlimen.id_ap',$soalan->s_oleh)->first();
        } else {
            $ahli = AhliParlimen::where('id_ap',$soalan->s_oleh)->first();
        }

        $attach = Attachment::where('soalan_id',$id)->get();

        $semak = Kakitangan::whereIn('id_bahagian',[1,33,$soalan->kod_bahagian])->where('is_semak',1)->where('is_delete',0)->get();

        $komen = SoalanSemakan::where('semakan_jenis','SEMAK')->where('soalan_id',$id)->get();

        $lulus = Kakitangan::whereIn('id_bahagian',[1,33,$soalan->kod_bahagian])->where('is_lulus',1)->where('is_delete',0)->get();
        // dd($soalan);
        return view('jawapan/senarai/form',compact('usermenu','title','soalan','ahli','attach','semak','komen','lulus'));
    }

    public function store(Request $request,$type)
    {
        // dd($request->all());
        $user = Auth::user()->id_kakitangan;
        
        if($type == 'SERAH_SEMULA') {
            // dd('yey');
            $soalan = SoalanParlimen::where('soalan_id',$request->soalan_id)->update(['status'=>1,'is_semak'=>0]);
            
        } else if($type == 'HAPUS') {
            // dd('hapus');
            
            $soalan = SoalanParlimen::where('soalan_id',$request->soalan_id)->update(['is_deleted'=>1,'deleted_dt'=>now(),'deleted_by'=>$user]);
        } else if ($type == 'SEMAK'){
            // dd('semak');

            $soalan_semak = new SoalanSemakan();
            $soalan_semak->soalan_id = $request->soalan_id;
            $soalan_semak->semakan_jenis = 'SEMAK';
            $soalan_semak->tkh_hantar = now();

            $soalan_semak->save();

            if($soalan_semak){
                $soalan = SoalanParlimen::where('soalan_id',$request->soalan_id)->update(['status'=>2,'is_semak'=>1,'semak_oleh'=>$request->semak_oleh,'lulus_oleh'=>$request->lulus_oleh]);
            }
        }

        if($soalan){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }
}
