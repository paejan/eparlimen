<?php

namespace App\Http\Controllers\Soalan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TableMenuUser;
use App\SoalanParlimen;
use App\Kakitangan;
use App\AhliParlimen;
use App\Bahagian;
use App\KodSidang;
use App\KodKategori;
use App\KodKategoriSub;
use App\KodPertanyaan;
use Illuminate\Support\Facades\Auth;

class SenaraiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->except('page'));
        $user = Auth::user()->id_kakitangan;
        $type = Auth::user()->type;
        // dd($type);
        $usermenu = TableMenuUser::where('menu_id',21)->where('id_kakitangan', $user)->first();
        if(empty($request->except('page'))){
            // dd('empty');

            $sidang = KodSidang::join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')
                        ->where('kod_sidang.status',0)
                        ->orderBy('tahun','DESC')
                        ->orderBy('start_dt','DESC')
                        ->get();
    
            $kategori = Bahagian::join('soalan_parlimen','kod_bahagian.id_bahagian','soalan_parlimen.kod_bahagian')
                            ->groupBy('kod_bahagian.id_bahagian')
                            ->distinct()
                            ->get();
    
            
            $soalan = SoalanParlimen::where('soalan_id','<>','')->where('is_deleted',0)->orderBy('tkh_soalan','DESC')->paginate(10);

            // dd($pegawai);
        } else {
            //Sidang
            $row = KodSidang::join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('kod_sidang.status',0);

            if(!empty($request->lj_dewan)){ $row->where('kod_sidang.j_dewan',$request->lj_dewan); }

            $row->orderBy('tahun','DESC')->orderBy('start_dt','DESC');
            $sidang = $row->get();

            //Kategori
            $data = Bahagian::join('soalan_parlimen','kod_bahagian.id_bahagian','soalan_parlimen.kod_bahagian');

            if(!empty($request->lj_tanya)){ $data->where('j_tanya',$request->lj_tanya); }
            if(!empty($request->lj_dewan)){ $data->where('j_dewan',$request->lj_dewan); }
            if(!empty($request->ljid_sidang)){ $data->where('id_sidang',$request->ljid_sidang); }

            $data->groupBy('kod_bahagian.id_bahagian')->distinct();
            $kategori = $data->get();

            //Soalan
            $datas = SoalanParlimen::where('soalan_id','<>','')->where('is_deleted',0);

            if($type == 'B'){ $datas->where('kod_bahagian',Auth::user()->id_bahagian); }
            if(!empty($request->l_cari)){ $datas->where('soalan','LIKE','%'.$request->l_cari.'%'); }
            if(!empty($request->lj_tanya)){ $datas->where('j_tanya',$request->lj_tanya); }
            if(!empty($request->lj_dewan)){ $datas->where('j_dewan',$request->lj_dewan); }
            if(!empty($request->ljid_sidang)){ $datas->where('id_sidang',$request->ljid_sidang); }
            if(!empty($request->lj_kategori)){ $datas->where('kod_bahagian',$request->lj_kategori); }
            if(!empty($request->lj_status)){ 
                if($request->lj_status == '9'){
                    $datas->where('status',0);
                } else {
                    $datas->where('status',$request->lj_status);
                }
            }
            
            $datas->orderBy('tkh_soalan','DESC');
            $soalan = $datas->paginate(10);
        }
        
        // dd($pegawai);
        return view('soalan/senarai/index', compact('usermenu','sidang','kategori','soalan'));
    }

    public function edit($id,$dewan)
    {
        // dd($dewan);
        $usermenu = TableMenuUser::where('menu_id',21)->where('id_kakitangan', Auth::user()->id_kakitangan)->first();

        $tanya = KodPertanyaan::get();
    
        $kategori = KodKategori::where('status',0)->orderBy('kod_kategori')->get();

        $sub = KodKategoriSub::where('status',0)->get();
        // dd($sub);
        $bahagian = Bahagian::where('status',0)->get();

        $soalan = SoalanParlimen::find($id);
        // dd($soalan);
        $kakitangan = Kakitangan::whereIn('type',['B','U'])->where('is_delete',0)->where('id_bahagian',$soalan->kod_bahagian)->orderBy('nama_kakitangan')->get();

        if($dewan == '1'){
            $sidang = KodSidang::where('status',0)->where('j_dewan',1)->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();

            $ahli = AhliParlimen::join('kod_parlimen','ahliparlimen.kod_kaw_ap','kod_parlimen.p_kod')
                        ->where('ahliparlimen.type','AP')
                        ->where('ahliparlimen.status_ap',0)
                        ->where('ahliparlimen.is_deleted',0)
                        ->whereNull('ahliparlimen.tkh_tamat')
                        ->orderBy('ahliparlimen.kod_kaw_ap')
                        ->get();

            // dd($soalan);
            
            return view('soalan/dewan/index', compact('usermenu','tanya','sidang','ahli','kategori','sub','bahagian','soalan','kakitangan'));
        } else if($dewan == '2'){    
            $sidang = KodSidang::where('status',0)->where('j_dewan',2)->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();
    
            $ahli = AhliParlimen::where('ahliparlimen.type','AD')
                        ->where('ahliparlimen.status_ap',0)
                        ->where('ahliparlimen.is_deleted',0)
                        ->whereNull('ahliparlimen.tkh_tamat')
                        ->orderBy('ahliparlimen.nama_ap')
                        ->get();

            // dd($kakitangan);
    
            return view('soalan/dewan/index', compact('usermenu','tanya','sidang','ahli','kategori','sub','bahagian','soalan','kakitangan'));
        }
    }

    public function agih($id)
    {
        // dd($id);
        $email = SoalanParlimen::join('kod_bahagian','soalan_parlimen.kod_bahagian','kod_bahagian.id_bahagian')->where('soalan_parlimen.soalan_id',$id)->select('soalan_parlimen.peg_id','kod_bahagian.pegawai_sub')->first();

        // dd($email);

        if(!empty($email->peg_id)){
            $admin = Kakitangan::find($email->peg_id);
            // dd($admin->email);
            $email_nameto = 'nizamms@gmail.com';
            $email_to = $admin->email;
        } else {
            $email_nameto = 'Webmaster';
            $email_to = 'nizamms@gmail.com';
        }

        if(!empty($email->pegawai_sub)){
            $admin = Kakitangan::find($email->pegawai_sub);
            // dd($admin);
            $email_namecc = 'nizamms@gmail.com';
            $email_cc = $admin->email;
        } else {
            $email_namecc = 'Webmaster';
            $email_cc = 'nizamms@gmail.com';
        }

        $soalan = SoalanParlimen::where('soalan_id',$id)->update(['tkh_agihan'=>now(),'status'=>1]);

        if($soalan){
            return response()->json('OK');
        } else {
            return response()->json('ERR');
        }
    }

    public function cetak($id)
    {
        // dd($id);

        $soalan = SoalanParlimen::find($id);

        $sedia = Kakitangan::join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan',$soalan->sedia_oleh)->first();

        $semak = Kakitangan::join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan',$soalan->semak_oleh)->first();
        
        $lulus = Kakitangan::join('kod_bahagian','kakitangan.id_bahagian','kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan',$soalan->lulus_oleh)->first();
        
        // dd($lulus);

        return view('soalan/senarai/cetak', compact('soalan','sedia','semak','lulus'));
    }
}
