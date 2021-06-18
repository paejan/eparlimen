<?php

namespace App\Http\Controllers\Jawapan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TableMenuUser;
use App\AhliParlimen;
use App\Kakitangan;
use App\Attachment;
use App\KodKategori;
use App\KodSidang;
use App\SoalanSemakan;
use App\SoalanParlimen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SemakanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->all());

        //Sidang
        $sidang = KodSidang::join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('kod_sidang.status',0);
        if(!empty($request->lj_dewan)){ $sidang->where('kod_sidang.j_dewan',$request->lj_dewan); }

        $sidang = $sidang->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();

        //Kategori
        $kategori = KodKategori::join('soalan_parlimen','kod_kategori.id_kategori','soalan_parlimen.j_kategori');

        if(!empty($request->lj_tanya)){ $kategori->where('j_tanya',$request->lj_tanya); }
        if(!empty($request->lj_dewan)){ $kategori->where('j_dewan',$request->lj_dewan); }
        if(!empty($request->ljid_sidang)){ $kategori->where('id_sidang',$request->ljid_sidang); }
        
        $kategori = $kategori->groupBy('kod_kategori.id_kategori')->distinct()->get();

        //Soalan
        $soalan = SoalanParlimen::join('soalan_semakan','soalan_parlimen.soalan_id','soalan_semakan.soalan_id')->where('soalan_parlimen.status',2)->where('is_deleted',0);
                    
        if(!empty($request->l_cari)){ $soalan->where('soalan_parlimen.soalan','LIKE','%'.$request->l_cari.'%'); }
        if(!empty($request->lj_tanya)){ $soalan->where('soalan_parlimen.j_tanya',$request->lj_tanya); }
        if(!empty($request->lj_dewan)){ $soalan->where('soalan_parlimen.j_dewan',$request->lj_dewan); }
        if(!empty($request->ljid_sidang)){ $soalan->where('soalan_parlimen.id_sidang',$request->ljid_sidang); }
        if(!empty($request->lj_kategori)){ $soalan->where('soalan_parlimen.j_kategori',$request->lj_kategori); }
        
        if(Auth::user()->type == 'A'){ $soalan->where('soalan_semakan.semakan_oleh',Auth::user()->id_kakitangan); }

        $soalan = $soalan->orderBy('tkh_soalan','DESC')->paginate(10);

        // dd($soalan);

        return view('jawapan/semakan/index',compact('sidang','kategori','soalan'));
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
        $usermenu = TableMenuUser::where('menu_id',29)->where('id_kakitangan',Auth::user()->id_kakitangan)->first();

        $title="Pengesahan Oleh Penyemak Jawapan";

        $soalan = SoalanParlimen::find($id);

        if($soalan->j_dewan == 1){
            $ahli = DB::table('ahliparlimen')->join('kod_parlimen','ahliparlimen.kod_kaw_ap','kod_parlimen.p_kod')->where('ahliparlimen.id_ap',$soalan->s_oleh)->first();
        } else {
            $ahli = AhliParlimen::where('id_ap',$soalan->s_oleh)->first();
        }

        $attach = Attachment::where('soalan_id',$id)->get();

        $semak = Kakitangan::whereIn('id_bahagian',[1,33,$soalan->kod_bahagian])->where('is_semak',1)->where('is_delete',0)->get();

        $komen = SoalanSemakan::where('semakan_jenis','SEMAK')->whereNotNull('tkh_kemaskini')->whereNotNull('kenyataan')->where('soalan_id',$id)->get();

        $soal_semak = SoalanSemakan::where('semakan_jenis','SEMAK')->where('semakan_status',0)->where('soalan_id',$id)->first();
        // dd($soal_semak);
        if(empty($soal_semak->tkh_buka)){
            $sql = SoalanSemakan::where('semakan_status',0)->where('soalan_id',$id)->update(['tkh_buka'=>now()]);
        }
        
        $soal_semak = SoalanSemakan::where('semakan_jenis','SEMAK')->where('semakan_status',0)->where('soalan_id',$id)->first();
        // dd($ahli);
        return view('jawapan/semakan/form',compact('usermenu','title','soalan','ahli','attach','semak','komen','soal_semak'));
    }

    public function store(Request $request, $type)
    {
        // dd($request->ip());
        // dd($request->all());

        if($type == 'UPDATE'){
            // dd('up');

            $data = array(
                'kenyataan'=>$request->jawapan_semakan_text,
                'tkh_kemaskini'=>now(),
                'semakan_oleh'=>Auth::user()->id_kakitangan,
                'semakan_ip'=>$request->ip(),
            );

            $soalan = SoalanSemakan::where('semakan_id',$request->semakan_id)->update($data);

            if($soalan){
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }

        } else if($type == 'BACK'){
            // dd('back');

            $data = array(
                'kenyataan'=>$request->jawapan_semakan_text,
                'tkh_kemaskini'=>now(),
                'semakan_oleh'=>Auth::user()->id_kakitangan,
                'semakan_ip'=>$request->ip(),
                'semakan_status'=>1,
            );

            $soalan = SoalanSemakan::where('semakan_id',$request->semakan_id)->update($data);

            if($soalan){
                return response()->json('OK');

                SoalanParlimen::where('soalan_id',$request->soalan_id)->update(['status'=>1,'is_semak'=>0]);
            } else {
                return response()->json('ERR');
            }
        } else if($type == 'SAH'){
            // dd('sah');

            $data = array(
                'kenyataan'=>$request->jawapan_semakan_text,
                'tkh_kemaskini'=>now(),
                'semakan_oleh'=>Auth::user()->id_kakitangan,
                'semakan_ip'=>$request->ip(),
                'tkh_serah'=>now(),
            );

            $soalan = SoalanSemakan::where('semakan_id',$request->semakan_id)->update($data);

            if($soalan){
                $soalan = new SoalanSemakan();

                $soalan->soalan_id = $request->soalan_id;
                $soalan->semakan_jenis = 'SAH';
                $soalan->tkh_hantar = now();

                $soalan->save();

                SoalanParlimen::where('soalan_id',$request->soalan_id)->update(['status'=>2,'is_semak'=>9]);
                
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        }
    }
}
