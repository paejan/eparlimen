<?php

namespace App\Http\Controllers\Utiliti;

use App\Handset;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandsetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (empty($request->except('page'))) {
            $docs = Handset::where('is_deleted', '0')->orderBy('update_dt', 'DESC')->paginate(10);
        } else {
            $docs = Handset::where('is_deleted', 0)->where('dokumen_tajuk', 'LIKE', '%' . $request->carian . '%')->orderBy('update_dt', 'DESC')->paginate(10);
        }
        return view('utiliti/handset/index', compact('docs'));
    }

    public function create()
    {
        return view('/utiliti/handset/form');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $auth = Auth::user()->id_kakitangan;
        if (empty($request->doc_id)) {
            //Proses masukkan data
            $doc_id = date('Ymd') . uniqid();

            // dd($doc_id);

            $handset = new Handset();
            $handset->doc_id = $doc_id;
            $handset->dokumen_tajuk = $request->dokumen_tajuk;
            $handset->dokumen = $request->docs;
            $handset->doc_status = $request->doc_status;
            if (!empty($request->file1)) {
                $file = $request->file1->getClientOriginalName();
                $type = pathinfo($file)['extension'];
                $path = $request->file1->storeAs('handset', $file);

                $handset->file_name = $file;
                $handset->file_type = $type;
            }
            $handset->create_dt = now();
            $handset->create_by = $auth;
            $handset->update_dt = now();
            $handset->update_by = $auth;
            $handset->is_deleted = 0;

            $handset->save();
        } else {
            //Proses kemaskini data
            $data = array('dokumen_tajuk' => $request->dokumen_tajuk, 'dokumen' => $request->docs, 'doc_status' => $request->doc_status, 'update_dt' => now(), 'update_by' => $auth);
            // dd($data);
            $handset = Handset::where('doc_id', $request->doc_id)->update($data);
        }

        // dd($doc);
    }

    public function edit($id)
    {
        // dd($id);
        $dc = Handset::where('doc_id', $id)->first();
        // dd($attc);
        return view('/utiliti/handset/form', compact('dc'));
    }

    public function download($file)
    {
        // dd(storage_path());
        $path = storage_path() . '/' . 'app' . '/handset/' . $file;
        // dd($path);
        if (file_exists($path)) {
            return response()->file($path);
        }
    }

    public function delete($id)
    {
        // dd($id);
        try {
            $ids = Auth::user()->id_kakitangan;
            $data = array('is_deleted' => 1, 'delete_dt' => now(), 'delete_by' => $ids);
            // dd($data);
            $doc = Handset::where('doc_id', $id)->update($data);

            return response()->json('OK');
        } catch (\Throwable $th) {
            return response()->json('ERR');
            //throw $th;
        }
    }
}
