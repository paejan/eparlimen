@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

<script>

function do_close()
{ 
  var pathname = window.location.pathname.split("/");
  var filename = pathname[pathname.length-1];
  
  window.location = '/utiliti/'+filename;
}

function do_page()
{
  var lj_dewan = $('#lj_dewan').val();
  var ctahun = $('#ctahun').val();

  var pathname = window.location.pathname.split("/");
  var filename = pathname[pathname.length-1];

  // alert(ctahun);
  if(lj_dewan.trim()=='' && ctahun.trim()==''){
    window.location = '/utiliti/'+filename;
  } else {
    window.location = '/utiliti/'+filename+'?lj_dewan='+lj_dewan+'&ctahun='+ctahun;
  }
}
</script>
@php
$lj_dewan=isset($_REQUEST["lj_dewan"])?$_REQUEST["lj_dewan"]:"";
$ctahun=isset($_REQUEST["ctahun"])?$_REQUEST["ctahun"]:"";
@endphp
		<div class="box" style="background-color:#F2F2F2">
      <div class="box-body">
        <input type="hidden" name="id" value="" />
        <div class="x_panel">
          <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <div class="panel-actions">
              <!--<a href="#" class="fa fa-caret-down"></a>
              <a href="#" class="fa fa-times"></a>-->
            </div>
            <h6 class="panel-title"><font color="#000000"><b>SENARAI MAKLUMAT PERSIDANGAN</b></font></h6> 
          </header>
        </div>
      </div>            
      <br />
      <div class="box-body">
        <div class="form-group">
          <div class="col-md-2 col-xs-6">
            <select name="lj_dewan" id="lj_dewan" onchange="do_page()" class="form-control" title="Sila pilih maklumat untuk carian">
              <option value="">Semua Dewan</option>
              @foreach($dewan as $dew)
              <option value="{{$dew->j_dewan}}" @if($lj_dewan==$dew->j_dewan) selected @endif>{{ $dew->dewan }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <select name="ctahun" id="ctahun" onchange="do_page()" class="form-control" title="Sila pilih maklumat untuk carian">
              <option value="">Semua Tahun</option>
              @for($y = date("Y")+1; $y>='2008'; $y--)
              <option value="{{ $y }}" @if($y==$ctahun) selected @endif>{{ $y }}</option>
              @endfor
            </select>
          </div>        
            <div class="col-md-8" align="right">
              {{-- <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_close()">
              <i class="fa fa-search"></i> Carian</button> --}}
              <a href="/utiliti/sidang/form" data-toggle="modal" data-target="#myModal" title="Tambah maklumat persidangan" class="fa" data-backdrop="static">
                <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
                <i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah</font></button>
              </a> 
            </div>
          </div>                    
			  </div>
        <div align="right" style="padding-right:10px"><b>{{ $sidang->total() }} rekod dijumpai</b></div>
        <div class="box-body">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
                <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
                <th width="30%"><font color="#000000"><div align="left">Maklumat Persidangan</div></font></th>
                <th width="15%"><font color="#000000"><div align="left">Nama Dewan</div></font></th>
                <th width="10%"><font color="#000000"><div align="left">Tarikh Mula</div></font></th>
                <th width="10%"><font color="#000000"><div align="left">Tarikh Akhir</div></font></th>
                <th width="5%"><font color="#000000"><div align="left">Tahun</div></font></th>
                <th width="10%"><font color="#000000"><div align="left">Status</div></font></th>
                <th width="5%"><font color="#000000"><div align="left"></div></font></th>
              </tr>
            </thead>
            <tbody>
              @php $bil = $sidang->perPage()*($sidang->currentPage()-1) @endphp
              @foreach($sidang as $s)
              <tr>
                <td valign="top" align="right">{{ ++$bil }}.</td>
                <td align="left" valign="top">{{ $s->persidangan }}&nbsp;</td>
                <td valign="top">{{ $s->dewan->dewan }}&nbsp;</td>
                <td valign="top">{{ date('d/m/Y', strtotime($s->start_dt)) }}&nbsp;</td>
                <td valign="top">{{ date('d/m/Y', strtotime($s->end_dt)) }}&nbsp;</td>
                <td valign="top" align="center">{{ $s->tahun }}&nbsp;</td>
                <td valign="top" align="center">
                  @if($s->is_delete == 1)
                  <span class="label label-danger">TELAH DIHAPUSKAN</span>
                  @else
                    @if($s->status == 0)
                    <span class="label label-primary">AKTIF</span>
                    @else
                    <span class="label label-danger">TIDAK AKTIF</span>
                    @endif
                  @endif
                &nbsp;</td>
                <td align="center">
                  <a href="/utiliti/sidang/form?ids={{ $s->id_sidang }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Persidangan" class="fa" data-backdrop="static">
                  <img src="{{ asset('images/btn_edit.png') }}" /></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div align="center" class="d-flex justify-content-center">
      {!! $sidang->appends(['lj_dewan'=>$lj_dewan,'ctahun'=>$ctahun])->render() !!}
    </div>
  </div>

@endsection