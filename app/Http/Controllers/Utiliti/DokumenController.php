<?php

namespace App\Http\Controllers\Utiliti;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokumen;
use Illuminate\Support\Facades\File;
use App\Attachment;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->all());
        if (empty($request->except('page'))) {
            $docs = Dokumen::where('is_deleted', '0')->where('doc_type', 'DOC')->orderBy('update_dt', 'DESC')->paginate(10);
        } else {
            $docs = Dokumen::where('is_deleted', 0)->where('doc_type', 'DOC')->where('dokumen_tajuk', 'LIKE', '%' . $request->carian . '%')->orderBy('update_dt', 'DESC')->paginate(10);
        }
        // dd($docs);
        return view('/utiliti/dokumen/index', compact('docs'));
    }

    public function create()
    {
        return view('/utiliti/dokumen/form');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if (empty($request->doc_id)) {
            //Proses masukkan data
            $doc_id = date('Ymd') . uniqid();
            // dd($doc_id);

            $doc = new Dokumen();
            $doc->doc_id = $doc_id;
            $doc->dokumen_tajuk = $request->dokumen_tajuk;
            $doc->dokumen = $request->docs;
            $doc->doc_status = $request->doc_status;
            $doc->is_doc = $request->is_doc;
            $doc->create_dt = now();
            $doc->update_dt = now();
            $doc->is_deleted = 0;

            $doc->save();
        } else {
            //Proses kemaskini data
            $data = array('dokumen_tajuk' => $request->dokumen_tajuk, 'dokumen' => $request->docs, 'doc_status' => $request->doc_status, 'is_doc' => $request->is_doc, 'update_dt' => now());
            // dd($data);
            $doc = Dokumen::where('doc_id', $request->doc_id)->update($data);
        }

        // dd($doc);
    }

    public function edit($id)
    {
        // dd($id);
        $dc = Dokumen::where('doc_id', $id)->get();
        $attc = Attachment::where('soalan_id', $id)->get();
        // dd($attc);
        return view('/utiliti/dokumen/form', compact('dc', 'attc'));
    }

    public function upload(Request $request, $id, $title)
    {
        // dd($request->file1);
        $file = $request->file1->getClientOriginalName();
        $type = pathinfo($file)['extension'];
        // dd($type);
        // dd($id);
        $path = $request->file1->storeAs('doc', $file);

        $up = new Attachment();
        $up->soalan_id = $id;
        $up->file_tajuk = $title;
        $up->file_name = $file;
        $up->file_type = $type;
        $up->update_dt = now();

        $up->save();

        return response()->json('OK');
    }

    public function download($file)
    {
        // dd(storage_path());
        $path = storage_path() . '/' . 'app' . '/doc/' . $file;
        // dd($path);
        if (file_exists($path)) {
            return response()->file($path);
        }
    }

    public function delete(Request $request, $id)
    {
        // dd($request->all());
        if (is_numeric($id)) {
            //Delete from local
            $file = Attachment::where('attach_id', $id)->pluck('file_name');
            // dd($file[0]);
            $path = storage_path() . '/' . 'app' . '/doc/' . $file[0];
            if (file_exists($path)) {
                // dd("delete");
                $storage = File::delete($path);
                // dd($storage);
            }

            //Delete from database
            Attachment::destroy($id);
        } else {
            $ids = Auth::user()->id_kakitangan;
            $data = array('is_deleted' => 1, 'delete_dt' => now(), 'delete_by' => $ids);
            // dd($data);
            $doc = Dokumen::where('doc_id', $id)->update($data);
        }

        return response()->json('OK');
    }
}
