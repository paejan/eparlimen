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
  var carian = $('#carian').val();

  var pathname = window.location.pathname.split("/");
  var filename = pathname[pathname.length-1];

  // alert(bahagian + kat + status + carian);
  if(carian.trim()==''){
    window.location = '/utiliti/'+filename;
  } else {
    window.location = '/utiliti/'+filename+'?carian='+carian;
  }
}
</script>

@php
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
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
            <h6 class="panel-title"><font color="#000000"><b>SENARAI MAKLUMAT BAHAGIAN</b></font></h6> 
          </header>
			  </div>
      </div>            
      <br />
      <div class="box-body">
        <div class="form-group">
          <label class="col-md-1 control-label" for="inputDefault">Carian</label>
          <div class="col-md-3">
            <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}">
          </div>
      
          <label class="col-md-3 control-label" for="inputDefault"></label>
          <div class="col-md-5" align="right">
            <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
            <a href="/utiliti/bahagian/form" data-toggle="modal" data-target="#myModal" title="Tambah Maklumat Bahagian" class="fa" data-backdrop="static">
              <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
              <i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah Maklumat</font></button>
            </a> 
          </div>
        </div>                    
      </div>
      <div align="right" style="padding-right:10px"><b>{{ $bahagian->total() }} rekod dijumpai</b></div>
      <div class="box-body">
        @php $bil = $bahagian->perPage()*($bahagian->currentPage()-1) @endphp
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
              <th width="7%"><font color="#000000"><div align="center">#</div></font></th>
              <th width="20%"><font color="#000000"><div align="center">Kod Bahagian</div></font></th>
              <th width="50%"><font color="#000000"><div align="center">Maklumat Bahagian</div></font></th>
              <th width="15%"><font color="#000000"><div align="center">Status</div></font></th>
              <th width="5%"><font color="#000000"><div align="center">Tindakan</div></font></th>
            </tr>
          </thead>
          <tbody>
          @foreach($bahagian as $b)
            <tr>
              <td align="center">{{ ++$bil }}</td>
              <td align="center">{{ $b->kod_bahagian }}</td>
              <td align="left">{{ $b->nama_bahagian }}</td>
              <td align="center" class="actions">
              @if(empty($b->status))
                <span class="label label-primary">AKTIF</span>
              @else
                <span class="label label-danger">TIDAK AKTIF</span>
              @endif
              </td>
              <td class="actions" align="center">
                <a href="/utiliti/bahagian/form?ids={{ $b->id_bahagian }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Bahagian" class="fa" data-backdrop="static">
                <i class="fa fa-pencil"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> 
  </div>
  <div align="center" class="d-flex justify-content-center">
    {!! $bahagian->appends(['carian'=> $carian])->render() !!}
  </div>
</div>

@endsection