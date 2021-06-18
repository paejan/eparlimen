<?php

namespace App\Http\Controllers\Utiliti;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KodSidang;
use App\KodDewan;
use App\JadualTugas;
use Illuminate\Support\Facades\Auth;

class SidangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if(empty($request->except('page')))
        {
            $sidang = KodSidang::where('is_deleted',0)->whereNotNull('id_sidang')->orderBy('tahun','DESC')->orderBy('start_dt','DESC')->paginate(10);
        } else {
            $ctahun = $request->ctahun;
            $lj_dewan = $request->lj_dewan;
            $row = KodSidang::where('is_deleted',0)->whereNotNull('id_sidang');

            if(!empty($ctahun)) { $row->where('tahun', $ctahun); }
            if(!empty($lj_dewan)) { $row->where('j_dewan', $lj_dewan); }

            $row->orderBy('tahun','DESC')->orderBy('start_dt','DESC');

            $sidang = $row->paginate(10);
        }

        $dewan = KodDewan::get();
        // dd($sidang);
        return view('utiliti/sidang/index', compact('sidang','dewan'));
    }

    public function form(Request $request)
    {
        // dd($request->all());
        $rsData = KodSidang::where('id_sidang',$request->ids)->first();
        $rsBgh = KodDewan::get();

        return view('utiliti/sidang/form',compact('rsData','rsBgh'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user()->id_kakitangan;

        $ids = $request->ids;

        $id_sidang = KodSidang::max('id_sidang') + 1;

        $start = explode("-",$request->start_dt);
        $startday = mktime(0, 0, 0, $start[1], $start[2], $start[0]); //sec,min,hr,mth,day,yr
        $end = explode("-",$request->end_dt);
        $endday =  mktime(0, 0, 0, $end[1], $end[2], $end[0]); //sec,min,hr,mth,day,yr
        $diff = ($endday - $startday) / 86400;
        
        if($request->j_dewan == 1){ $dewan = 'Dewan Rakyat'; }
        else{ $dewan = 'Dewan Negara'; }
        
        // dd($id_sidang);

        if(empty($ids)) {
            $sidang = new KodSidang();
            $sidang->id_sidang = $id_sidang;
            $sidang->j_dewan = $request->j_dewan;
            $sidang->persidangan = $request->persidangan;
            $sidang->tahun = $request->tahun;
            $sidang->start_dt = $request->start_dt;
            $sidang->end_dt = $request->end_dt;
            $sidang->status = $request->status;

            $sidang->save();

            if($sidang->save()) {
                
                if(!empty($id_sidang)){    
                    $bils = 0;
    
                    for($i = 0;$i<=$diff;$i++){
                        if($bils == 0) {$dt = $startday; }
                        else { $dt = $startday + (86400*$bils); }
                        $bils++;
                        
                        $tkh = date("Y-m-d", $dt);
    
                        $jadual = JadualTugas::where('jad_tkh',$tkh)->where('id_sidang',$id_sidang)->get();
                        $numrow = $jadual->count();
                        if($numrow == 0){
                            $jadual_insert = new JadualTugas();
                            $jadual_insert->id_sidang = $id_sidang;
                            $jadual_insert->jad_tkh = $tkh;
                            $jadual_insert->dewan = $dewan;
                            $jadual_insert->pegawai1 = 0;
                            $jadual_insert->pegawai2 = 0;
                            $jadual_insert->pegawai3 = 0;
                            $jadual_insert->create_dt = now();
                            $jadual_insert->create_by = $user;
                            $jadual_insert->update_dt = now();
                            $jadual_insert->update_by = $user;
                            $jadual_insert->is_deleted = 0;
    
                            $jadual_insert->save();
                        }
                    }    
                }
                return response()->json('OK');
            } else {
                return response()->json('ERR');
            }
        } else {
            $data = array('j_dewan'=>$request->j_dewan,'persidangan'=>$request->persidangan,'tahun'=>$request->tahun,'start_dt'=>$request->start_dt,'end_dt'=>$request->end_dt,'status'=>$request->status,);
            $sidang = KodSidang::where('id_sidang',$ids)->update($data);

            $jadual = JadualTugas::where('id_sidang',$ids)->where('pegawai1',0)->where('pegawai2',0)->where('pegawai3',0)->update(['is_deleted'=>1]);

            for($i=0;$i<=$diff;$i++){
				$dt = $startday + (86400*$i);
				$tkh = date("Y-m-d", $dt);
				if(!empty($tkh)){
                    $jadual = JadualTugas::where('jad_tkh',$tkh)->where('id_sidang',$ids)->first();
					if(!empty($jadual)){
                        // dd($jadual);
                        if($jadual->is_deleted == 1){
                            $jadual = JadualTugas::where('jad_tkh','<',$request->end_dt)->where('id_sidang',$ids)->update(['is_deleted'=>0]);
                        }
					} else {
                        $jadual_insert = new JadualTugas();
                        $jadual_insert->id_sidang = $ids;
                        $jadual_insert->jad_tkh = $tkh;
                        $jadual_insert->dewan = $dewan;
                        $jadual_insert->pegawai1 = 0;
                        $jadual_insert->pegawai2 = 0;
                        $jadual_insert->pegawai3 = 0;
                        $jadual_insert->create_dt = now();
                        $jadual_insert->create_by = $user;
                        $jadual_insert->update_dt = now();
                        $jadual_insert->update_by = $user;

                        $jadual_insert->save();
					}
				}
			}
            return response()->json('OK');
        }
    }

    public function delete($id)
    {
        // dd($id);

        $user = Auth::user()->id_kakitangan;

        $sidang = KodSidang::where('id_sidang',$id)->update(['is_deleted'=> 1,'deleted_by'=>$user,'deleted_dt'=>now()]);
        return response()->json('OK');
    }
}
