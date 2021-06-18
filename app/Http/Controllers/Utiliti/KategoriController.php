<?php

namespace App\Http\Controllers\Utiliti;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KodKategori;
use App\KodKategoriSub;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        // dd($request->all());
        if(empty($request->except('page')))
        {
            $kategori = KodKategori::orderBy('nama_kategori')->paginate(10);
        }
        else
        {
            if(!empty($request->carian)) {
                $kategori = KodKategori::where('nama_kategori', 'LIKE', '%'.$request->carian.'%')->orderBy('nama_kategori')->paginate(10);
            } else {   
                $kategori = KodKategori::orderBy('nama_kategori')->paginate(10);
            }
        }
        // dd($kategori);
        return view('utiliti/kategori/index', compact('kategori'));
    }

    public function subindex(Request $request)
    {
        // dd($request->all());
        if(empty($request->except('page')))
        {
            $kategori = DB::table('kod_kategori_sub')->join('kod_kategori', 'kod_kategori_sub.id_kategori','=','kod_kategori.id_kategori')->paginate(10);
        }
        else
        {
            $rows = DB::table('kod_kategori_sub')
                        ->join('kod_kategori', 'kod_kategori_sub.id_kategori','=','kod_kategori.id_kategori');
            if(!empty($request->carian)) {
                $rows->where('kod_kategori_sub.nama_sub_kategori', 'LIKE', '%'.$request->carian.'%');
            }

            $kategori = $rows->paginate(10);
        }

        $kat = KodKategori::where('status',0)->get();
        // dd($kategori);
        return view('utiliti/kategori/index', compact('kategori', 'kat'));
    }

    public function form(Request $request)
    {
        // dd($request->all());

        if($request->type == 'kat'){
            $rsk = KodKategori::where('id_kategori',$request->ids)->first();

            return view('/utiliti/kategori/form',compact('rsk'));
        } else if($request->type == 'sub'){
            $rsk = KodKategoriSub::where('idsub_kategori',$request->ids)->first();

            $kod = KodKategori::where('status',0)->get();

            return view('/utiliti/kategori/sub_form',compact('rsk','kod'));
        }

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $type = $request->type;
        if($type == 'kat')
        {
            $id_kategori = $request->id_kategori;
            if(empty($id_kategori)){
                $kat = new KodKategori();
                $kat->nama_kategori = $request->nama_kategori;
                $kat->status = $request->status;
    
                $kat->save();
    
                return response()->json('OK');
            } else {
                $data = array('nama_kategori'=>$request->nama_kategori, 'status'=>$request->status);
    
                $kat = KodKategori::where('id_kategori', $id_kategori)->update($data);
    
                return response()->json('OK');
            }
        }
        else
        {
            $idsub_kategori = $request->idsub_kategori;
            if(empty($idsub_kategori)){
                $kat = new KodKategoriSub();
                $kat->id_kategori = $request->id_kategori;
                $kat->nama_sub_kategori = $request->nama_sub_kategori;
                $kat->status = $request->status;
    
                $kat->save();
    
                return response()->json('OK');
            } else {
                $data = array('id_kategori'=>$request->id_kategori, 'nama_sub_kategori'=>$request->nama_sub_kategori, 'status'=>$request->status);
    
                $kat = KodKategoriSub::where('idsub_kategori', $idsub_kategori)->update($data);
    
                return response()->json('OK');
            }
        }

    }
}
