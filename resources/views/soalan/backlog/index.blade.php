@extends('components.page')

@section('content')

<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('cal/script/wz_tooltip.js') }}"></script>
<script language="javascript">
function do_cetak(id){
  if(confirm("Adakah anda pasti untuk membuat cetakan kepada soalan/jawapan ini.")){
    window.open("/soalan/daftar/cetak/"+id);
  }
}

function do_page()
{
  var lj_tanya = $('#lj_tanya').val();
  var lj_dewan = $('#lj_dewan').val();
  var ljid_sidang = $('#ljid_sidang').val();
  var l_cari = $('#l_cari').val();

  var pathname = window.location.pathname;

  // alert(pathname);
  if(lj_tanya.trim() == '' && lj_dewan.trim() == '' && ljid_sidang.trim() == '' && lj_kategori.trim() == '' && lj_status.trim() == '' && l_cari.trim() == '') {
    window.location = pathname;
  } else {
    window.location = pathname+'?lj_tanya='+lj_tanya+'&lj_dewan='+lj_dewan+'&ljid_sidang='+ljid_sidang+'&lj_kategori='+lj_kategori+'&lj_status='+lj_status+'&l_cari='+l_cari;
  }
}

function do_create()
{
  var pathname = window.location.pathname;
  window.location = pathname+"/form";
}
</script>
@php
$lj_tanya=isset($_REQUEST["lj_tanya"])?$_REQUEST["lj_tanya"]:"";
$lj_dewan=isset($_REQUEST["lj_dewan"])?$_REQUEST["lj_dewan"]:"";
$ljid_sidang=isset($_REQUEST["ljid_sidang"])?$_REQUEST["ljid_sidang"]:"";
$l_cari=isset($_REQUEST["l_cari"])?$_REQUEST["l_cari"]:"";
@endphp
  <div class="box" style="background-color:#F2F2F2">
    <div class="box-body">
      <input type="hidden" name="soalan_id" value="" />
      <div class="x_panel">
        <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
          <h6 class="panel-title"><font color="#000000"><b>SENARAI MAKLUMAT BACKLOG SOALAN</b></font></h6>
        </header>
      </div>
    </div>
    <br />
    <div class="box-body">
    @csrf
      <div class="form-group">
        <div class="col-md-3">
          <select name="lj_tanya" id="lj_tanya" onchange="do_page()" class="form-control">
            <option value="">Jenis Pertanyaan</option>
            <option value="1" @if($lj_tanya == 1) selected @endif>Bukan Lisan</option>
            <option value="2" @if($lj_tanya == 2) selected @endif>Lisan</option>
          </select>
        </div>

        <div class="col-md-3">
          <select name="lj_dewan" id="lj_dewan" onchange="do_page()" class="form-control">
            <option value="">Jenis Dewan</option>
            <option value="1" @if($lj_dewan == 1) selected @endif>Dewan Rakyat</option>
            <option value="2" @if($lj_dewan == 2) selected @endif>Dewan Negara</option>
          </select>
        </div>

        <div class="col-md-8">
          <select name="ljid_sidang" id="ljid_sidang" onchange="do_page()" class="form-control">
            <option value="">Maklumat Persidangan</option>
            @foreach($sidang as $sid)
            <option value="{{ $sid->id_sidang }}" @if($ljid_sidang == $sid->id_sidang) selected @endif>{{ $sid->persidangan }} - [{{ strtoupper($sid->dewan) }}]</option>
            @endforeach
            </select>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6">
          <input type="text" class="form-control" id="l_cari" name="l_cari" value="{{ $l_cari }}" placeholder="Maklumat Carian">
        </div>

        <div class="col-md-6" align="right">
          <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
          <button type="button" class=" mb-xs mt-xs mr-xs btn btn-primary" onclick="do_create()"><i class="fa fa-plus"></i> Tambah</button>
        </div>
      </div>
    </div>
    <div align="right" style="padding-right:10px"><b>{{ $soalan->total() }} rekod dijumpai</b></div>
    <div class="box-body">
      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Tarikh Jawapan<br />(No. Soalan)</div></font></th>
            <th width="50%"><font color="#000000"><div align="left">Soalan</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Dewan Persidangan</div></font></th>
            <th width="15%"><font color="#000000"><div align="left">Kategori</div></font></th>
            <th width="5%"><font color="#000000"><div align="left">Tindakan</div></font></th>
          </tr>
        </thead>
        <tbody>
          @php $bil = $soalan->perPage()*($soalan->currentPage()-1) @endphp

          @foreach($soalan as $soal)
          <tr>
            <td align="right" valign="top">{{ ++$bil }}.</td>
            <td valign="top" align="center">@if(empty($soal->tkh_jwb_parlimen)) ?? @else {{date('d/m/Y', strtotime($soal->tkh_jwb_parlimen))}} @endif<br />
              ({{ $soal->no_soalan }})<br /><br />{{ $soal->tanya->pertanyaan }}
            </td>
            <td valign="top" align="left">
              <a href="/soalan/daftar_backlog/form?ids={{$soal->soalan_id}}">{!! nl2br($soal->soalan) !!}</a>
            </td>
            <td valign="top" align="left">{{ $soal->dewan->dewan }}</td>
            <td valign="top" align="left">
                {{ $soal->kategori->nama_kategori }}
            </td>
            <td valign="top" align="center">
              <img src="{{ asset('images/printer.png') }}" border="0" width="25" height="24" title="Cetak Jawapan" style="cursor:pointer" onclick="do_cetak('{{ $soal->soalan_id }}')" />&nbsp;
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div align="center" class="d-flex justify-content-center">
    {!! $soalan->appends(['lj_tanya'=>$lj_tanya,'lj_dewan'=>$lj_dewan,'ljid_sidang'=>$ljid_sidang,'l_cari'=>$l_cari])->render() !!}
  </div>
</div>
  <!--</div>-->
<!-- DataTables -->
@endsection
