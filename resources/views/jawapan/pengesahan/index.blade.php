@extends('components.page')

@section('content')
<link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<script language="javascript">  
function do_cetak(id,ty){
  if(confirm("Adakah anda pasti untuk membuat cetakan kepada soalan/jawapan ini.")){
    window.open('/soalan/jawapan_kelulusan/cetak/'+id+'?rpt_type='+ty);
  }
}

function do_page()
{
  var lj_tanya = $('#lj_tanya').val();
  var lj_dewan = $('#lj_dewan').val();
  var ljid_sidang = $('#ljid_sidang').val();
  var lj_kategori = $('#lj_kategori').val();
  var l_cari = $('#l_cari').val();

  if(lj_tanya.trim() == '' && lj_dewan.trim() == '' && ljid_sidang.trim() == '' && lj_kategori.trim() == '' && l_cari.trim() == ''){
    window.location = '/soalan/jawapan_kelulusan'
  } else {
    window.location = '/soalan/jawapan_kelulusan?lj_tanya='+lj_tanya+'&lj_dewan='+lj_dewan+'&ljid_sidang='+ljid_sidang+'&lj_kategori='+lj_kategori+'&l_cari='+l_cari;
  }
}
</script>
@php
$l_cari=isset($_REQUEST["l_cari"])?$_REQUEST["l_cari"]:"";
$lj_tanya=isset($_REQUEST["lj_tanya"])?$_REQUEST["lj_tanya"]:"";
$lj_dewan=isset($_REQUEST["lj_dewan"])?$_REQUEST["lj_dewan"]:"";
$ljid_sidang=isset($_REQUEST["ljid_sidang"])?$_REQUEST["ljid_sidang"]:"";
$lj_kategori=isset($_REQUEST["lj_kategori"])?$_REQUEST["lj_kategori"]:"";
$lj_status=isset($_REQUEST["lj_status"])?$_REQUEST["lj_status"]:"";
@endphp

    <div class="box" style="background-color:#F2F2F2">
      <div class="box-body">
        <div class="x_panel">
          <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000"><b>EMAKAN JAWAPAN - TIMBALAN KETUA PENGARAH</b></font></h6> 
          </header>
        </div>
      </div>            
      <br />
      <div class="box-body">
        <div class="form-group">
          <div class="col-md-2">
            <select name="lj_tanya" id="lj_tanya" onchange="do_page()" class="form-control">
              <option value="">Jenis Pertanyaan-</option>
              <option value="1" @if($lj_tanya == '1') selected @endif>Bertulis</option>
              <option value="2" @if($lj_tanya == '2') selected @endif>Lisan</option>
            </select>
          </div>
          <div class="col-md-2">
            <select name="lj_dewan" id="lj_dewan" onchange="do_page()" class="form-control">
              <option value="">Jenis Dewan</option>
              <option value="1" @if($lj_dewan == '1') selected @endif>Dewan Rakyat</option>
              <option value="2" @if($lj_dewan == '2') selected @endif>Dewan Negara</option>
            </select>
          </div>
    
          <div class="col-md-8">
            <select name="ljid_sidang" id="ljid_sidang" onchange="do_page()" class="form-control">
              <option value="">Maklumat Persidangan</option>
              @foreach($sidang as $sid)
              <option value="{{ $sid->id_sidang }}" @if($ljid_sidang == $sid->id_sidang) selected @endif>{{ $sid->persidangan }} - [{{ strtoupper($sid->dewan) }}]</option>
              @endforeach
            </select>
          </div>
        </div>
    
        <div class="form-group">
          <div class="col-md-6">
            <select name="lj_kategori" id="lj_kategori" onchange="do_page()" class="form-control">
              <option value="">-- Sila pilih --</option>
              @foreach($kategori as $kat)
              <option value="{{ $kat->id_kategori }}" @if($lj_kategori == $kat->id_kategori) selected @endif>{{ $kat->nama_kategori }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" id="l_cari" name="l_cari" value="{{ $l_cari }}" placeholder="Maklumat Carian">
          </div>
          <div class="col-md-2" align="right">
            <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
          </div>
        </div>
      </div>
      <div align="right" style="padding-right:10px"><b>{{ $soalan->total() }} rekod dijumpai</b></div>
      <div class="box-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
              <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
              <th width="55%"><font color="#000000"><div align="left">Soalan</div></font></th>
              <th width="10%"><font color="#000000"><div align="left">Jenis Pertanyaan</div></font></th>
              <th width="10%"><font color="#000000"><div align="left">Dewan Persidangan</div></font></th>
              <th width="15%"><font color="#000000"><div align="left">Bahagian<br /><i>[Kategori]</i></div></font></th>
              <th width="5%"><font color="#000000"><div align="left">Tindakan</div></font></th>
            </tr>
          </thead>
          <tbody>
            @php $bil = $soalan->perPage()*($soalan->currentPage()-1) @endphp
            @foreach($soalan as $soal)
            <tr>
              <td align="center" valign="top">{{ ++$bil }}.</td>
              <td align="left" valign="top">
              <b>No. Soalan: {{ $soal->no_soalan }} bagi tahun {{ substr($soal->tkh_soalan,0,4) }}</b>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(Tarikh Jawapan Di Parlimen : {{ date('d/m/Y',strtotime($soal->tkh_jwb_parlimen)) }})</i><br />
              <a href="/soalan/jawapan_kelulusan/edit/{{ $soal->soalan_id }}">{!! $soal->soalan !!}
              </a>
              </td>
              <td align="center" valign="top">{{ $soal->tanya->pertanyaan }}</td>
              <td valign="top" align="center">
              <b>{{ $soal->dewan->dewan }}</b>
              </td>
              <td valign="top" align="center">{{ $soal->bahagian->nama_bahagian }}
              <br />
              <i>[{{ $soal->kategori->nama_kategori }}]</i></td>
              <td valign="top" align="center">
              <img src="{{ asset('images/printer.png') }}" border="0" width="25" height="24" title="Cetak Jawapan" style="cursor:pointer" onclick="do_cetak('{{ $soal->soalan_id }}')" />&nbsp;
                  <img src="{{ asset('images/icon_office_word.gif') }}" border="0" width="25" height="24" title="Cetak Jawapan" style="cursor:pointer" onclick="do_cetak('{{ $soal->soalan_id }}','WORD')" />&nbsp;
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
<!-- DataTables -->
@endsection