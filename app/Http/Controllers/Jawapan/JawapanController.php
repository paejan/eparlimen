<?php

namespace App\Http\Controllers\Jawapan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TableMenuUser;
use App\Attachment;
use App\Kakitangan;
use App\AhliParlimen;
use App\Bahagian;
use App\Mail\JawapanInputMail;
use App\SoalanInput;
use App\SoalanParlimen;
use App\SoalanSemakan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JawapanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->all());
        $type = Auth::user()->type;

        //Sidang
        $sidang = DB::table('kod_sidang')
            ->join('kod_dewan', 'kod_sidang.j_dewan', 'kod_dewan.j_dewan')
            ->where('kod_sidang.status', 0);
        if (!empty($request->lj_dewan)) {
            $sidang->where('kod_sidang.j_dewan', $request->lj_dewan);
        }

        $sidang = $sidang->orderBy('tahun', 'DESC')->orderBy('start_dt', 'DESC')->get();

        //Kategori
        $kategori = DB::table('kod_kategori')->join('soalan_parlimen', 'kod_kategori.id_kategori', 'soalan_parlimen.j_kategori');

        if (!empty($request->lj_tanya)) {
            $kategori->where('j_tanya', $request->lj_tanya);
        }
        if (!empty($request->lj_dewan)) {
            $kategori->where('j_dewan', $request->lj_dewan);
        }
        if (!empty($request->ljid_sidang)) {
            $kategori->where('id_sidang', $request->ljid_sidang);
        }

        $kategori = $kategori->groupBy('kod_kategori.id_kategori')->distinct()->get();

        //Soalan
        $soalan = SoalanParlimen::where('status', 1)->where('is_deleted', 0)->where('is_semak', 0);

        if ($type == 'B') {
            $soalan->where('kod_bahagian', Auth::user()->id_bahagian);
        }
        if (!empty($request->l_cari)) {
            $soalan->where('soalan', 'LIKE', '%' . $request->l_cari . '%');
        }
        if (!empty($request->lj_tanya)) {
            $soalan->where('j_tanya', $request->lj_tanya);
        }
        if (!empty($request->lj_dewan)) {
            $soalan->where('j_dewan', $request->lj_dewan);
        }
        if (!empty($request->ljid_sidang)) {
            $soalan->where('id_sidang', $request->ljid_sidang);
        }
        if (!empty($request->lj_kategori)) {
            $soalan->where('j_kategori', $request->lj_kategori);
        }

        $soalan = $soalan->orderBy('tkh_soalan', 'DESC')->paginate(10);

        // dd($kategori);

        return view('jawapan/masuk/index', compact('sidang', 'kategori', 'soalan'));
    }

    public function serah($id)
    {
        // dd($id);

        $data = array(
            'tkh_dikembalikan' => now(),
            'status' => 2,
        );

        $soalan = SoalanParlimen::where('soalan_id', $id)->update($data);
    }

    public function cetak($id)
    {
        // dd($id);

        $soalan = SoalanParlimen::find($id);

        $sedia = DB::table('kakitangan')->join('kod_bahagian', 'kakitangan.id_bahagian', 'kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan', $soalan->sedia_oleh)->first();

        $semak = DB::table('kakitangan')->join('kod_bahagian', 'kakitangan.id_bahagian', 'kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan', $soalan->semak_oleh)->first();

        $lulus = DB::table('kakitangan')->join('kod_bahagian', 'kakitangan.id_bahagian', 'kod_bahagian.id_bahagian')->where('kakitangan.id_kakitangan', $soalan->lulus_oleh)->first();

        // dd($sedia);

        return view('jawapan/cetak', compact('soalan', 'sedia', 'semak', 'lulus'));
    }

    public function form(Request $request, $id)
    {
        // dd($request->all());
        if ($request->page == '') {
            $usermenu = TableMenuUser::where('menu_id', 3)->where('id_kakitangan', Auth::user()->id_kakitangan)->first();

            $soalan = SoalanParlimen::find($id);

            $soalan_input = SoalanInput::where('soalan_id', $id)->where('is_delete', 1)->get();

            if ($soalan->j_dewan == 1) {
                $ahliparlimen = DB::table('ahliparlimen')->join('kod_parlimen', 'ahliparlimen.kod_kaw_ap', 'kod_parlimen.p_kod')->where('ahliparlimen.id_ap', $soalan->s_oleh)->first();
            } else {
                $ahliparlimen = AhliParlimen::find($soalan->s_oleh);
            }

            $attachment = Attachment::where('soalan_id', $id)->get();

            $sedia = Kakitangan::whereIn('type', ['B', 'U'])->where('is_delete', 0)->where('id_bahagian', $soalan->kod_bahagian)->get();

            $semak = Kakitangan::whereIn('id_bahagian', ['33', $soalan->kod_bahagian])->where('is_semak', 1)->where('is_delete', 0)->get();

            $soalan_semak = SoalanSemakan::where('semakan_jenis', 'SEMAK')->whereNotNull('tkh_kemaskini')->whereNotNull('kenyataan')->where('soalan_id', $id)->get();

            // dd($ahliparlimen);

            $lulus = Kakitangan::where('is_lulus', 1)->where('is_delete', 0)->get();

            return view('jawapan/masuk/form', compact('usermenu', 'soalan', 'soalan_input', 'ahliparlimen', 'attachment', 'sedia', 'semak', 'soalan_semak', 'lulus'));
        } else if ($request->page == 'agensi') {
            $usermenu = TableMenuUser::where('menu_id', 3)->where('id_kakitangan', Auth::user()->id_kakitangan)->first();

            $soalan = SoalanParlimen::find($id);

            $soalan_input = SoalanInput::where('soalan_id', $id)->where('is_delete', 1)->get();

            if ($soalan->j_dewan == 1) {
                $ahliparlimen = DB::table('ahliparlimen')->join('kod_parlimen', 'ahliparlimen.kod_kaw_ap', 'kod_parlimen.p_kod')->where('ahliparlimen.id_ap', $soalan->s_oleh)->first();
            } else {
                $ahliparlimen = AhliParlimen::find($soalan->s_oleh);
            }

            return view('jawapan/masuk/form1', compact('usermenu', 'soalan', 'soalan_input', 'ahliparlimen'));
        }
    }

    public function list(Request $request)
    {
        $soalan_id = $request->ids;
        $bah = Bahagian::where('status', 0)->get();
        // $input = SoalanInput::where('soalan_id',$request->ids);

        return view('jawapan.masuk/list', compact('soalan_id', 'bah'));
    }

    public function list_store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user()->id_kakitangan;

        $rs = SoalanInput::where('soalan_id', $request->ids)->where('bahagian_id', $request->id_bahagian)->first();
        // dd($rs);

        if (empty($rs)) {
            $sql = new SoalanInput();
            $sql->soalan_id = $request->ids;
            $sql->bahagian_id = $request->id_bahagian;
            $sql->tkh_sasaran = now()->addDays(4);
            $sql->create_by = $user;
            $sql->create_dt = now();
            $sql->update_by = $user;
            $sql->update_dt = now();
            $sql->is_email = 0;
            $sql->is_delete = 1;

            $sql->save();
        } else {
            if ($rs->is_delete == 1) {
                $sql = SoalanInput::where('soalan_id', $request->ids)->where('bahagian_id', $request->id_bahagian)->update(['is_delete' => 0, 'update_by' => $user, 'update_dt' => now()]);
            } else if ($rs->is_delete == 0) {
                $sql = SoalanInput::where('soalan_id', $request->ids)->where('bahagian_id', $request->id_bahagian)->update(['is_delete' => 1, 'tkh_sasaran' => now()->addDays(3), 'update_by' => $user, 'update_dt' => now()]);
            }
        }

        return response()->json('OK');
    }

    public function input_email(Request $request)
    {
        // dd($request->all());

        $user_input = SoalanInput::where('soalan_id', $request->soalan_id)->get();
        // dd($user_input);

        $user = [];

        $data = [];

        foreach ($user_input as $ui) {

            $user = Kakitangan::where('id_bahagian', $ui->bahagian_id)->whereNotNull('email')->pluck('email');

            // dd($user);

            SoalanInput::find($ui->input_id)->update(['is_email' => 1]);

            // Mail::cc($user)->send(new JawapanInputMail($data));
        }

        return response()->json('OK');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();

        $data = array(
            'sedia_oleh' => $user->id_kakitangan,
            'sedia_nama' => $user->nama_kakitangan,
            'sedia_jawatan' => $user->jawatan_kakitangan,
            'sedia_bahagian' => $user->id_bahagian,
            'sedia_tel' => $user->no_telefon,
            'jawapan' => $request->jawapan_text,
            'maklumat_tambah' => $request->tambahan_text,
        );

        SoalanParlimen::where('soalan_id', $request->soalan_id)->update($data);

        return response()->json('OK');
    }

    public function serahform(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $data = array(
            'status' => 2,
            'sedia_oleh' => $user->id_kakitangan,
            'sedia_nama' => $user->nama_kakitangan,
            'sedia_jawatan' => $user->jawatan_kakitangan,
            'sedia_bahagian' => $user->id_bahagian,
            'sedia_tel' => $user->no_telefon,
            'jawapan' => $request->jawapan_text,
            'maklumat_tambah' => $request->tambahan_text,
        );

        SoalanParlimen::where('soalan_id', $request->soalan_id)->update($data);

        return response()->json('OK');
    }

    public function doc($id)
    {
        // dd($id);
        return view('jawapan/masuk/modal', compact('id'));
    }

    public function upload(Request $request, $id, $tajuk)
    {
        // dd($request->all());

        $up = new Attachment();
        $up->soalan_id = $id;
        $up->file_tajuk = $tajuk;

        if ($request->file1 != 'undefined') {
            // dd('ada');

            $file = $request->file1->getClientOriginalName();
            $type = pathinfo($file)['extension'];
            // dd($type);
            // dd($id);
            $path = $request->file1->storeAs('doc', $file);

            $up->file_name = $file;
            $up->file_type = $type;
        }

        $up->update_dt = now();

        $up->save();

        return response()->json('OK');
    }

    public function delete($id)
    {
        try {

            $sql = Attachment::find($id);
            // dd($sql);
            $path = storage_path() . '/' . 'app' . '/doc/' . $sql->file_name;
            // dd($path);
            if (file_exists($path)) {
                unlink($path);
            }
            $sql->delete();

            return response()->json('OK');
        } catch (\Throwable $th) {
            return response()->json('ERR');
        }
    }

    public function view($file)
    {
        // dd(storage_path());
        $path = storage_path() . '/' . 'app' . '/doc/' . $file;
        // dd($path);
        if (file_exists($path)) {
            return response()->file($path);
        }
    }
}
