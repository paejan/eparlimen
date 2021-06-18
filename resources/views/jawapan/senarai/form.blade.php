@extends('components.page')

@section('content')
<script language="javascript">
function do_simpan(val){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var soalan_id = $('#soalan_id').val();
	
    $.ajax({
		url:'/soalan/jawapan_senarai/store/'+val, //&datas='+datas,
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
			if(data=='ERR'){
				swal({
				  title: 'Amaran',
				  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
				  type: 'error',
				  confirmButtonClass: "btn-warning",
				  confirmButtonText: "Ok",
				  showConfirmButton: true,
				});
			} else {
				swal({
				  title: 'Berjaya',
				  text: 'Maklumat telah berjaya dikemaskini',
				  type: 'success',
				  confirmButtonClass: "btn-success",
				  confirmButtonText: "Ok",
				  showConfirmButton: true,
				}).then(function () {
					window.location.href = "/soalan/jawapan_senarai";
				});
			}
		}
	});
}

function do_serahkembali(val){
	swal({
		title: 'Adakah anda pasti untuk membuat serahan semula kepada penyedia jawapan?',
		//text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Teruskan',
		cancelButtonText: 'Tidak, Batal!',
		reverseButtons: true
	}).then(function () {
		do_simpan(val);
	});
}

function do_hapus(val){
	swal({
		title: 'Adakah anda pasti untuk menghapuskan soalan dan jawapan ini?',
		//text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Teruskan',
		cancelButtonText: 'Tidak, Batal!',
		reverseButtons: true
	}).then(function () {
		do_simpan(val);
	});
}

function do_semak(val){
	if(document.jakim.semak_oleh.value==''){
		alert("Sila pilih pegawai penyemak jawapan");
		document.jakim.semak_oleh.focus();
	} else if(document.jakim.lulus_oleh.value==''){
		alert("Sila pilih pegawai pelulus jawapan");
		document.jakim.lulus_oleh.focus();
	} else {
		swal({
			title: 'Adakah anda pasti untuk menghantar jawapan ini untuk disemak oleh Penyemak Jawapan?',
			//text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Teruskan',
			cancelButtonText: 'Tidak, Batal!',
			reverseButtons: true
		}).then(function () {
			do_simpan(val);
		});
	}
}

function do_page()
{
  window.location = '/soalan/jawapan_senarai';
}
</script>
<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        <!-- PROFILE -->
        <div class="active tab-pane" id="profile">
          <div class="box box-info">
          @csrf
            @include('jawapan.view')
              <div class="form-group">
                <label class="control-label col-md-12 col-xs-12" for="tkh_soalan"><b>Jawapan :</b></label>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Disediakan Oleh :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{{ optional($soalan->sedia)->nama_kakitangan }}</div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Disemak Oleh :</b></label>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <select name="semak_oleh" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    @foreach($semak as $semak)
                    <option value="{{ $semak->id_kakitangan }}" @if($soalan->semak_oleh == $semak->id_kakitangan) selected @endif>{{ $semak->nama_kakitangan }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              @php $bil = 0 @endphp
              @foreach($komen as $komen)
              @if($bil == 0)
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Komen Pegawai Penyemak :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{!! $komen->kenyataan !!}</div>
              </div>
              @else
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b></b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{!! $komen->kenyataan !!}</div>
              </div>
              @endif
              @endforeach
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Diluluskan Oleh :</b></label>
                <div class="col-md-6 col-sm-12 col-xs-12">
                  <select name="lulus_oleh" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    @foreach($lulus as $lulus)
                    <option value="{{ $lulus->id_kakitangan }}" @if($soalan->lulus_oleh == $lulus->id_kakitangan) selected @endif>{{ $lulus->nama_kakitangan }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <hr />
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                  @if(Auth::user()->type == 'A' || Auth::user()->type == 'U')
                  <input type="button" name="button" id="simpan" value="Serah Kembali Ke Bahagian" class="btn btn-primary" onclick="do_serahkembali('SERAH_SEMULA')" />
                  <input type="button" name="button" id="sah" value="Pengesahan" class="btn btn-primary" onclick="do_semak('SEMAK')" />
                  @endif

                  @if($usermenu->is_del == 1)
                  <input type="button" name="button" id="hapus" value="Hapus" class="btn btn-primary" title="Sila klik untuk menghapuskan soalan" onclick="do_hapus('HAPUS')" />
                  @endif
                                
                  <input type="button" name="button3" id="kembali" value="Kembali" class="btn btn-default" onclick="do_page()" />

                  <input type="hidden" name="soalan_id" value="{{ $soalan->soalan_id }}" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
	</div>        
</div>

@endsection