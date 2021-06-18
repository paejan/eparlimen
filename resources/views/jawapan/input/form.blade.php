@extends('components.page')

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
<script language="javascript">
function do_simpan(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var soalan_id = $('#soalan_id').val();
	var jawapan = CKEDITOR.instances['jawapan'].getData(); 
	document.jakim.jawapan_text.value=jawapan;
	
    $.ajax({
		url:'/soalan/jawapan_input/form/store', //&datas='+datas,
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
                    reload = window.location; 
                    window.location = reload;
				});
			}
		}
	});
}

function do_page()
{
    window.location = '/soalan/jawapan'
}
</script>
@php
$page=isset($_REQUEST["page"])?$_REQUEST["page"]:"";
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <div class="tab-content">
                <!-- PROFILE -->
                <div class="active tab-pane" id="profile">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            @csrf
                            <h3 class="box-title"><b> Kemaskini Maklumat Jawapan Kepada Soalan [ No. Soalan : {{ $soalan->no_soalan }}]</b></h3>
						</div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh Soalan Dikemukakan :</b></label>
                                <div class="col-md-2 col-sm-12 col-xs-12">{{ date('d/m/Y', strtotime($soalan->tkh_soalan)) }}</div>
                                <label class="control-label col-md-3 col-xs-12" for="dokumen_tajuk">&nbsp;</label>
                                <label class="control-label col-md-2 col-xs-12" for="no_soalan"><b>Tarikh Jawapan :</b></label>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                @if(!empty($soalan->tkh_jwb_parlimen))
                                    <b>{{ date('d/m/Y', strtotime($soalan->tkh_jwb_parlimen)) }}</b>
                                @else
                                    ?
                                @endif
                    			</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Jenis Pertanyaan :</b></label>
                                <div class="col-md-2 col-sm-12 col-xs-12">
									{{ $soalan->tanya->pertanyaan }} @if(!empty($soalan->j_tanya_det)) {{  $soalan->j_tanya_det }} @endif
                                </div>
                                <label class="control-label col-md-3 col-xs-12" for="dokumen_tajuk">&nbsp;</label>
                                <label class="control-label col-md-2 col-xs-12" for="no_soalan"><b>Dewan :</b></label>
                                <div class="col-md-2 col-sm-12 col-xs-12">{{ $soalan->dewan->dewan }}</div>
                            </div>
							  
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Pertanyaan Oleh :</b></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">{{ $ahliparlimen->nama_ap }}</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>@if($soalan->j_dewan == 1) Parlimen @else Ahli Dewan @endif :</b></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">{{ $ahliparlimen->kawasan_ap }}</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Kategori :</b></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">{{ $soalan->kategori->nama_kategori }}</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Bahagian :</b></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">{{ $soalan->bahagian->nama_bahagian }}</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Soalan :</b></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">{!! nl2br($soalan->soalan) !!}</div>
                            </div>
							<hr />
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Jawapan </b><div style="float:right">: </div><br /><br />
                                    <i style="font-size:11px">
                                    <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br /><br />
                                    <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                                    </i>
                                </label>
                                <div class="col-md-10 col-sm-12 col-xs-12">
									<textarea name="jawapan" id="jawapan" cols="50" rows="10" class="form-control">
                                        @if(!empty($soalan->jawapan_input))
                                            {!! $soalan->jawapan_input !!}
                                        @else
                                            Tuan Yang di-Pertua,<br><br>
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            
							<hr />
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                    @if($usermenu->is_add=='1' || $usermenu->is_upd=='1')
                                    <input type="button" name="button" id="button" value="Simpan" class="btn btn-primary" onclick="do_simpan()" />
                                    @endif
                                    <input type="button" name="button3" id="kembali" value="Kembali" class="btn btn-default" onclick="do_page()" />

                                    <input type="hidden" name="soalan_id" id="soalan_id" value="{{ $soalan->soalan_id }}" />
                                    <input type="hidden" name="input_id" id="input_id" value="{{ $soalan->input_id }}" />

	                                <textarea name="jawapan_text"  style="display:none;"></textarea>
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
	CKEDITOR.replace( 'jawapan' );
	CKEDITOR.replace( 'maklumat_tambah' );
	for (var i in CKEDITOR.instances) {
        CKEDITOR.instances[i].on('change', function() { document.jakim.chk_input.value=1; });
    }
</script>
@endsection