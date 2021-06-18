<script language="javascript">
function do_close(){
	reload = window.location; 
	window.location = reload;
}

function do_upload(){
	var soalan_id = $('#soalan_id').val();
	var tajuk = $('#tajuk').val();
	var all = $("form").serialize();
	// alert(all);

	var fd = new FormData();
    var files = $('#file1')[0].files[0];
    fd.append('file1',files);

    if(tajuk.trim() == '' ){
        alert('Sila masukkan maklumat tajuk dokumen.');
        $('#tajuk').focus(); return false;
	} else {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url:'/soalan/jawapan/upload/'+soalan_id+'/'+tajuk, //&datas='+datas,
			beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
				$('.dispmodal').css('opacity', '.5');
			},
			type:'POST',
			data: fd,

			contentType: false,
			processData: false,
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
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>Muat Naik Fail/Dokumen</b></font></h6>
    </header>
    <div class="panel-body">
        <div class="box-body">
        
            <div class="col-md-10">
            
            <div class="form-group">
              <div class="row">
                <label for="nama_kategori" class="col-sm-3 control-label">Tajuk : </label>
                <div class="col-sm-9">
                    <input type="text" name="tajuk" id="tajuk" class="form-control" value=""/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <label for="status" class="col-sm-3 control-label">File : </label>
                <div class="col-sm-9">
                	<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input type="hidden" name="action1" value="1">
                    <input type="file" name="file1" id="file1" size="50" class="form-control">
                </div>
               </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="do_upload()">Simpan</button>
                &nbsp;
                <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                <input type="hidden" name="soalan_id" id="soalan_id" value="{{ $id }}" />
            </div>
        </div>
		</div>
  </div>
     
</section>

</div>