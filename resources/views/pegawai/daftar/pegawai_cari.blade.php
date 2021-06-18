@include('components.dateformat')
<script language="javascript">
function do_close(){
	reload = window.location; 
	window.location = reload;
}

function do_pilih(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var jad_id = $('#jad_id').val();
	var medan  = $('#ty').val();
	var lstPegawai = $('#lstPegawai').val();
    var bahagian = $('#bahagian').val();

	//alert("dd");
    if(jad_id.trim() == '' ){
        alert('Maklumat jadual tiada. Sila pastikan maklumat ini tidak kosong');
        $('#jad_id').focus(); return false;
	} else if(lstPegawai.trim() == '' ){
        alert('Sila pilih pegawai bertugas daripada senarai.');
        $('#lstPegawai').focus(); return false;
	} else if(bahagian.trim() == '' ){
        alert('Sila pilih bahagian daripada senarai.');
        $('#bahagian').focus(); return false;
	} else {
		$.ajax({
			url:'/peg_bertugas/cal_view/update?pro=PEG&flds='+medan, //&datas='+datas,
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

function do_carian(){
	var bahagian = $('#bahagian').val();
	var carian = $('#carian').val();
	var ty = $('#ty').val();
	var jad_id = $('#jad_id').val();
    var id_staff = $('#lstPegawai').val();
    
    // var meh = '/peg_bertugas/cal_view/cari/'++'?ty='+ty+'&bahagian=' + bahagian+'&carian=' + carian;
    $.get('/peg_bertugas/cal_view/carian?ty='+ty+'&bahagian=' + bahagian+'&carian=' + carian, function(data){
        console.log(data);

        $('#lstPegawai').html('');
        
        $("#lstPegawai").append(new Option('-- Sila Pilih --', ''));
        for(i=0;i<data.length;i++){
            $("#lstPegawai").append(new Option(data[i].nama_kakitangan+"&nbsp;&nbsp; ["+data[i].nama_bahagian+"]", data[i].id_kakitangan));
        }
    });
}

function do_insert(){
    var ids = $('#lstPegawai').val()
    
    // alert(ids);
    $.get('/peg_bertugas/cal_view/pilihan?ids='+ids, function(data){
        console.log(data);
        $('#bahagian').val(data.id_bahagian);
    });
}
</script>
@php
$ty=isset($_REQUEST["ty"])?$_REQUEST["ty"]:"";
$idstaff=isset($_REQUEST["idstaff"])?$_REQUEST["idstaff"]:"";
$bahagian=isset($_REQUEST["bahagian"])?$_REQUEST["bahagian"]:"";
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
@endphp
<div class="col-md-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>Cari Maklumat Pegawai</b></font></h6>
    </header>
    <div class="panel-body">
        @csrf
        <input type="hidden" name="jad_id" id="jad_id" value="{{ $rsData->jad_id }}">
        <input type="hidden" name="ty" id="ty" value="{{ $ty }}" />

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
                <label class="col-sm-3 control-label">Nama Bahagian : </label>
                <div class="col-sm-9">
                    <select name="bahagian" id="bahagian" class="form-control">
                        <option value="">-- Sila pilih --</option>
                    	@foreach ($resBhg as $resBhg)
                        <option value="{{ $resBhg->id_bahagian }}" @if($bahagian==$resBhg->id_bahagian || $staff==$resBhg->id_bahagian) selected @endif>{{ $resBhg->nama_bahagian }}</option>
                        @endforeach
                    </select>
				</div>
                </div>
            </div>
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Maklumat Carian : </label>
                <div class="col-sm-6">
                	<input type="text" class="form-control" name="carian" id="carian" value="{{ $carian }}" />
				</div>
                <div class="col-sm-2">
                	<input type="button" class="form-control" value="Cari" onclick="do_carian()"  />
				</div>
                </div>
            </div>

            <div class="form-group"><hr /></div>  
            
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Senarai Pegawai : </label>
                <div class="col-sm-9">
                    <select name="lstPegawai" id="lstPegawai" class="form-control" onchange="do_insert()">
                        <option value="">-- Sila pilih --</option>
                        @foreach ($res_ap as $res_ap)
                        <option value="{{ $res_ap->id_kakitangan }}" @if($idstaff==$res_ap->id_kakitangan) selected @endif>
                            {{ $res_ap->nama_kakitangan }}&nbsp;&nbsp; [{{ $res_ap->nama_bahagian }}]
                        </option>
                        @endforeach
                    </select>
				</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-sm-8">
                    <button type="button" class="btn btn-success" onclick="do_pilih()"><i class="fa fa-check"></i> Pilih</button>
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
                </div> 
            </div>
							 
		 
          </div>
     
</section>

</div> 