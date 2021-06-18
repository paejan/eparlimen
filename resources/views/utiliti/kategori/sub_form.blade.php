<script language="javascript">
function do_save(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var id_kategori = $('#id_kategori').val();
	var nama_sub_kategori = $('#nama_sub_kategori').val();
	var status = $('#status').val();
	//alert("dd");
    if(id_kategori.trim() == '' ){
        alert('Sila pilih maklumat kategori.');
        $('#id_kategori').focus(); return false;
	} else if(nama_sub_kategori.trim() == '' ){
        alert('Sila masukkan maklumat sub-kategori.');
        $('#nama_sub_kategori').focus(); return false;
	} else if(status.trim() == '' ){
        alert('Sila pilih status rekod ini.');
        $('#status').focus(); return false;
	} else {
		$.ajax({
			url:'/utiliti/kategori', //&datas='+datas,
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
</script>
@php
    $ids = $rsk->id_kategori ?? '';
    $kat_id = $rsk->id_kategori ?? '';
    $status = $rsk->status ?? '';
@endphp
<div class="col-lg-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>MAKLUMAT SUB-KATEGORI</b></font></h6>
    </header>
    <div class="panel-body">
        <div class="box-body">
            @csrf
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="form-group">
              <div class="row">
                <label for="nama_kategori" class="col-sm-3 control-label">Nama Kategori : </label>
                <div class="col-sm-9">
                	<select name="id_kategori" id="id_kategori" class="form-control">
                    	<option value="">-- Sila Pilih --</option>
                        @foreach($kod as $kat)
                        <option value="{{ $kat->id_kategori }}" @if($kat->id_kategori == $kat_id) selected @endif>{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="nama_kategori" class="col-sm-3 control-label">Nama Sub-Kategori : </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_sub_kategori" id="nama_sub_kategori" class="form-control" value="{{ $rsk->nama_sub_kategori ?? '' }}"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="status" class="col-sm-3 control-label">Status : </label>
                <div class="col-sm-3">
                    <select class="form-control" name="status" id="status" required="required">
                        <option value="0" @if($status == 0) selected @endif>Rekod Aktif</option>
                        <option value="1" @if($status == 1) selected @endif>Rekod Tidak Aktif</option>
                    </select>
                </div>
               </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="s" onclick="do_save()">Simpan</button>
                <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                <input type="hidden" name="type" id="type" value="sub" />
                <input type="hidden" name="idsub_kategori" id="idsub_kategori" value="" />
            </div>
        </div>
		</div>
  </div>
     
</section>

</div>	 
