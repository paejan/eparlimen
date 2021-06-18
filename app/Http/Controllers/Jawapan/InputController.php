<?php

namespace App\Http\Controllers\Jawapan;

use App\AhliParlimen;
use App\Http\Controllers\Controller;
use App\SoalanInput;
use App\SoalanParlimen;
use App\TableMenuUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->all());

        //Sidang
        $sidang = DB::table('kod_sidang')->join('kod_dewan','kod_sidang.j_dewan','kod_dewan.j_dewan')->where('kod_sidang.status',0);
        if(!empty($request->lj_dewan)){ $sidang->where('kod_sidang.j_dewan',$request->lj_dewan); }

        $sidang = $sidang->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->get();

        //Soalan
        $soalan = SoalanParlimen::join('soalan_input','soalan_parlimen.soalan_id','soalan_input.soalan_id')
        ->where('bahagian_id',Auth::user()->id_bahagian)
        ->where('is_delete',1)
        ->where('is_email',1);
        
        if(!empty($request->l_cari)){ $soalan->where('soalan','LIKE','%'.$request->l_cari.'%'); }
        if(!empty($request->lj_tanya)){ $soalan->where('j_tanya',$request->lj_tanya); }
        if(!empty($request->lj_dewan)){ $soalan->where('j_dewan',$request->lj_dewan); }
        if(!empty($request->ljid_sidang)){ $soalan->where('id_sidang',$request->ljid_sidang); }

        $soalan = $soalan->orderBy('tkh_soalan','DESC')->paginate(10);
        // dd($soalan);
        return view('jawapan/input/index',compact('sidang','soalan'));
    }

    public function form($id)
    {
        $usermenu = TableMenuUser::where('menu_id',33)->where('id_kakitangan',Auth::user()->id_kakitangan)->first();
    
        $soalan = SoalanParlimen::join('soalan_input','soalan_parlimen.soalan_id','soalan_input.soalan_id')->find($id);

        if($soalan->j_dewan == 1){
            $ahliparlimen = DB::table('ahliparlimen')->join('kod_parlimen','ahliparlimen.kod_kaw_ap','kod_parlimen.p_kod')->where('ahliparlimen.id_ap',$soalan->s_oleh)->first();
        } else {
            $ahliparlimen = AhliParlimen::find($soalan->s_oleh);
        }

        return view('jawapan/input/form',compact('usermenu','soalan','ahliparlimen'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $user = Auth::user()->id_kakitangan;

        // dd($user);

        try {
            SoalanInput::where('input_id',$request->input_id)->update(['jawapan_input'=>$request->jawapan_text,'update_dt'=>now(),'update_by'=>$user]);
    
            return response()->json('OK');
        } catch (\Throwable $th) {
            return response()->json('ERR');
        }


    }
}
