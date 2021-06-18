<?php

namespace App\Http\Controllers\Pengulungan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dokumen;
use App\TableMenuUser;

class PengulunganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->all());
        $type = Auth::user()->type;

        $pengulungan = Dokumen::where('doc_type','GLG')->where('is_deleted',0);

        
        if(!empty($request->carian)){ $pengulungan->where('dokumen_tajuk','LIKE','%'.$request->carian.'%'); }

        if($type == 'P') {
            $pengulungan->where('doc_status',0);
        } else if($type == 'B') {
            $pengulungan->where('doc_status',0);
        }

        $pengulungan = $pengulungan->orderBy('update_dt','DESC')->paginate(10);
        // dd($pengulungan);
        return view('lain_lain/pengulungan/index', compact('pengulungan'));
    }

    public function create()
    {
        $usermenu = TableMenuUser::where('menu_id',26)->where('id_kakitangan',Auth::user()->id_kakitangan)->first();
        return view('lain_lain/pengulungan/form', compact('usermenu'));
    }
    
    public function edit($id)
    {
        $usermenu = TableMenuUser::where('menu_id',26)->where('id_kakitangan',Auth::user()->id_kakitangan)->first();
        // dd($usermenu);
        $doc = Dokumen::find($id);
        // dd($doc);
        return view('lain_lain/pengulungan/form', compact('usermenu','doc'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if(empty($request->doc_id)) {

            $doc_id = date('Ymd').uniqid();

            $dokumen = new Dokumen();
            $dokumen->doc_id = $doc_id;
            $dokumen->dokumen_tajuk = $request->dokumen_tajuk;
            $dokumen->dokumen = $request->dokumen;
            $dokumen->doc_status = $request->doc_status;
            $dokumen->create_dt = now();
            $dokumen->update_dt = now();
            $dokumen->doc_type = 'GLG';
            $dokumen->tarikh = $request->tarikh;

            if($request->file != 'undefined'){
                // dd('yes');
                $file = $request->file->getClientOriginalName();
                $type = pathinfo($file)['extension'];
                // dd($type);
                // dd($id);
                $path = $request->file->storeAs('doc', $file);

                $dokumen->file_name = $file;
                $dokumen->file_type = $type;
            }

            $dokumen->save();

            return response()->json('OK');
        } else {

            $data = array(
                'dokumen_tajuk'=>$request->dokumen_tajuk,
                'dokumen'=>$request->dokumen,
                'tarikh'=>$request->tarikh,
                'doc_status'=>$request->doc_status,
                'update_dt'=>now(),
            );

            $dokumen = Dokumen::where('doc_id',$request->doc_id)->update($data);

            if($request->file != 'undefined'){
                // dd('yes');
                $file = $request->file->getClientOriginalName();
                $type = pathinfo($file)['extension'];
                // dd($type);
                // dd($id);
                $path = $request->file->storeAs('doc', $file);

                $data_file = array('file_name'=>$file,'file_type'=>$type);

                
                $dokumen = Dokumen::where('doc_id',$request->doc_id)->update($data_file);
            }

            return response()->json('OK');
        }
    }

    public function delete($id)
    {
        // dd($id);
        $user = Auth::user()->id_kakitangan;
        $dokumen = Dokumen::where('doc_id',$id)->update(['is_deleted'=>1,'delete_dt'=>now(),'delete_by'=>$user]);

        return response()->json('OK');
    }

    public function doc($file)
    {
        $path = storage_path().'/'.'app'.'/doc/'.$file;
        // dd($path);
        if(file_exists($path)) {
            return response()->file($path);
        } else {
            return back();
        }
    }
}
