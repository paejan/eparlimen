<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahagian;
use App\Kakitangan;
use App\KodKategori;
use App\SearchTable;
use App\SoalanParlimen;

class CarianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        // dd($request->all());

        $bah = Bahagian::get();

        $kategori = KodKategori::get();

        $cond = SearchTable::where('ref_id','<>','');

        $s = '';
        $oc = 0;
        if(!empty($request->carian)){
            $s = explode("+", $request->carian);
            $oc = count($s);
            // dd($request->carian);

            if($oc==1){
                $cond->where(function($q) use($request){
                    $q->where('content','LIKE','%'. $request->carian .'%')
                      ->orWhere('doc_title','LIKE','%'. $request->carian .'%');
                });
            } else {
                $cond ->where(function($q) use($oc,$s){
                    for($i=0;$i<$oc;$i++){
                        if($i==0){
                            $q->where('content','LIKE','%'.$s[$i].'%')
                              ->orWhere('doc_title','LIKE','%'.$s[$i].'%');
                        }
                        else {
                            $q->orWhere('content','LIKE','%'.$s[$i].'%')
                              ->orWhere('doc_title','LIKE','%'.$s[$i].'%');
                        }
                    }
                });
            }
        }

        if(!empty($request->bahagian)){ $cond->where('kod_bahagian',$request->bahagian); }
        if(!empty($request->id_sidang)){ $cond->where('id_sidang',$request->id_sidang); }
        if(!empty($request->lj_kategori)){ $cond->where('j_kategori',$request->lj_kategori); }

        $search = $cond->paginate(10);

        // dd($search);

        return view('carian/index', compact('bah','kategori','s','oc','search'));
    }

    public function view($id)
    {
        // dd($id);
        $title = "Paparan Maklumat Soalan Parlimen";

        $result = SoalanParlimen::find($id);

        $rowp1 = Kakitangan::where('id_kakitangan',$result->sedia_oleh)->first();

        $rowp2 = Kakitangan::where('id_kakitangan',$result->semak_oleh)->first();
        
        $rowp3 = Kakitangan::where('id_kakitangan',$result->lulus_oleh)->first();

        return view('carian/view',compact('title','result','rowp1','rowp2','rowp3'));
    }
}
