<?php

namespace App\Http\Controllers\Utiliti;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bahagian;

class BahagianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(empty($request->except('page')))
        {
            $bahagian = Bahagian::orderBy('nama_bahagian')->paginate(10);
        }
        else
        {
            if(!empty($request->carian)) {
                $bahagian = Bahagian::where('nama_bahagian', 'LIKE', '%'.$request->carian.'%')->orderBy('nama_bahagian')->paginate(10);
            } else {   
                $bahagian = Bahagian::orderBy('nama_bahagian')->paginate(10);
            }
        }
        // dd($kategori);
        return view('utiliti/bahagian/index', compact('bahagian'));
    }

    public function form(Request $request)
    {
        // dd($request->all());

        $rsk = Bahagian::where('id_bahagian',$request->ids)->first();

        return view('/utiliti/bahagian/form',compact('rsk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $id_bahagian = $request->id_bahagian;
        if(empty($id_bahagian)) {
            $bahagian = new Bahagian();
            $bahagian->kod_bahagian = $request->kod_bahagian;
            $bahagian->nama_bahagian = $request->nama_bahagian;
            $bahagian->status = $request->status;

            $bahagian->save();

            return response()->json('OK');
        } else {
            $data = array('kod_bahagian'=>$request->kod_bahagian,'nama_bahagian'=>$request->nama_bahagian,'status'=>$request->status);

            $bahagian = Bahagian::where('id_bahagian',$id_bahagian)->update($data);
            return response()->json('OK');
        }

    }
}
