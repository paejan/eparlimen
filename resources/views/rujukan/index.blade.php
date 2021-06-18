@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_view(doc_id)
{
  // alert(doc_id);
  window.location = "/rujukan/view/"+doc_id;
}

function do_page()
{
  var carian = $('#carian').val();
  // alert(carian);
  var pathname = window.location.pathname;

  if(carian.trim()==''){
    window.location = pathname;
  } else {
    window.location = pathname+'?carian='+carian;
  }
}

function do_cetak(doc_id)
{
  window.open("/rujukan/cetak/"+doc_id);
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
            <h6 class="panel-title"><font color="#000000"><b>SENARAI DOKUMEN RUJUKAN</b></font></h6> 
          </header>
        </div>
      </div>            
      <br />
      <div class="box-body">
        <div class="form-group">
          <label class="col-md-1 control-label" for="inputDefault">Carian</label>
          <div class="col-md-3">
            <input type="text" class="form-control" id="carian" name="carian" value="{{$carian}}">
          </div>
          <label class="col-md-3 control-label" for="inputDefault"> </label>
          <div class="col-md-5" align="right">
            <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
          </div>
        </div>                    
			</div>
      <div align="right" style="padding-right:10px"><b>{{ $docs->total() }} rekod dijumpai</b></div>
      <div class="box-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
              <th width="5%"><font color="#000000"><div align="center">#</div></font></th>
              <th width="45%"><font color="#000000"><div align="center">Maklumat Kategori</div></font></th>
              <th width="15%"><font color="#000000"><div align="center">Tarikh Kemaskini</div></font></th>
              <th width="10%"><font color="#000000"><div align="center">Status</div></font></th>
              <th width="5%"><font color="#000000"><div align="center">Tindakan</div></font></th>
            </tr>
          </thead>
          <tbody>
            @php $bil = $docs->perPage()*($docs->currentPage()-1) @endphp
            @foreach($docs as $doc) 
            <tr>
              <td align="center">{{ ++$bil }}</td>
              <td align="left"><label style="cursor:pointer" onclick="do_view('{{ $doc->doc_id }}')">{{ $doc->dokumen_tajuk }}</label></td>
              <td align="center">{{ $doc->update_dt }}</td>
              <td align="center" class="actions">
              @if($doc->doc_status == 0)<span class="label label-primary">AKTIF</span>
              @else<span class="label label-danger">TIDAK AKTIF</span>
              @endif
              </td>
              <td class="actions" align="center">
                <img src="images/btn_log-manager_bg.gif" style="cursor:pointer" width="25" height="25" onclick="do_view('{{ $doc->doc_id }}')" title="Paparan maklumat dokumen rujukan" />
                <img src="images/printer.png" style="cursor:pointer" width="23" height="23" onclick="do_cetak('{{ $doc->doc_id }}')" title="Cetakan maklumat dokumen rujukan" />
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
		</div>
  </div>
  <div align="center" class="d-flex justify-content-center">
    {!! $docs->appends(['carian'=>$carian])->render() !!}
  </div>
</div>    

          
@endsection