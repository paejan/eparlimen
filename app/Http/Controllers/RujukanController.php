<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Attachment;

class RujukanController extends Controller
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
            $docs = Dokumen::where('is_deleted', '0')->where('doc_type','DOC')->where('doc_status',0)->orderBy('update_dt', 'DESC')->paginate(10);
        }
        else
        {
            $docs = Dokumen::where('is_deleted',0)->where('doc_type','DOC')->where('doc_status',0)->where('dokumen_tajuk','LIKE','%'.$request->carian.'%')->orderBy('update_dt','DESC')->paginate(10);
        }
        // dd($docs);
        return view('rujukan/index', compact('docs'));
    }

    public function view($id)
    {
        // dd($id);

        $doc = Dokumen::find($id);
        
        $attach = Attachment::where('soalan_id',$id)->get();

        // dd($attach);

        return view('rujukan/view', compact('doc','attach'));
    }

    public function cetak($id)
    {
        $doc = Dokumen::find($id);
        
        $attach = Attachment::where('soalan_id',$id)->get();

        // dd($attach);

        return view('rujukan/cetak', compact('doc','attach'));
    }

    public function download($file)
    {
        // dd($file);
        $path = storage_path().'/'.'app'.'/doc/'.$file;
        // dd($path);
        if(file_exists($path)) {
            return response()->file($path);
        } else {
            return back();
        }
    }
}
