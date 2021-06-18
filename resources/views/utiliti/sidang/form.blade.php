<script language="javascript">
function do_simpan(){
    var j_dewan = $('#j_dewan').val();
    var persidangan = $('#persidangan').val();
    var tahun = $('#tahun').val();
    var start_dt = $('#start_dt').val();
    var end_dt = $('#end_dt').val();
    var status = $('#status').val();

    if(j_dewan.trim() == '' ){
        alert('Sila pilih maklumat jenis dewan.');
        $('#j_dewan').focus(); return false;
	} else if(persidangan.trim() == '' ){
        alert('Sila masukkan maklumat nama persidangan.');
        $('#persidangan').focus(); return false;
	} else if(tahun.trim() == '' ){
        alert('Sila pilih maklumat tahun.');
        $('#tahun').focus(); return false;
	} else if(start_dt.trim() == '' ){
        alert('Sila masukkan maklumat tarikh mula persidangan.');
        $('#start_dt').focus(); return false;
	} else if(end_dt.trim() == '' ){
        alert('Sila masukkan maklumat tarikh akhir persidangan.');
        $('#end_dt').focus(); return false;
	} else if(status.trim() == '' ){
        alert('Sila pilih status persidangan.');
        $('#status').focus(); return false;
	} else {
		$.ajax({
			url:'/utiliti/sidang/store', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
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
function do_hapus(ids){
  // alert(ids);
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
			url:'/utiliti/sidang/delete/'+ids, //&datas='+datas,
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
            do_close()
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
  $ids = $rsData->id_sidang ?? '';
  $dewan = $rsData->j_dewan ?? '';
  $tahun = $rsData->tahun ?? '';
  $status = $rsData->status ?? '';
@endphp
<div class="col-md-12">
  <section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
      <h6 class="panel-title"><font color="#000000" size="3"><b>MAKLUMAT PERSIDANG</b></font></h6>
    </header>
    <div class="panel-body">
    @csrf
      <input type="hidden" name="ids" id="ids" value="{{ $ids }}">
      <div class="col-md-12">
        <div class="form-group">
          <div class="row">
            <label class="col-md-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Nama Dewan :</label>
            <div class="col-md-4">
            <select name="j_dewan" id="j_dewan" class="form-control">
              <option value="">Sila pilih nama dewan</option>
              @foreach($rsBgh as $rsBgh)
              <option value="{{$rsBgh->j_dewan}}" @if($rsBgh->j_dewan == $dewan) selected @endif>{{ strtoupper($rsBgh->dewan) }}</option>
              @endforeach
            </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Maklumat Persidangan : </label>
            <div class="col-sm-8">
              <textarea rows="3" name="persidangan" id="persidangan" class="form-control">{!! $rsData->persidangan ?? '' !!}</textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <label class="col-md-3 control-label"><font color="#FF0000">*</font> Tahun Persidangan :</label>
            <div class="col-md-2 control-label">
              <select name="tahun" id="tahun" class="form-control">
                @for($year = date("Y")+1; $year>='2008'; $year--)
                <option value="{{ $year }}" @if($year == $tahun) selected @endif>{{ $year }}</option>
                @endfor
              </select>
            </div>
          </div>
        </div> 

        <div class="form-group">
          <div class="row">
            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Tarikh Mula : </label>
            <div class="col-sm-2">
              <input type="date" name="start_dt" id="start_dt" class="form-control" value="{{ $rsData->start_dt ?? '' }}">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Tarikh Hingga : </label>
            <div class="col-sm-2">
              <input type="date" name="end_dt" id="end_dt" class="form-control" value="{{ $rsData->end_dt ?? '' }}">
            </div>
          </div>
        </div> 

        <div class="form-group">
          <div class="row">
            <label class="col-md-3 control-label"><font color="#FF0000">*</font> Status :</label>
            <div class="col-md-3 control-label">
              <select class="form-control" id="status" name="status">
                <option value="">Sila Pilih</option>
                <option value="0" @if($status == 0) selected @endif>Aktif</option>
                <option value="1" @if($status == 1) selected @endif>Tidak Aktif</option>
              </select>
            </div>
          </div>
        </div> 
            
            
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
            <div class="col-sm-8">
              <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan"><i class="fa fa-save"></i> Simpan</button>
              @if(!empty($ids))
                <button type="button" class="mt-sm mb-sm btn btn-danger" onclick="do_hapus('{{ $ids }}')" id="hapus"><i class="fa fa-delete"></i> Hapus</button>
              @endif
              <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
</div> 