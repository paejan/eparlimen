@include('components.dateformat')
<script language="javascript">
function do_close(){
	reload = window.location;
	window.location = reload;
}

function do_simpan(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var jad_status = $('#jad_status').val();
	var pegawai1 = $('#pegawai1').val();

	//alert("dd");
    if(jad_status.trim() == '' ){
        alert('Sila pilih status persidangan.');
        $('#jad_status').focus(); return false;
	} else if(pegawai1.trim() == '' ){
        alert('Sila pilih pegawai 1.');
        $('#pegawai1').focus(); return false;
	} else {
		$.ajax({
			url:'/peg_bertugas/cal_view/update?pro=SAVE', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
				$('#emel').attr("disabled","disabled");
				$('#hapus').attr("disabled","disabled");
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

function do_hapus(){
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
			url:'/peg_bertugas/cal_view/update?pro=DEL', //&datas='+datas,
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
@php
if(!empty($rsData->urusetia)){ $del=1; }
if(!empty($rsData->pemandu)){ $del=1; }
if(!empty($rsData->pegawai1)){ $del=1; }
if(!empty($rsData->pegawai2)){ $del=1; }
if(!empty($rsData->pegawai3)){ $del=1; }
@endphp
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
                        <option value="1" @if($rsData->jad_status=='1') selected @endif>Aktif</option>
                        <option value="0" @if($rsData->jad_status=='0') selected @endif>Tidak Aktif</option>
                    </select>
				</div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Urusetia : </label>
                <div class="col-sm-9">
                    <select name="urusetia" id="urusetia" class="form-control">
						<option value="">-- Sila pilih --</option>
						@foreach ($staff as $us)
						<option value="{{ $us->id_kakitangan }}" @if($rsData->urusetia==$us->id_kakitangan) selected @endif>
							{{ $us->nama_kakitangan }}&nbsp;&nbsp; [{{ $us->nama_bahagian }}]
						</option>
						@endforeach
                    </select>
				</div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Pemandu : </label>
                <div class="col-sm-9">
                    <select name="pemandu" id="pemandu" class="form-control">
                        <option value="">-- Sila pilih --</option>
						@foreach ($staff->where('type','D') as $pm)
						<option value="{{ $pm->id_kakitangan }}" @if($rsData->pemandu==$pm->id_kakitangan) selected @endif>
							{{ $pm->nama_kakitangan }}&nbsp;&nbsp; [{{ $pm->nama_bahagian }}]
						</option>
						@endforeach
                    </select>
				</div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Nama Pegawai 1 : </label>
                <div class="col-sm-9">
                    <select name="pegawai1" id="pegawai1" class="form-control">
                        <option value="">-- Sila pilih --</option>
						@foreach ($staff as $p1)
						<option value="{{ $p1->id_kakitangan }}" @if($rsData->pegawai1==$p1->id_kakitangan) selected @endif>
							{{ $p1->nama_kakitangan }}&nbsp;&nbsp; [{{ $p1->nama_bahagian }}]
						</option>
						@endforeach
                    </select>
				</div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Nama Pegawai 2 : </label>
                <div class="col-sm-9">
                    <select name="pegawai2" id="pegawai2" class="form-control">
                        <option value="">-- Sila pilih --</option>
						@foreach ($staff as $p2)
						<option value="{{ $p2->id_kakitangan }}" @if($rsData->pegawai2==$p2->id_kakitangan) selected @endif>
							{{ $p2->nama_kakitangan }}&nbsp;&nbsp; [{{ $p2->nama_bahagian }}]
						</option>
						@endforeach
                    </select>
				</div>
                </div>
            </div>

            {{-- <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Nama Pegawai 3 : </label>
                <div class="col-sm-9">
                    <select name="pegawai3" id="pegawai3" class="form-control">
                        <option value="">-- Sila pilih --</option>
						@foreach ($staff as $p3)
						<option value="{{ $p3->id_kakitangan }}" @if($rsData->pegawai3==$p3->id_kakitangan) selected @endif>
							{{ $p3->nama_kakitangan }} &nbsp;&nbsp; [{{ $p3->nama_bahagian }}]
						</option>
						@endforeach
                    </select>
				</div>
                </div>
            </div> --}}

            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-sm-8">
                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                    	<i class="fa fa-save"></i> Simpan</button>
                    @if(!empty($rsData->jad_id))
                    <button type="button" class="mt-sm mb-sm btn btn-warning" onclick="do_emel()" id="emel">
                    	<i class="fa fa-envelope-o"></i> Hantar Emel</button>
                      @if(empty($del))
                    <button type="button" class="mt-sm mb-sm btn btn-danger" onclick="do_hapus()" id="hapus">
                    	<i class="fa fa-trash"></i> Hapus</button>
                      @endif
                    @endif
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
                </div>
            </div>


          </div>

</section>

</div>
