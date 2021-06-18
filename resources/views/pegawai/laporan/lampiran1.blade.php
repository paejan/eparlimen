@include('components.dateformat')
<script language="javascript">
function do_close(){
	reload = window.location; 
	window.location = reload;
}

function do_simpan(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var s_oleh = $('#s_oleh').val();
	var ahli_parlimen = $('#ahli_parlimen').val();
	var kawasan_parlimen = $('#kawasan_parlimen').val();
	var masa = $('#masa').val();
	var soalan = $('#soalan').val();
	var tindakan = $('#tindakan').val();

	//alert("dd");
    if(ahli_parlimen.trim() == '' ){
        alert('Sila pilih maklumat Yang Berhormat.');
        $('#ahli_parlimen').focus(); return false;
	} else if(masa.trim() == '' ){
        alert('Sila masukkan masa soalan.');
        $('#masa').focus(); return false;
	} else if(soalan.trim() == '' ){
        alert('Sila masukkan maklumat soalan.');
        $('#soalan').focus(); return false;
	} else {
		$.ajax({
			url:'/peg_bertugas/laporan/lampiran_update?pro=SAVE1', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
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
			url:'/peg_bertugas/laporan/lampiran_delete', //&datas='+datas,
			type:'POST',
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

function do_sel(){
	var theContents = document.getElementById('s_oleh')[document.getElementById('s_oleh').selectedIndex].innerHTML;
	var data = theContents.split(" - ");
	document.jakim.kawasan_parlimen.value = data[0];
	document.jakim.ahli_parlimen.value = data[1];
}

function do_selDN(){
	var theContents = document.getElementById('s_oleh')[document.getElementById('s_oleh').selectedIndex].innerHTML;
	var data = theContents.split(" - ");
	document.myform.kawasan_parlimen.value = data[0];
	document.myform.ahli_parlimen.value = data[1];
}

</script>
<div class="col-md-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>{{ $title }}</b></font></h6>
    </header>
    <div class="panel-body">
        @csrf
        <input type="hidden" name="jad_id" value="{{ $result->jad_id }}">
        <input type="hidden" name="lp_id" value="{{ optional($laporan)->lp_id }}">

        <div class="col-md-12">

            <div class="form-group">
            	<div class="row">
                    <label class="col-sm-3 control-label">Dewan Persidangan : </label>
                    <div class="col-sm-9">{{ $result->dewan }}</div>
                </div>
            </div>
            <div class="form-group">
            	<div class="row">
                    <label class="col-sm-3 control-label">Sidang : </label>
                    <div class="col-sm-9">{{ $result->sidang->persidangan }}</div>
                </div>
            </div>
            <div class="form-group">
            	<div class="row">
                    <label class="col-sm-3 control-label">Tarikh Soalan : </label>
                    <div class="col-sm-9">{{ DisplayDate($result->tarikh) }} - ( {{ $result->hari }} )
                        <input type="hidden" name="tarikh" id="tarikh" value="{{ $result->tarikh }}" />
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">{{ $label }}</label>
                <div class="col-sm-9">
                    <select name="s_oleh" id="s_oleh" onChange="do_sel()" class="form-control">
                        <option value=""> -- Sila Pilih Nama Ahli Parlimen -- </option>
                        @foreach ($ahliparlimen as $ap)
                        <option value="{{ $ap->id_ap }}" @if(optional($laporan)->oleh_id==$ap->id_ap) selected @endif>{{ $ap->kod_kaw_ap }} : {{ $ap->kod->p_nama }} - {{ $ap->nama_ap }} </option>
                        @endforeach
                    </select>
                    <input name="ahli_parlimen" id="ahli_parlimen" type="hidden" size="50" maxlength="50" value="{{ optional($laporan)->ahli_parlimen }}" readonly />
                    <input name="kawasan_parlimen" id="kawasan_parlimen" type="hidden" size="100" maxlength="120" value="{{ optional($laporan)->kawasan_parlimen }}" readonly />				
                </div>
                </div>
            </div>

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Masa : </label>
                <div class="col-sm-2"><input type="time" name="masa" id="masa" size="20" maxlength="20" style="height:40px" value="{{ optional($laporan)->masa }}" class="form-control"></div>
                </div>
            </div>
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Soalan/Isu/Pendapat : </label>
                <div class="col-sm-9"><textarea rows="6" name="soalan" id="soalan" class="form-control">{{ optional($laporan)->soalan }}</textarea></div>
                </div>
            </div>
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label">Tindakan : </label>
                <div class="col-sm-9"><textarea rows="6" name="tindakan" id="tindakan" class="form-control">{{ optional($laporan)->tindakan }}</textarea></div>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-sm-8">
                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                    	<i class="fa fa-save"></i> Simpan</button>
                    @if(!empty($laporan->lp_id)) 
                    <button type="button" class="mt-sm mb-sm btn btn-danger" onclick="do_hapus()" id="hapus">
                    	<i class="fa fa-trash"></i> Hapus</button>
                    @endif
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
                </div> 
            </div>
							 
		 
          </div>
     
</section>

</div> 