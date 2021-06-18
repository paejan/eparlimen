<script language="javascript">
function do_save(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var kod_kaw_ap = $('#kod_kaw_ap').val();
	var nama_ap = $('#nama_ap').val();
	var parti = $('#parti').val();
	var tkh_mula = $('#tkh_mula').val();
	var status_ap = $('#status_ap').val();
	//alert("dd");
    if(kod_kaw_ap.trim() == '' ){
        alert('Sila pilih kawasan parlimen.');
        $('#kod_kaw_ap').focus(); return false;
	} else if(nama_ap.trim() == '' ){
        alert('Sila masukkan maklumat nama ahli parlimen.');
        $('#nama_ap').focus(); return false;
	} else if(parti.trim() == '' ){
        alert('Sila pilih parti ahli parlimen.');
        $('#parti').focus(); return false;
	} else if(tkh_mula.trim() == '' ){
        alert('Sila masukkan maklumat tarikh mula.');
        $('#tkh_mula').focus(); return false;
	} else if(status_ap.trim() == '' ){
        alert('Sila pilih status rekod ini.');
        $('#status_ap').focus(); return false;
	} else {
		$.ajax({
			url:'/utiliti/ahli', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				$('#save').attr("disabled","disabled");
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
						do_close();
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
function do_hapus(id_ap){
	// alert(id_ap)
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
			url:'/utiliti/ahli/delete/'+id_ap, //&datas='+datas,
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
						do_close();
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
	$ids = $rsk->id_ap ?? '';
	$kod_kaw = $rsk->kod_kaw_ap ?? '';
	$status_ap = $rsk->status_ap ?? '';
	$bils_ap = 0;
	$kod_parti = $rsk->parti ?? '';
@endphp

<div class="col-lg-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Ahli Dewan Rakyat</b></font></h6>
    </header>
    <div class="panel-body">
        <div class="box-body">
		@csrf
            <div class="col-md-1"></div>
            <div class="col-md-10">

            <div class="form-group">
              <div class="row">
                <label for="nama_bahagian" class="col-sm-3 control-label">Kawasan : </label>
                <div class="col-sm-9">
                    <select class="form-control" name="kod_kaw_ap" id="kod_kaw_ap" required="required">
					@for ($i = 0; $i < $rs_kp->count(); $i++)
						@php
							// dd($ada);
							$p_kod = $rs_kp[$i]->p_kod;
							if(!empty($ids)){ $ada[$i][0]=''; }
						@endphp
						@if(empty($ada[$i][0]))
						@php $bils_ap++; @endphp
						<option value="{{ $p_kod }}" @if($p_kod==$kod_kaw) selected @endif>{{ $p_kod }} - {{ $rs_kp[$i]->p_nama }}</option>
						@endif
					@endfor
					</select>
					@if(empty($bils_ap))<i>Semua kawasan parlimen telah mempunyai ahli parlimen berdaftar</i> @endif
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="nama_ap" class="col-sm-3 control-label">Nama : </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_ap" id="nama_ap" class="form-control" value="{{ $rsk->nama_ap ?? '' }}"/>
                </div>
              </div>
			</div>

			<div class="form-group">
				<div class="row">
				  <label for="nama_ap" class="col-sm-3 control-label">Parti : </label>
				  <div class="col-sm-9">
					<select class="form-control" name="parti" id="parti" required="required">
						<option value=""> -- Sila Pilih Parti -- </option> 
						@foreach ($parti as $parti) 
						<option value="{{ $parti->kod_parti }}" @if($kod_parti==$parti->kod_parti) selected @endif>{{ $parti->nama_parti }} ({{ $parti->kod_parti }})</option>
						@endforeach
					</select>
				  </div>
				</div>
			</div>

            <div class="form-group">
              <div class="row">
                <label for="mula" class="col-sm-3 control-label">Tarikh Mula : </label>
                <div class="col-sm-3">
                    <input type="date" name="tkh_mula" id="tkh_mula" class="form-control" value="{{ $rsk->tkh_mula ?? '' }}"/>
                </div>
              </div>
			</div>
			
            <div class="form-group">
              <div class="row">
                <label for="mula" class="col-sm-3 control-label">Tarikh Tamat : </label>
                <div class="col-sm-3">
                    <input type="date" name="tkh_tamat" id="tkh_tamat" class="form-control" value="{{ $rsk->tkh_tamat ?? '' }}"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="status_ap" class="col-sm-3 control-label">Status : </label>
                <div class="col-sm-3">
                    <select class="form-control" name="status_ap" id="status_ap" required="required">
                        <option value="0" @if($status_ap == 0) selected @endif>Rekod Aktif</option>
                        <option value="1" @if($status_ap == 1) selected @endif>Rekod Tidak Aktif</option>
                    </select>
                </div>
               </div>
            </div>

            <div class="modal-footer">
            	
                <button type="button" id="save" class="btn btn-primary" onclick="do_save()">Simpan</button>
                <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                <input type="hidden" name="type" value="AP" />
                <input type="hidden" name="id_ap" id="id_ap" value="{{$ids}}" />
            </div>
        </div>
		</div>
  </div>
     
</section>

</div>	 
