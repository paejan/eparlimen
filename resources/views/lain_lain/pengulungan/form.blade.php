@extends('components.page')

@section('content')
<!--<script type="text/javascript" src="modalwindow/modal.js"></script>-->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>

<script language="javascript">
function do_simpan(){
  var doc_id = $('#doc_id').val();
	var dokumen_tajuk = $('#dokumen_tajuk').val();
	var tarikh = $('#tarikh').val();
	var doc_status = $('#doc_status').val();
	var mailContents = CKEDITOR.instances['dokumen'].getData();
	document.jakim.docs.value=mailContents;

  var fd = new FormData();
  var files = $('#file')[0].files[0];
  // alert(files)
  fd.append('doc_id',doc_id);
  fd.append('dokumen_tajuk',dokumen_tajuk);
  fd.append('file',files);
  fd.append('tarikh',tarikh);
  fd.append('doc_status',doc_status);
  fd.append('dokumen',mailContents);

  // alert(fd);

	//alert("dd");
    if(dokumen_tajuk.trim() == '' ){
      alert('Sila masukkan tajuk teks pengulungan.');
      $('#dokumen_tajuk').focus(); return false;
	} else if(tarikh.trim() == '' ){
      alert('Sila masukkan tarikh pengulungan.');
      $('#tarikh').focus(); return false;
	} else if(doc_status.trim() == '' ){
      alert('Sila pilih status pengulungan.');
      $('#doc_status').focus(); return false;
	} else if(mailContents.trim() == '' ){
      alert('Sila msukkan maklumat pengulungan.');
      $('#dokumen').focus(); return false;
	} else {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url:'/pengulungan/pg_senarai/store', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
				$('.dispmodal').css('opacity', '.5');
			},
			data: fd,
      contentType: false,
      processData: false,
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='ERR' || data=='null'){
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
            do_page();
					});
				}
			}
		});
    }
}

function do_hapus(id){  
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
    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
    $.ajax({
			url:'/pengulungan/pg_senarai/delete/'+id, //&datas='+datas,
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
            			do_page();
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

function do_page()
{
  window.location = '/pengulungan/pg_senarai';
}
</script>
@php
$id = $doc->doc_id ?? '';
$status = $doc->status ?? '';
@endphp
<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        <!-- PROFILE -->
        <div class="active tab-pane" id="profile">
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-header with-border">
                <h3 class="box-title"><b> @if(empty($id))Tambah @else Kemaskini @endif Maklumat Teks Pengulungan</b></h3><br />
              </div>                    
              <!-- /.box-header -->
            </div>
            <div class="box-body">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Nama Tajuk Pengulungan :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <textarea name="dokumen_tajuk" id="dokumen_tajuk" rows="2" cols="70" class="form-control">{{ $doc->dokumen_tajuk ?? '' }}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Maklumat Pengulungan :</b>
                  <br /><br /><i style="font-size:11px">
                  <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br /><br />
                  <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                  </i>
                </label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <textarea name="dokumen" cols="50" rows="15" id="dokumen" class="form-control">{!! $doc->dokumen ?? '' !!}</textarea>
                </div>
							</div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Muat Naik Dokumen Pengulungan :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <input type="file" name="file_name" id="file" class="form-control" />
                  @if(!empty($doc->file_name))
                  <a href="/pengulungan/pg_senarai/doc/{{ $doc->file_name }}" target="_blank">{{ $doc->file_name ?? '' }}</a>
                  @endif
                </div>
							</div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Tarikh Pengulungan :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  <input type="date" size="12" name="tarikh" id="tarikh" class="form-control" value="{{ $doc->tarikh ?? '' }}" />
                </div>
							</div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Status Pengulungan :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  <select name="doc_status" id="doc_status" class="form-control" >
                    <option value="0" @if($status == '0') selected @endif>Aktif</option>
                    <option value="1" @if($status == '1') selected @endif>Tidak Aktif</option>
                  </select>
                </div>
							</div>

              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                  @if($usermenu->is_add == 1 || $usermenu->is_upd == 1)
                  <input type="button" name="button" id="button" value="Simpan" class="btn btn-primary" onclick="do_simpan()" />
                  @endif
                  @if(!empty($id) && $usermenu->is_del == 1)
                  <input type="button" name="button2" id="button" value="Hapus" class="btn btn-primary" onclick="do_hapus('{{ $id }}')" />
                  @endif
                  <input type="button" name="button3" id="button" value="Kembali" class="btn btn-primary"  onclick="do_page()" />
                  
                  <input type="hidden" name="doc_id" id="doc_id" value="{{ $id }}" />
                  <input type="hidden" name="actions" id="actions" value="" />
                  <input type="hidden" name="PageNo" value="" />
                  <textarea name="docs" style="display:none;width:100%" rows="3"></textarea>
                </div>
							</div>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>        
</div>


<script language="javascript" type="text/javascript">
	document.jakim.dokumen_tajuk.focus();
</script>
<script>
	CKEDITOR.replace('dokumen', {height: 500});
</script>

@endsection