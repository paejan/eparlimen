@extends('components.page')

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
<script language="javascript">
function do_simpan(val){
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var soalan_id = $('#soalan_id').val();
	var kenyataan = CKEDITOR.instances['kenyataan'].getData(); 
	document.jakim.kenyataan_text.value=kenyataan;
	
  $.ajax({
		url:'/soalan/jawapan_kelulusan/store/'+val, //&datas='+datas,
		type:'POST',
		//dataType: 'json',
		beforeSend: function () {
			//$('#simpan').attr("disabled","disabled");
			//$('#kembali').attr("disabled","disabled");
			//$('#sah').attr("disabled","disabled");
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
					if(val=='UPDATE'){
						reload = window.location; 
						window.location = reload;
					} else {
						window.location.href = "/soalan/jawapan_kelulusan";
					}
				});
			}
		}
	});
}

function do_kembali(val){
	swal({
		title: 'Adakah anda pasti untuk mengembalikan jawapan ini untuk dikemaskini?',
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
	
}function do_sah(val){
	swal({
		title: 'Adakah anda pasti untuk membuat pengesahan kepada jawapan bagi soalan ini?',
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

function do_page()
{
  window.location = '/soalan/jawapan_kelulusan'
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
                @if(!$komen->isEmpty())
                @php $bil = 0; @endphp
                @foreach($komen as $komen)
                @if($bil == 0)
                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Ulasan Pegawai Penyemak :</b></label>
                  <div class="col-md-10 col-sm-12 col-xs-12">
                    Tarikh Semakan : {{ $komen->tkh_kemaskini }} :<br>{!! $komen->kenyataan !!}
                  </div>
                </div>
                @else
                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"></label>
                  <div class="col-md-10 col-sm-12 col-xs-12">
                  </div>
                </div>
                @endif
                @endforeach
                @endif

                <hr>

                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh dihantar :</b></label>
                  <div class="col-md-10 col-sm-12 col-xs-12">@if(!empty($soal_semak->tkh_hantar)) {{ date('Y-m-d H:i:s', strtotime($soal_semak->tkh_hantar)) }} @endif</div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh dibuka :</b></label>
                  <div class="col-md-10 col-sm-12 col-xs-12">@if(!empty($soal_semak->tkh_hantar)) {{ date('Y-m-d H:i:s', strtotime($soal_semak->tkh_buka)) }} @else {{ date('Y-m-d H:i:s') }} @endif</div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Ulasan Pegawai Pelulus :</b>
                    <br /><br />
                    <i style="font-size:11px">
                      <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br /><br />
                      <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                    </i>
                  </label>
                  <div class="col-md-10 col-sm-12 col-xs-12">
                    <textarea name="kenyataan" cols="50" rows="10" id="kenyataan" style="width:100%">@if(!empty($soal_semak->kenyataan)) {!! $soal_semak->kenyataan !!} @endif</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh dikemaskini :</b></label>
                  <div class="col-md-10 col-sm-12 col-xs-12">@if(!empty($soal_semak->tkh_kemaskini)) {{ date('Y-m-d H:i:s', strtotime($soal_semak->tkh_kemaskini)) }} @endif</div>
                </div>

                <hr />

                <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                    @if($usermenu->is_add == 1 || $usermenu->is_upd == 1)
                    <input type="button" name="button" id="simpan" value="Simpan" title="Sila klik untuk menyimpan ulasan" class="btn btn-primary" onclick="do_simpan('UPDATE')" />
                    <input type="button" name="button" id="sah" value="Disahkan" class="btn btn-primary" onclick="do_sah('SAH')" />
                    <input type="button" name="button" id="kembali" value="Dikembalikan" class="btn btn-primary" onclick="do_kembali('BACK')" />    
                    @endif
                    <input type="button" name="button3" id="kembali" value="Kembali" class="btn btn-default" onclick="do_page()" />

                    <input type="hidden" name="soalan_id" value="{{ $soalan->soalan_id }}" />
                    <input type="hidden" name="semakan_id" value="{{ optional($soal_semak)->semakan_id }}" />
                    
                    <textarea name="kenyataan_text"  style="display:none;"></textarea>
                  </div>
                </div>
              </div>
					  </div>
				  </div>
			  </div>
	  	</div>
	  </div>        
  </div>
<script>
	CKEDITOR.replace( 'kenyataan' );
</script>
@endsection