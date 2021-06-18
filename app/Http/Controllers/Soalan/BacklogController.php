<?php

namespace App\Http\Controllers\Soalan;

use App\AhliParlimen;
use App\Bahagian;
use App\Http\Controllers\Controller;
use App\KodKategori;
use App\KodKategoriSub;
use App\KodPertanyaan;
use App\KodSidang;
use App\SoalanParlimen;
use App\TableMenuUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BacklogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // dd($request->except('page'));
        $user = Auth::user()->id_kakitangan;
        $type = Auth::user()->type;
        // dd($type);
        $usermenu = TableMenuUser::where('menu_id', 21)->where('id_kakitangan', $user)->first();
        if (empty($request->except('page'))) {
            // dd('empty');

            $sidang = KodSidang::join('kod_dewan', 'kod_sidang.j_dewan', 'kod_dewan.j_dewan')
                ->where('kod_sidang.status', 0)
                ->orderBy('tahun', 'DESC')
                ->orderBy('start_dt', 'DESC')
                ->get();

            $kategori = Bahagian::join('soalan_parlimen', 'kod_bahagian.id_bahagian', 'soalan_parlimen.kod_bahagian')
                ->groupBy('kod_bahagian.id_bahagian')
                ->distinct()
                ->get();


            $soalan = SoalanParlimen::where('soalan_id', '<>', '')->where('type_soalan', 'B')->where('is_deleted', 0)->orderBy('tkh_soalan', 'DESC')->paginate(10);

            // dd($pegawai);
        } else {
            //Sidang
            $row = KodSidang::join('kod_dewan', 'kod_sidang.j_dewan', 'kod_dewan.j_dewan')->where('kod_sidang.status', 0);

            if (!empty($request->lj_dewan)) {
                $row->where('kod_sidang.j_dewan', $request->lj_dewan);
            }

            $row->orderBy('tahun', 'DESC')->orderBy('start_dt', 'DESC');
            $sidang = $row->get();

            //Kategori
            $data = Bahagian::join('soalan_parlimen', 'kod_bahagian.id_bahagian', 'soalan_parlimen.kod_bahagian');

            if (!empty($request->lj_tanya)) {
                $data->where('j_tanya', $request->lj_tanya);
            }
            if (!empty($request->lj_dewan)) {
                $data->where('j_dewan', $request->lj_dewan);
            }
            if (!empty($request->ljid_sidang)) {
                $data->where('id_sidang', $request->ljid_sidang);
            }

            $data->groupBy('kod_bahagian.id_bahagian')->distinct();
            $kategori = $data->get();

            //Soalan
            $datas = SoalanParlimen::where('soalan_id', '<>', '')->where('is_deleted', 0);

            if ($type == 'B') {
                $datas->where('kod_bahagian', Auth::user()->id_bahagian);
            }
            if (!empty($request->l_cari)) {
                $datas->where('soalan', 'LIKE', '%' . $request->l_cari . '%');
            }
            if (!empty($request->lj_tanya)) {
                $datas->where('j_tanya', $request->lj_tanya);
            }
            if (!empty($request->lj_dewan)) {
                $datas->where('j_dewan', $request->lj_dewan);
            }
            if (!empty($request->ljid_sidang)) {
                $datas->where('id_sidang', $request->ljid_sidang);
            }
            if (!empty($request->lj_kategori)) {
                $datas->where('kod_bahagian', $request->lj_kategori);
            }
            if (!empty($request->lj_status)) {
                if ($request->lj_status == '9') {
                    $datas->where('status', 0);
                } else {
                    $datas->where('status', $request->lj_status);
                }
            }

            $datas->orderBy('tkh_soalan', 'DESC');
            $soalan = $datas->paginate(10);
        }

        // dd($pegawai);
        return view('soalan/backlog/index', compact('usermenu', 'sidang', 'kategori', 'soalan'));
    }

    public function form(Request $request)
    {
        // dd($request->all());
        $usermenu = TableMenuUser::where('menu_id', 32)->where('id_kakitangan', Auth::user()->id_kakitangan)->first();

        // dd($usermenu);

        $tanya = KodPertanyaan::get();

        $kategori = KodKategori::where('status', 0)->orderBy('kod_kategori')->get();

        $sub = KodKategoriSub::where('status', 0)->get();

        if (!empty($request->ids)) {
            $soalan = SoalanParlimen::find($request->ids);
            // dd($soalan);

            if ($soalan->j_dewan == 1) {
                $ahli = AhliParlimen::join('kod_parlimen', 'ahliparlimen.kod_kaw_ap', 'kod_parlimen.p_kod')->where('type', 'AP')->get();
            } else {
                $ahli = AhliParlimen::where('type', 'AD')->get();
            }
            $sidang = KodSidang::where('j_dewan', $soalan->j_dewan)->get();
        } else {
            $soalan = '';
            $sidang = '';
            $ahli = '';
        }

        // dd($sub);

        return view('soalan/backlog/form', compact('usermenu', 'tanya', 'kategori', 'sub', 'soalan', 'sidang', 'ahli'));
    }

    public function search(Request $request)
    {
        // dd($request->all());

        if ($request->l_type == '1') {
            $sidang = KodSidang::where('status', 0)->where('j_dewan', 1)->orderBy('tahun', 'DESC')->orderBy('start_dt', 'DESC')->get();

            // $ahli = AhliParlimen::join('kod_parlimen', 'ahliparlimen.kod_kaw_ap', 'kod_parlimen.p_kod')->where('type', 'AP')->orderBy('kod_kaw_ap')->get();
        } else if ($request->l_type == '2') {
            $sidang = KodSidang::where('status', 0)->where('j_dewan', 2)->orderBy('tahun', 'DESC')->orderBy('start_dt', 'DESC')->get();

            // $ahli = AhliParlimen::where('type', 'AD')->get();
        }
        // dd($ahli);
        return response()->json([$sidang]);
    }

    public function lookup(Request $request)
    {
        // dd($request->all());
        $sidang = KodSidang::find($request->sidang);
        // dd($sidang);
        $type = $sidang->j_dewan;
        if ($sidang->j_dewan == '1') {
            $ahli = AhliParlimen::join('kod_parlimen', 'ahliparlimen.kod_kaw_ap', 'kod_parlimen.p_kod')->where('type', 'AP')->whereYear('tkh_mula', '<=', $sidang->tahun)->whereYear('tkh_tamat', '>=', $sidang->tahun)->orderBy('kod_kaw_ap')->get();
        } else if ($sidang->j_dewan == '2') {
            $ahli = AhliParlimen::where('type', 'AD')->get();
        }

        return response()->json([$type, $ahli]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $user = Auth::user()->id_kakitangan;

        if (empty($request->ids)) {

            $soalan_id = date('Ymd') . "-" . uniqid();

            $soalan = new SoalanParlimen();
            $soalan->soalan_id = $soalan_id;
            $soalan->type_soalan = 'B';
            $soalan->tkh_soalan = $request->tkh_soalan;
            $soalan->no_soalan = $request->no_soalan;
            $soalan->j_tanya = $request->j_tanya;
            $soalan->j_tanya_det = $request->j_tanya_det;
            $soalan->j_dewan = $request->l_type;
            $soalan->id_sidang = $request->id_sidang;
            $soalan->s_oleh = $request->nama_ap;
            $soalan->j_kategori = $request->j_kategori;
            $soalan->soalan = $request->soal;
            $soalan->jawapan = $request->jwb;
            $soalan->soalan_oleh = $request->ahli_parlimen;
            $soalan->soalan_kawasan = $request->kawasan_parlimen;
            $soalan->tkh_jwb_parlimen = $request->tkh_jwb_parlimen;
            $soalan->menteri = $request->menteri;
            $soalan->create_dt = now();
            $soalan->create_by = $user;
            $soalan->update_dt = now();
            $soalan->update_by = $user;
            $soalan->is_deleted = 0;
            $soalan->status = 2;

            $soalan->save();
        } else {
            $data = array(
                'tkh_soalan' => $request->tkh_soalan,
                'no_soalan' => $request->no_soalan,
                'j_tanya' => $request->j_tanya,
                'j_tanya_det' => $request->j_tanya_det,
                'j_dewan' => $request->l_type,
                'id_sidang' => $request->id_sidang,
                's_oleh' => $request->nama_ap,
                'j_kategori' => $request->j_kategori,
                'soalan' => $request->soal,
                'jawapan' => $request->jwb,
                'soalan_oleh' => $request->ahli_parlimen,
                'soalan_kawasan' => $request->kawasan_parlimen,
                'tkh_jwb_parlimen' => $request->tkh_jwb_parlimen,
                'menteri' => $request->menteri,
                'update_dt' => now(),
                'update_by' => $user,
            );

            SoalanParlimen::where('soalan_id', $request->ids)->update($data);
        }

        return response()->json('OK');
    }
}
