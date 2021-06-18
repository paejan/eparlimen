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

  // alert(filename.trim());
  // alert(bahagian + kat + status + carian);
  if(carian.trim()==''){
    window.location = '/utiliti/'+filename;
  } else {
    window.location = '/utiliti/'+filename+'?sort=&carian='+carian;
  }
}
</script>

@php
$sort=isset($_REQUEST["sort"])?$_REQUEST["sort"]:"";
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
            <h6 class="panel-title"><font color="#000000">
              <b>
              @if(Request::route()->getName() == 'utiliti/adewan')
                SENARAI NAMA AHLI YANG BERHORMAT - DEWAN NEGARA
              @elseif(Request::route()->getName() == 'utiliti/ap')
                SENARAI NAMA AHLI DEWAN RAKYAT / AHLI PARLIMEN
              @else
                SENARAI NAMA AHLI DEWAN RAKYAT / AHLI PARLIMEN (Tidak Aktif)
              @endif
              </b></font>
            </h6> 
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
          <label class="col-md-3 control-label" for="inputDefault"> </label>
          <div class="col-md-5" align="right">
            <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()">
            <i class="fa fa-search"></i> Carian</button>
            @if(Request::route()->getName() != 'utiliti/ap_ta')
            @php
                if(Request::route()->getName() == 'utiliti/ap'){
                  $link = "/utiliti/ahli/form?type=ap";
                } else {
                  $link = "/utiliti/ahli/form?type=ad";
                }
            @endphp
            <a href="{{ $link }}" data-toggle="modal" data-target="#myModal" title="Tambah Maklumat Ahli Parlimen" class="fa" data-backdrop="static">
              <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
              <i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah Maklumat</font></button>
            </a>
            @endif
          </div>
        </div>                    
      </div>      
      <div align="right" style="padding-right:10px"><b>{{ $parlimen->total() }} rekod dijumpai</b></div>
      @if(Request::route()->getName() == 'utiliti/ap' && $parlimen->total() <> 222)
      <div align="center" style="color:#F00"><b>Maklumat ahli parlimen tidak lengkap. Sila buat penambahan bagi mamklumat ahli parlimen</b></div>
      @endif
      <div class="box-body">
        @php $bil = $parlimen->perPage()*($parlimen->currentPage()-1) @endphp
        @if(Request::route()->getName() == 'utiliti/ap')
        <!-- Ahli Dewan Rakyat -->
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
              <th width="5%"><font color="#000000"><div align="center">#</div></font></th>
              <th width="10%"><font color="#000000"><div align="center"><a href="/utiliti/ap?sort=kod&carian={{$carian}}">Kod Kawasan</a></div></font></th>
              <th width="20%"><font color="#000000"><div align="center"><a href="/utiliti/ap?sort=kaw&carian={{$carian}}">Kawasan</a></div></font></th>
              <th width="35%"><font color="#000000"><div align="center"><a href="/utiliti/ap?sort=nama&carian={{$carian}}">Nama Ahli Parlimen</a></div></font></th>
              <th width="15%"><font color="#000000"><div align="center"><a href="/utiliti/ap?sort=parti&carian={{$carian}}">Parti</a></div></font></th>
              <th width="25%"><font color="#000000"><div align="center">Tarikh Mula</div></font></th>
              <th width="5%"><font color="#000000"><div align="center">Status</div></font></th>
              <th width="5%"><font color="#000000"><div align="center">Tindakan</div></font></th>
            </tr>
          </thead>
          <tbody>
            @foreach($parlimen as $p)
            <tr>
              <td align="center">{{ ++$bil }}</td>
              <td align="center">{{ $p->kod_kaw_ap }}</td>
              <td align="left">{{ $p->p_nama }}</td>
              <td align="left">{{ $p->nama_ap }}</td>
              <td align="center">{{ $p->parti }}</td>
              <td align="center" class="actions">@if(!empty($p->tkh_mula)) {{ date('d/m/Y', strtotime($p->tkh_mula)) }} @else @endif</td>
              <td align="center" class="actions">
                @if(empty($p->status_ap))
                  <span class="label label-primary">AKTIF</span>
                @else
                  <span class="label label-danger">TIDAK AKTIF</span>
                @endif
                </td>
              <td class="actions" align="center">
                <a href="/utiliti/ahli/form?type=ap&ids={{ $p->id_ap }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Ahli Parlimen" class="fa" data-backdrop="static">
                <i class="fa fa-pencil"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Ahli Dewan Rakyat -->
        @elseif(Request::route()->getName() == 'utiliti/adewan')
        <!-- Ahli Dewan Negara -->
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
              <th width="5%"><font color="#000000"><div align="center">#</div></font></th>
              <th width="35%"><font color="#000000"><div align="center"><a href="/utiliti/adewan?sort=nama&carian={{$carian}}">Nama Ahli Dewan Negara</a></div></font></th>
              <th width="30%"><font color="#000000"><div align="center"><a href="/utiliti/adewan?sort=kaw&carian={{$carian}}">Lantikan</a></div></font></th>
              <th width="15%"><font color="#000000"><div align="center">Tarikh Lantikan</div></font></th>
              <th width="10%"><font color="#000000"><div align="center">Status</div></font></th>
              <th width="5%"><font color="#000000"><div align="center">Tindakan</div></font></th>
            </tr>
          </thead>
          <tbody>
            @foreach($parlimen as $p)
            <tr>
              <td align="center">{{ ++$bil }}</td>
              <td align="left">{{ $p->nama_ap }}</td>
              <td align="left">{{ $p->kawasan_ap }}</td>
              <td align="center" class="actions">{{ $p->tempoh }}</td>
              <td align="center" class="actions">
              @if(empty($p->status_ap))
                <span class="label label-primary">AKTIF</span>
              @else
                <span class="label label-danger">TIDAK AKTIF</span>
              @endif
              </td><td class="actions" align="center">
                <a href="/utiliti/ahli/form?type=ad&ids={{ $p->id_ap }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Ahli Dewan Negara" class="fa" data-backdrop="static">
                <i class="fa fa-pencil"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Ahli Dewan Negara -->
        @else
        <!-- Ahli Parlimen Tidak Aktif -->
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
              <th width="5%"><font color="#000000"><div align="center">#</div></font></th>
              <th width="10%"><font color="#000000"><div align="center"><a href="/utiliti/ap_ta?sort=kod&carian={{$carian}}">Kod Kawasan</a></div></font></th>
              <th width="20%"><font color="#000000"><div align="center"><a href="/utiliti/ap_ta?sort=kaw&carian={{$carian}}">Kawasan</a></div></font></th>
              <th width="45%"><font color="#000000"><div align="center"><a href="/utiliti/ap_ta?sort=nama&carian={{$carian}}">Nama Ahli Parlimen</a></div></font></th>
              <th width="10%"><font color="#000000"><div align="center">Tarikh Mula</div></font></th>
              <th width="10%"><font color="#000000"><div align="center">Tarikh Tamat</div></font></th>
              {{-- <th width="5%"><font color="#000000"><div align="center">Tindakan</div></font></th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach($parlimen as $p)
            <tr>
              <td align="center">{{ ++$bil }}</td>
              <td align="center">{{ $p->kod_kaw_ap }}</td>
              <td align="left">{{ $p->p_nama }}</td>
              <td align="left">{{ $p->nama_ap }}</td>
              <td align="center" class="actions">@if(!empty($p->tkh_mula)) {{ date('d/m/Y', strtotime($p->tkh_mula)) }} @else @endif</td>
              <td align="center" class="actions">@if(!empty($p->tkh_tamat)) {{ date('d/m/Y', strtotime($p->tkh_tamat)) }} @else @endif</td>
              {{-- <td class="actions" align="center">
                <a href="/utiliti/ahli/form?type=ta&ids={{ $p->id_ap }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Ahli Parlimen" class="fa" data-backdrop="static">
                <i class="fa fa-pencil"></i></a>
              </td> --}}
            </tr>
            <!-- End Ahli Parlimen Tidak Aktif -->
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
    <div align="center" class="d-flex justify-content-center">
      {!! $parlimen->appends(['sort'=>$sort, 'carian'=>$carian])->render() !!}
    </div>
  </div>
@endsection