<?php

namespace App\Http\Controllers\Utiliti;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AhliParlimen;
use App\KodParlimen;
use App\KodParti;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AhliParlimenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rakyat(Request $request)
    {
        // dd($request->all());
        if(empty($request->except('page')))
        {
            $parlimen = DB::table('ahliparlimen')
                        ->join('kod_parlimen','ahliparlimen.kod_kaw_ap','kod_parlimen.p_kod')
                        ->where('ahliparlimen.type', 'AP')
                        ->where('ahliparlimen.status_ap', 0)
                        ->where('ahliparlimen.is_deleted', 0)
                        ->orderBy('ahliparlimen.kod_kaw_ap')
                        ->paginate(10);
        } else {
            $sort = $request->sort;
            $carian = $request->carian;
            $row = DB::table('ahliparlimen')
                        ->join('kod_parlimen','ahliparlimen.kod_kaw_ap','kod_parlimen.p_kod')
                        ->where('ahliparlimen.type', 'AP')
                        ->where('ahliparlimen.status_ap', 0)
                        ->where('ahliparlimen.is_deleted', 0);
            if(!empty($carian)){
                $row->where('ahliparlimen.nama_ap','LIKE','%'.$carian.'%')->orWhere('ahliparlimen.kod_kaw_ap','LIKE','%'.$carian.'%');
            }
            
            if(empty($sort)){
                $row->orderBy('ahliparlimen.kod_kaw_ap');
            } else if($sort == 'kod') {
                $row->orderBy('ahliparlimen.kod_kaw_ap');
            } else if($sort == 'kaw') {
                $row->orderBy('kod_parlimen.p_nama');
            } else {
                $row->orderBy('ahliparlimen.nama_ap');
            }
            
            $parlimen = $row->paginate(10);
        }

        // dd($parlimen);

        return view('/utiliti/ahli_parlimen/index', compact('parlimen'));
    }

    public function negara(Request $request)
    {
        // dd($request->all());
        if(empty($request->except('page')))
        {
            $parlimen = AhliParlimen::where('type', 'AD')->where('is_deleted',0)->orderBy('kod_kaw_ap')->paginate(10);
        } else {
            $sort = $request->sort;
            $carian = $request->carian;

            $row = Ahliparlimen::where('type', 'AD')->where('is_deleted',0);
            // dd($carian);
            if(!empty($carian)){
                $row->where(function($cari) use($carian){
                    $cari->where('ahliparlimen.nama_ap','LIKE','%'.$carian.'%')->orWhere('ahliparlimen.kod_kaw_ap','LIKE','%'.$carian.'%');
                });
            }

            if(empty($sort)) {
                $row->orderBy('kod_kaw_ap');
            } else if($sort == 'nama') {
                $row->orderBy('nama_ap')->paginate(10);
            } else {
                $row->orderBy('kawasan_ap');
            }

            $parlimen = $row->paginate(10);
        }
        
        // dd($parlimen);
        return view('/utiliti/ahli_parlimen/index', compact('parlimen'));
    }

    public function unactive(Request $request)
    {
        if(empty($request->except('page')))
        {
            $parlimen = DB::table('ahliparlimen')
                        ->join('kod_parlimen','ahliparlimen.kod_kaw_ap','=','kod_parlimen.p_kod')
                        ->where('ahliparlimen.type', 'AP')
                        ->where(function($q){
                            $q->where(function($query){
                                $query->where('ahliparlimen.status_ap','<>',0)
                                      ->where('ahliparlimen.is_deleted',0);
                            })
                            ->orWhere('ahliparlimen.is_deleted',1);
                        })
                        ->orderBy('ahliparlimen.kod_kaw_ap')
                        ->orderBy('ahliparlimen.nama_ap')
                        ->paginate(10);
        } else {
            $sort = $request->sort;
            $carian = $request->carian;
            $row = DB::table('ahliparlimen')
                        ->join('kod_parlimen','ahliparlimen.kod_kaw_ap','=','kod_parlimen.p_kod')
                        ->where('ahliparlimen.type', 'AP')
                        ->where(function($q){
                            $q->where(function($query){
                                $query->where('ahliparlimen.status_ap','<>',0)
                                      ->where('ahliparlimen.is_deleted',0);
                            })
                            ->orWhere('ahliparlimen.is_deleted',1);
                        });
            if(!empty($carian)){
                $row->where(function($cari) use($carian){
                    $cari->where('ahliparlimen.nama_ap','LIKE','%'.$carian.'%')->orWhere('ahliparlimen.kod_kaw_ap','LIKE','%'.$carian.'%');
                });
            }
            
            if(empty($sort)){
                $row->orderBy('ahliparlimen.kod_kaw_ap');
            } else if($sort == 'kod') {
                $row->orderBy('ahliparlimen.kod_kaw_ap');
            } else if($sort == 'kaw') {
                $row->orderBy('kod_parlimen.p_nama');
            } else {
                $row->orderBy('ahliparlimen.kod_kaw_ap')->orderBy('ahliparlimen.nama_ap');
            }
            
            $parlimen = $row->paginate(10);
        }
        
        // dd($parlimen);

        return view('/utiliti/ahli_parlimen/index', compact('parlimen'));
    }

    public function form(Request $request)
    {
        // dd($request->all());

        if($request->type == 'ap' || $request->type == 'ta'){
            $rsk = AhliParlimen::where('id_ap',$request->ids)->first();

            $rs_kp = KodParlimen::where('p_status',0);
            if(!empty($request->ids)){ $rs_kp->where('p_kod',$rsk->kod_kaw_ap); }
            $rs_kp = $rs_kp->orderBy('p_kod')->get();
            // dd($rs_kp);

            $ada=[];
            for ($i=0; $i < $rs_kp->count(); $i++) {
                $ada[$i] = AhliParlimen::where('type','AP')->where('status_ap',0)->where('is_deleted',0)->where('kod_kaw_ap',$rs_kp[$i]->p_kod)->pluck('id_ap');
            }
            // dd($ada);

            $parti = KodParti::get();
            // dd($parti);

            return view('/utiliti/ahli_parlimen/ap',compact('rs_kp','rsk','ada','parti'));
            
        } else if($request->type == 'ad'){
            $rsk = AhliParlimen::where('id_ap',$request->ids)->first();
            return view('/utiliti/ahli_parlimen/adewan',compact('rsk'));
        }

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $id_ap = $request->id_ap;
        $type = $request->type;
        $by = Auth::user()->id_kakitangan;

        if($type == 'AP') {
            if(empty($id_ap)) {
                // dd('empty');
                $ahli = new AhliParlimen();
                $ahli->kod_kaw_ap = $request->kod_kaw_ap;
                $ahli->nama_ap = $request->nama_ap;
                $ahli->parti = $request->parti;
                $ahli->tkh_mula = $request->tkh_mula;
                $ahli->tkh_tamat = $request->tkh_tamat;
                $ahli->status_ap = $request->status_ap;
                $ahli->type = $type;
    
                $ahli->save();
    
                return response()->json('OK');
    
            } else {
                // dd('ada');
                $data = array('kod_kaw_ap'=>$request->kod_kaw_ap, 'nama_ap'=>$request->nama_ap, 'parti'=>$request->parti, 'tkh_mula'=>$request->tkh_mula, 'tkh_tamat'=>$request->tkh_tamat);
                $ahli = AhliParlimen::where('id_ap', $id_ap)->update($data);

                if(!empty($request->tkh_tamat)){
                    $con = array('status_ap'=>1, 'is_deleted'=>1, 'delete_by'=>$by, 'delete_dt'=>now());
                    $ahli = AhliParlimen::where('id_ap', $id_ap)->update($con);
                } else {
                    $con = array('status_ap'=>$request->status_ap);
                    $ahli = AhliParlimen::where('id_ap', $id_ap)->update($con);
                }
    
                return response()->json('OK');
            }
        } else {
            // dd($type);
            // dd($id_ap);
            if(empty($id_ap)) {
                // dd('empty');
                $ahli = new AhliParlimen();
                $ahli->kawasan_ap = $request->kawasan_ap;
                $ahli->nama_ap = $request->nama_ap;
                $ahli->parti = $request->parti;
                $ahli->tempoh = $request->tempoh;
                $ahli->status_ap = $request->status_ap;
                $ahli->type = $type;
    
                $ahli->save();
    
                return response()->json('OK');
    
            } else {
                // dd('ada');
                $data = array('kawasan_ap'=>$request->kawasan_ap, 'nama_ap'=>$request->nama_ap, 'parti'=>$request->parti, 'tempoh'=>$request->tempoh, 'status_ap'=>$request->status_ap);
    
                $ahli = AhliParlimen::where('id_ap', $id_ap)->update($data);
    
                return response()->json('OK');
            }
        }
    }

    public function delete(Request $request, $id)
    {
        // dd($request->all());
        $auth = Auth::user()->id_kakitangan;
        // dd($auth);
        $data = array('status_ap'=>1, 'tkh_tamat'=>$request->tkh_tamat, 'is_deleted'=>1, 'delete_dt'=>now(), 'delete_by'=>$auth);
        $ahli = AhliParlimen::where('id_ap', $id)->update($data);

        return response()->json('OK');
    }
}
