<script language="javascript">
function do_save(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var nama_ap = $('#nama_ap').val();
	var kawasan_ap = $('#kawasan_ap').val();
	var parti = $('#parti').val();
	var tempoh = $('#tempoh').val();
	var status_ap = $('#status_ap').val();
	//alert("dd");
    if(nama_ap.trim() == '' ){
        alert('Sila masukkan maklumat nama ahli parlimen.');
        $('#nama_ap').focus(); return false;
	} else if(kawasan_ap.trim() == '' ){
        alert('Sila masukkan maklumat lantikan.');
        $('#kawasan_ap').focus(); return false;
	} else if(parti.trim() == '' ){
        alert('Sila masukkan maklumat parti / organisasi.');
        $('#parti').focus(); return false;
	} else if(tempoh.trim() == '' ){
        alert('Sila masukkan maklumat tempoh berkhidmat.');
        $('#tempoh').focus(); return false;
	} else if(status_ap.trim() == '' ){
        alert('Sila pilih status rekod ini.');
        $('#status_ap').focus(); return false;
	} else {
		$.ajax({
			url:'/utiliti/ahli', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
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
	$status_ap = $rsk->status_ap ?? '';
@endphp
<div class="col-lg-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Ahli Dewan Negara</b></font></h6>
    </header>
    <div class="panel-body">
        <div class="box-body">
            @csrf
            <div class="col-md-1"></div>
            <div class="col-md-10">
            

            <div class="form-group">
              <div class="row">
                <label for="nama_ap" class="col-sm-3 control-label">Nama Ahli Dewan : </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_ap" id="nama_ap" class="form-control" value="{{ $rsk->nama_ap ?? '' }}"/>
                </div>
              </div>
			</div>
			
            <div class="form-group">
              <div class="row">
                <label for="nama_ap" class="col-sm-3 control-label">Lantikan : </label>
                <div class="col-sm-9">
                    <input type="text" name="kawasan_ap" id="kawasan_ap" class="form-control" value="{{ $rsk->kawasan_ap ?? '' }}"/>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="row">
                <label for="nama_ap" class="col-sm-3 control-label">Tempoh : </label>
                <div class="col-sm-9">
                    <input type="text" name="tempoh" id="tempoh" class="form-control" value="{{ $rsk->tempoh ?? '' }}"/>
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
				<button type="button" class="btn btn-primary" id="save" onclick="do_save()">Simpan</button>
                &nbsp;
                @if(!empty($ids))
                <input type="button" value="Hapus" onclick="do_hapus({{ $ids }})" class="btn btn-danger"/>&nbsp;
                @endif
                <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                <input type="hidden" name="type" value="AD" />
                <input type="hidden" name="id_ap" id="id_ap" value="{{ $ids }}" />
            </div>
        </div>
		</div>
  </div>
     
</section>

</div>