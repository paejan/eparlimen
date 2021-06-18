@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

<script language="javascript">
function do_close(){
  var pathname = window.location.pathname.split("/");
  var filename = pathname[pathname.length-1];
  window.location = '/utiliti/'+filename;
}
function do_hapus(ID){
	swal({
		title: 'Adakah anda pasti untuk menghapuskan data ini?',
		//text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Teruskan',
		cancelButtonText: 'Tidak, Batal!',
		reverseButtons: true
	}).then(function () {
		$.ajax({
			url:'/utiliti/kakitangan/delete/'+ID, //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			/*beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
				$('.dispmodal').css('opacity', '.5');
			},*/
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Maklumat telah berjaya dihapuskan',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
						reload = window.location;
						window.location = reload;
					});
				} else if(data=='ERR'){
					swal({
					  title: 'Amaran',
					  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
					  type: 'error',
					  confirmButtonClass: "btn-warning",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					});
				}
			}
		});
	});
}
function do_reset(ID){
  // alert(ID);
	swal({
		title: 'Adakah anda pasti untuk reset katalaluan ini?',
		//text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Teruskan',
		cancelButtonText: 'Tidak, Batal!',
		reverseButtons: true
	}).then(function () {
		$.ajax({
			url:'/utiliti/kakitangan/reset/'+ID, //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			/*beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
				$('.dispmodal').css('opacity', '.5');
			},*/
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Katalaluan pengguna telah diset semula',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
						refresh = window.location;
						window.location = refresh;
					});
				} else if(data=='ERR'){
					swal({
					  title: 'Amaran',
					  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
					  type: 'error',
					  confirmButtonClass: "btn-warning",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					});
				}
			}
		});
	});
}

function do_page()
{
    var bahagian = $('#bahagian').val();
    var kat = $('#kat').val();
    var status = $('#status').val();
    var carian = $('#carian').val();

    var pathname = window.location.pathname.split("/");
    var filename = pathname[pathname.length-1];

    // alert(bahagian + kat + status + carian);
    if(bahagian.trim()=='' && kat.trim()=='' && status.trim()=='' && carian.trim()==''){
      window.location = '/utiliti/'+filename;
    } else {
      window.location = '/utiliti/'+filename+'?bahagian='+bahagian+'&status='+status+'&kat='+kat+'&carian='+carian;
    }
}

</script>
@php
$bahagian=isset($_REQUEST["bahagian"])?$_REQUEST["bahagian"]:"";
$status=isset($_REQUEST["status"])?$_REQUEST["status"]:"";
$kat=isset($_REQUEST["kat"])?$_REQUEST["kat"]:"";
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
@endphp
		<div class="box" style="background-color:#F2F2F2">
      <div class="box-body">
        <div class="x_panel">
			    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000"><b>SENARAI MAKLUMAT PENGGUNA & KAKITANGAN @if(Request::route()->getName() != 'utiliti/kakitangan') (Tidak Aktif)  @endif</b></font></h6>
          </header>
			  </div>
      </div>
      <br />
      <div class="box-body">
        @csrf
        <div class="form-group">
          <div class="col-md-4">
            <select name="bahagian" id="bahagian" onchange="do_page()" class="form-control" title="Sila pilih maklumat untuk carian">
              <option value="">Semua Bahagian</option>
              @foreach($bah as $b)
              <option value="{{ $b->id_bahagian }}" @php if($b->id_bahagian==$bahagian){ print 'selected'; } @endphp>{{ $b->nama_bahagian }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <select name="status" id="status" onchange="do_page()" class="form-control" title="Sila pilih maklumat untuk carian">
              <option value="">Semua Ketegori Pengguna</option>
              <option value="A" @php if($status == 'A'){ print 'selected'; } @endphp>Administrator</option>
              <option value="U" @php if($status == 'U'){ print 'selected'; } @endphp>Urusetia Parlimen</option>
              <option value="B" @php if($status == 'B'){ print 'selected'; } @endphp>Penyelaras Bahagian</option>
              <option value="P" @php if($status == 'P'){ print 'selected'; } @endphp>Pegawai Bertugas</option>
              <option value="D" @php if($status == 'D'){ print 'selected'; } @endphp>Pemandu</option>
            </select>
          </div>
          <div class="col-md-2">
            <select name="kat" id="kat" onchange="do_page()" class="form-control" title="Sila pilih maklumat untuk carian">
              <option value="">Status Pengguna</option>
              @if(Request::route()->getName() == 'utiliti/kakitangan')
              <option value="0" @php if($kat == '0'){ print 'selected'; } @endphp>Aktif</option>
              @endif
              <option value="1" @php if($kat == '1'){ print 'selected'; } @endphp>Tidak Aktif</option>
              <option value="99" @php if($kat == '99'){ print 'selected'; } @endphp>Dihapuskan</option>
            </select>
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
          </div>

          <div class="col-md-2" align="right">
            <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()">
            <i class="fa fa-search"></i> Carian</button>
            @if(Request::route()->getName() == 'utiliti/kakitangan')
            <a href="/utiliti/kakitangan/form" data-toggle="modal" data-target="#myModal" title="Tambah profil kakitangan" class="fa" data-backdrop="static">
              <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
              <i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah</font></button>
            </a>
            @endif
          </div>
        </div>
      </div>
      <div align="right" style="padding-right:10px"><b>{{ $staff->total() }} rekod dijumpai</b></div>
      <div class="box-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
              <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
              <th width="20%"><font color="#000000"><div align="left">Nama Pengguna</div></font></th>
              <th width="15%"><font color="#000000"><div align="left">Jawatan</div></font></th>
              <th width="20%"><font color="#000000"><div align="left">Bahagian/Jabatan</div></font></th>
              <th width="15%"><font color="#000000"><div align="left">Kategori Pengguna</div></font></th>
              <th width="10%"><font color="#000000"><div align="left">Status</div></font></th>
              <th width="10%"><font color="#000000"><div align="left">ID</div></font></th>
              <th width="5%"><font color="#000000"><div align="left">Menu</div></font></th>
            </tr>
          </thead>
          <tbody>
            @php $bil = $staff->perPage()*($staff->currentPage()-1) @endphp
            @foreach($staff as $s)
            @php
            if($s->type == 'A'){
              $cat = 'Pengurus Sistem';
            } else if ($s->type == 'U') {
              $cat = 'Urusetia Parlimen';
            } else if ($s->type == 'B') {
              $cat = 'Penyelaras Bahagian';
            } else if ($s->type == 'D') {
              $cat = 'Pemandu';
            } else {
              $cat = 'Pegawai Bertugas';
            }

            @endphp
            <tr>
              <td valign="top" align="right">{{ ++$bil }}.</td>
              <td align="left" valign="top">
                <a href="/utiliti/kakitangan/form?ids={{ $s->id_kakitangan }}" data-toggle="modal" data-target="#myModal">{{ $s->nama_kakitangan }}</a>&nbsp;
              </td>
              <td valign="top">{{ $s->jawatan_kakitangan }}&nbsp;</td>
              <td valign="top">{{ optional($s->bahagian)->nama_bahagian }}&nbsp;</td>
              <td valign="top">{{ $cat }} &nbsp;</td>
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
              </td>
              <td valign="top">{{ $s->userid }}&nbsp;</td>
              <td align="center">
              @if($s->type <> 'P' && $s->is_delete == 0)
                  <a href="/utiliti/kakitangan/menus?ids={{ $s->id_kakitangan }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Kakitangan" class="fa" data-backdrop="static">
                  <img src="{{ asset('images/btn_edit.png') }}" /></a>
              @endif
              @if($s->pass <> md5($s->userid))
                  <i class="fa fa-lock" onclick="do_reset('{{ $s->id_kakitangan }}')" style="cursor:pointer" title="Reset semula kata laluan pengguna"></i>
              @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div align="center" class="d-flex justify-content-center">
      {!! $staff->appends(['bahagian'=>$bahagian,'status'=>$status,'kat'=>$kat,'carian'=> $carian])->render() !!}
    </div>
@endsection
