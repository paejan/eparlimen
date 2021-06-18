@extends('components.page')

@section('content')
@include('components.dateformat')
<script language="javascript">
function do_kembali(){
    window.history.back();
}

function do_simpan(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var jad_status = $('#jad_status').val();
	//var pegawai1 = $('#pegawai1').val();

	//alert("dd");
    if(jad_status.trim() == '' ){
        alert('Sila pilih status persidangan.');
        $('#jad_status').focus(); return false;
	} else {
		$.ajax({
			url:'/peg_bertugas/cal_view/update?pro=UPD', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				//$('#simpan').attr("disabled","disabled");
				//$('#emel').attr("disabled","disabled");
				//$('#hapus').attr("disabled","disabled");
				$('.dispmodal').css('opacity', '.5');
			},
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Maklumat telah berjaya dikemaskini',
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
    }
}

function do_hapus(ty){
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
			url:'/peg_bertugas/cal_view/update?pro=DEL&ty='+ty, //&datas='+datas,
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
function do_emel(){
	swal({
		title: 'Adakah anda pasti untuk menghantar emel kepada pegawai?',
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
			url:'/peg_bertugas/cal_view/email', //&datas='+datas,
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
</script>
<div class="col-md-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>{{ $title }}</b></font></h6>
    </header>
    <div class="panel-body">
        <input type="hidden" name="jad_id" value="{{ $rsData->jad_id }}">
        @csrf
        <div class="col-md-12">

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Tarikh Bertugas : </label>
                <div class="col-sm-9">{{ DisplayDate($rsData->jad_tkh) }}</div>
                </div>
            </div>
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Dewan Persidangan : </label>
                <div class="col-sm-9">{{ $rsData->sidang->dewan->dewan }}</div>
                </div>
            </div>
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Status Persidangan : </label>
                <div class="col-sm-3">
                    <select name="jad_status" id="jad_status" class="form-control">
                        <!--<option value="">-- Sila pilih --</option>-->
                        <option value="0" @if($rsData->jad_status=='0') selected @endif>Aktif</option>
                        <option value="1" @if($rsData->jad_status=='1') selected @endif>Tidak Aktif</option>
                    </select>
				</div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                    <div class="col-sm-3">
                        <label class="col-sm-10 control-label"><strong>Urusetia : </strong></label>
                        <div style="float:right"><a href="/peg_bertugas/cal_view/cari/{{ $rsData->jad_id }}?ty=urusetia&idstaff={{ $rsData->urusetia }}" data-toggle="modal" data-target="#myModal"
                        title="Selenggaran maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana">
                        <input type="button" value=".." style="height:25px" /></a></div>
                    </div>
                    <div class="col-sm-9">
                        @if(!empty($rsData->urusetia))
                        <div class="row">
                            <label class="col-sm-2 control-label">Nama : </label>
                            <label class="col-sm-10 control-label">{{ $urusetia->nama_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Bahagian : </label>
                            <label class="col-sm-10 control-label">{{ $urusetia->nama_bahagian }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Jawatan : </label>
                            <label class="col-sm-10 control-label">{{ $urusetia->jawatan_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Emel : </label>
                            <label class="col-sm-10 control-label">{{ $urusetia->email }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">No Tel & H/P : </label>
                            <label class="col-sm-10 control-label">{{ $urusetia->no_telefon }} / {{ $urusetia->no_hp }}</label>
                        </div>
                        @else
                        <div class="row">
                            <label class="col-sm-12 control-label" style="color:#F00">Sila pilih maklumat urusetia parlimen </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                    <div class="col-sm-3">
                        <label class="col-sm-10 control-label"><strong>Pemandu : </strong></label>
                        <div style="float:right"><a href="/peg_bertugas/cal_view/cari/{{ $rsData->jad_id }}?ty=pemandu&idstaff={{ $rsData->pemandu }}" data-toggle="modal" data-target="#myModal"
                        title="Selenggaran maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana">
                        <input type="button" value=".." style="height:25px" /></a></div>
                    </div>
                    <div class="col-sm-9">
                        @if (!empty($rsData->pemandu))
                        <div class="row">
                            <label class="col-sm-2 control-label">Nama : </label>
                            <label class="col-sm-10 control-label">{{ $pemandu->nama_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Bahagian : </label>
                            <label class="col-sm-10 control-label">{{ $pemandu->nama_bahagian }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Jawatan : </label>
                            <label class="col-sm-10 control-label">{{ $pemandu->jawatan_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Emel : </label>
                            <label class="col-sm-10 control-label">{{ $pemandu->email }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">No Tel & H/P : </label>
                            <label class="col-sm-10 control-label">{{ $pemandu->no_telefon }} / {{ $pemandu->no_hp }}</label>
                        </div>
                        @else
                        <div class="row">
                            <label class="col-sm-12 control-label" style="color:#F00">Sila pilih maklumat pemandu </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="form-group">
            	<div class="row">
                    <div class="col-sm-3">
                        <label class="col-sm-10 control-label"><strong>Pegawai (1) : </strong></label>
                        <div style="float:right">
                            <a href="/peg_bertugas/cal_view/cari/{{ $rsData->jad_id }}?ty=pegawai1&idstaff={{ $rsData->pegawai1 }}" data-toggle="modal" data-target="#myModal"
                            title="Selenggaran maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana">
                            <input type="button" value=".." style="height:25px" /></a>
                        </div><br /><br />
                        @if (!empty($pegawai1))
                        <div style="float:right;cursor:pointer">
                            <img src="{{ asset('images/trash.png') }}" onclick="do_hapus('1')" title="Hapus maklumat pegawai (1)" />&nbsp;
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-9">
                        @if(!empty($rsData->pegawai1))
                        <div class="row">
                            <label class="col-sm-2 control-label">Bahagian : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai1->nama_bahagian }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Nama : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai1->nama_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Jawatan : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai1->jawatan_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Emel : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai1->email }}</label>
                        </div>
                            <div class="row">
                            <label class="col-sm-2 control-label">No Tel & H/P : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai1->no_telefon }} / {{ $pegawai1->no_hp }}</label>
                        </div>
                        @else
                        <div class="row">
                            <label class="col-sm-12 control-label" style="color:#F00">Sila pilih maklumat pegawai parlimen </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                    <div class="col-sm-3">
                        <label class="col-sm-10 control-label"><strong>Pegawai (2) : </strong></label>
                        <div style="float:right">
                            <a href="/peg_bertugas/cal_view/cari/{{ $rsData->jad_id }}?ty=pegawai2&idstaff={{ $rsData->pegawai2 }}" data-toggle="modal" data-target="#myModal"
                            title="Selenggaran maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana">
                        <input type="button" value=".." style="height:25px" /></a>
                        </div><br /><br />
                        @if (!empty($pegawai2))
                        <div style="float:right;cursor:pointer">
                            <img src="{{ asset('images/trash.png') }}" onclick="do_hapus('2')" title="Hapus maklumat pegawai (2)" />&nbsp;
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-9">
                        @if(!empty($rsData->pegawai2))
                        <div class="row">
                            <label class="col-sm-2 control-label">Bahagian : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai2->nama_bahagian }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Nama : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai2->nama_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Jawatan : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai2->jawatan_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Emel : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai2->email }}</label>
                        </div>
                            <div class="row">
                            <label class="col-sm-2 control-label">No Tel & H/P : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai2->no_telefon }} / {{ $pegawai2->no_hp }}</label>
                        </div>
                        @else
                        <div class="row">
                            <label class="col-sm-12 control-label" style="color:#F00">Sila pilih maklumat pegawai parlimen </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- <div class="form-group">
            	<div class="row">
                    <div class="col-sm-3">
                        <label class="col-sm-10 control-label"><strong>Pegawai (3) : </strong></label>
                        <div style="float:right">
                            <a href="/peg_bertugas/cal_view/cari/{{ $rsData->jad_id }}?ty=pegawai3&idstaff={{ $rsData->pegawai3 }}" data-toggle="modal" data-target="#myModal"
                            title="Selenggaran maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana">
                        <input type="button" value=".." style="height:25px" /></a>
                        </div><br /><br />
                        @if (!empty($pegawai3))
                        <div style="float:right;cursor:pointer">
                            <img src="{{ asset('images/trash.png') }}" onclick="do_hapus('3')" title="Hapus maklumat pegawai (3)" />&nbsp;
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-9">
                        @if(!empty($rsData->pegawai3))
                        <div class="row">
                            <label class="col-sm-2 control-label">Bahagian : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai3->nama_bahagian }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Nama : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai3->nama_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Jawatan : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai3->jawatan_kakitangan }}</label>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 control-label">Emel : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai3->email }}</label>
                        </div>
                            <div class="row">
                            <label class="col-sm-2 control-label">No Tel & H/P : </label>
                            <label class="col-sm-10 control-label">{{ $pegawai3->no_telefon }} / {{ $pegawai3->no_hp }}</label>
                        </div>
                        @else
                        <div class="row">
                            <label class="col-sm-12 control-label" style="color:#F00">Sila pilih maklumat pegawai parlimen </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div> --}}

            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-sm-8">
                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                    	<i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="mt-sm mb-sm btn btn-warning" onclick="do_emel()" id="emel">
                    	<i class="fa fa-envelope-o"></i> Hantar Emel</button>
                    <button type="button" class="btn btn-default" onclick="do_kembali()">
                     <i class="fa fa-spinner"></i> Kembali</button>
                </div>
                </div>
            </div>


          </div>

</section>

</div>
@endsection
