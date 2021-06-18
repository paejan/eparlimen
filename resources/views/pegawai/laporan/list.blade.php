@extends('components.page')

@section('content')
@include('components.dateformat')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script language="javascript">
function do_page()
{
  var lj_dewan = $('#lj_dewan').val();
  var id_sidang = $('#id_sidang').val();
  var pathname = window.location.pathname;

  // alert(pathname);
  if(lj_dewan.trim() == '' && id_sidang.trim() == '') {
    window.location = pathname;
  } else {
    window.location = pathname+'?lj_dewan='+lj_dewan+'&id_sidang='+id_sidang;
  }
}

function do_cetak(id)
{
  window.open('/peg_bertugas/cetak/'+id);
}
</script>
@php
$lj_dewan=isset($_REQUEST["lj_dewan"])?$_REQUEST["lj_dewan"]:"";
$lj_sidang=isset($_REQUEST["id_sidang"])?$_REQUEST["id_sidang"]:"";
@endphp
    <div class="box" style="background-color:#F2F2F2">
      <div class="box-body">
        <div class="x_panel">
          <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000"><b>LAPORAN PEGAWAI BERTUGAS</b></font></h6> 
          </header>
        </div>
      </div>            
      <br />

      <div class="box-body">
        <div class="form-group">
          <div class="col-md-2">
            <select name="lj_dewan" id="lj_dewan" onchange="do_page()" class="form-control" title="Sila pilih maklumat untuk carian">
              <option value="">Semua Dewan</option>
              @foreach ($dewan as $dewan)
              <option value="{{ $dewan->j_dewan }}" @if($lj_dewan == $dewan->j_dewan) selected @endif>{{ $dewan->dewan }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-8">
            <select name="id_sidang" id="id_sidang" onchange="do_page()" class="form-control" title="Sila pilih maklumat untuk carian">
              <option value="">Semua Persidangan</option>
              @foreach ($sidang as $sidang)
              <option value="{{ $sidang->id_sidang }}" @if($lj_sidang == $sidang->id_sidang) selected @endif>{{ $sidang->persidangan }} - [ {{ strtoupper($sidang->dewan->dewan) }} ]</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-1" align="right">
            <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
          </div>
        </div>                    
      </div>

      <div align="right" style="padding-right:10px"><b>{{ $laporan->total() }} rekod dijumpai</b></div>
    
      <div class="box-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
          <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
            <th width="15%"><font color="#000000"><div align="left">Tarikh Persidangan</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Hari</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Dewan Persidangan</div></font></th>
            <th width="50%"><font color="#000000"><div align="left">Nama Pegawai</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Cetak</div></font></th>
          </tr>
          </thead>
          <tbody>
            @php $bil = $laporan->perPage()*($laporan->currentPage()-1) @endphp
            @foreach ($laporan as $lapor)
            @php
              $cnt_doc=0;
              if(!empty($lj_sidang)){
                $cnt_doc = optional($lapor->laporan)->where('jadual_tugas.id_sidang',$lj_sidang);
              } else {
                $cnt_doc = $lapor->laporan;
              }

              $pegawai = "";
              if(!empty($lapor->pegawai1)){ $pegawai .= " - " . $lapor->p1->nama_kakitangan . "<br>"; }
              if(!empty($lapor->pegawai2)){ $pegawai .= " - " . $lapor->p2->nama_kakitangan . "<br>"; }
              if(!empty($lapor->pegawai3)){ $pegawai .= " - " . $lapor->p3->nama_kakitangan; }
            @endphp
            <tr>
              <td align="center">{{ ++$bil }}.&nbsp;</td>
              <td align="center">
                @if(!empty($pegawai) && ($type=='U' || $type=='A' || $type=='P' || $type=='B'))
                <a href="/peg_bertugas/senarai_laporan_peg/view/{{ $lapor->jad_id }}">{{ DisplayDate($lapor->jad_tkh) }}</a>
                @else
                {{ DisplayDate($lapor->jad_tkh) }}
                @endif
                <br>{{ $lapor->jad_id }}
              </td>
              <td align="center">{{ nama_hari(date("N",strtotime($lapor->jad_tkh))) }}</td>
              <td align="center">{{ $lapor->sidang->dewan->dewan }}</td>
              <td align="left">{!! $pegawai !!}</td>
              <td align="center">
                @if (!empty($cnt_doc))
                <img src="{{ asset('images/printer.png') }}" title="Papar Laporan Pegawai Bertugas" style="cursor:pointer" onclick="do_cetak('{{ $lapor->jad_id }}')" />&nbsp;
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
		</div>
    <div align="center" class="d-flex justify-content-center">
      {!! $laporan->appends(['lj_dewan'=>$lj_dewan,'id_sidang'=>$lj_sidang])->render() !!}
    </div>
  </div>
<!-- DataTables -->

@endsection