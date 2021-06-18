@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
<script language="javascript" type="text/javascript">
function do_simpan(){
	var dokumen_tajuk = $('#dokumen_tajuk').val();
	var mailContents = CKEDITOR.instances['dokumen'].getData();
	document.jakim.docs.value=mailContents;

	var fd = new FormData($("form")[0]);
    console.log(fd)

    if(dokumen_tajuk.trim() == '' ){
        alert('Sila masukka maklumat tajuk dokumen rujukan.');
        $('#dokumen_tajuk').focus(); return false;
	} else {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url:'/utiliti/handset', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			// beforeSend: function () {
			// 	$('#simpan').attr("disabled","disabled");
			// 	$('#hapus').attr("disabled","disabled");
			// 	$('.dispmodal').css('opacity', '.5');
			// },
			data: fd,
			contentType: false,
			processData: false,
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
						// reload = window.location;
						// window.location = reload;
						window.location.replace("/utiliti/handset")
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
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url:'/utiliti/handset/delete/'+ids, //&datas='+datas,
			type:'POST',
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				// alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Maklumat telah berjaya dihapuskan',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
						/*reload = window.location;
						window.location = reload;*/
						if(Number.isInteger(ids)){
							location.reload();
						} else {
							window.location.replace("/utiliti/handset");
						}
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

function do_back()
{
	window.location.replace("/utiliti/handset")
}

</script>

@php

$docs = $dc ?? '';
if(empty($docs)){
	$title = "Tambah";
} else {
	$title = "Kemaskini";
}
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
                            <h3 class="box-title"><b>{{ $title }} Maklumat Dokumen Handset</b></h3><br />
                            </div>
							<!-- /.box-header -->
                            <meta name="csrf-token" content="{{ csrf_token() }}">
							<input type="hidden" name="doc_id" id="doc_id" value="{{ $docs->doc_id ?? '' }}" />
						</div>
                        <div class="box-body">
                           <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Nama Dokumen Handset :</b></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                <input name="dokumen_tajuk" id="dokumen_tajuk" class="form-control" value="{{ $docs->dokumen_tajuk ?? '' }}">
                                </div>
                            </div>

                           <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="dokumen"><b>Maklumat Dokumen Handset :</b>
                                <br /><br />
                                <i style="font-size:11px">
                                <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br />
                                <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                                </i>
                                </label>
                                <div id="editors" class="col-md-10 col-sm-12 col-xs-12">
                                	<textarea name="dokumen" id="dokumen" class="form-control">{{ $docs->dokumen ?? '' }}</textarea>
                                </div>
                            </div>

                           <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Dokumen Handset :</b></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                    {{-- <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <b>Sila klik pada ikon <img src="{{ asset('images/boxin2.gif') }}" border="0" width="25" height="25" /> untuk muatnaik dokumen lampiran.</b>
                                        <tr bgcolor="#CCCCCC" align="center">
                                            <td width="5%">Bil</td>
                                            <td width="40%">Tajuk</td>
                                            <td width="40%">Nama Dokumen</td>
                                            <td width="10%">Jenis</td>
                                            <td width="5%">&nbsp;</td>
										</tr>
                                        <tr bgcolor="#FFFFFF">
                                            <td width="5%">-</td>
                                            <td width="40%">-</td>
                                            <td width="40%">-</td>
                                            <td width="10%">-</td>
                                            <td width="5%" align="center">
                                            	<a href="#" data-toggle="modal" data-target="#myModal" class="fa" data-backdrop="static" onclick="do_up()">
                                                <img src="{{ asset('images/boxin2.gif') }}" border="0" width="25" height="25" style="cursor:pointer" />
                                            	</a>
                                            </td>
                                        </tr>

                                    </table> --}}

                                    <input type="file" name="file1" id="file1" size="50" class="form-control">
                                    @if (!empty($docs))
                                    <i><font style="color:red">Dokumen Yang Terbaru Dimuat Naik: </font></i><a href="/utiliti/handset/download/{{ $docs->file_name }}" target="_blank">{{ $docs->file_name }}</a>
                                    @endif
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Status Dokumen :</b></label>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                <select name="doc_status" id="doc_status" class="form-control">
                                	<option value="0" <?php if($docs->doc_status ?? '' && $docs->doc_status =='0'){ print 'selected'; }?>>Rekod Aktif</option>
                                	<option value="1" <?php if($docs->doc_status ?? '' && $docs->doc_status =='1'){ print 'selected'; }?>>Rekod Tidak Aktif</option>
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-sm-8">
                                    <button type="button" class="mt-sm mb-sm btn btn-success" id="simpan"
                                    	onclick="do_simpan()" ><i class="fa fa-save"></i> Simpan</button>
                                    @if(!empty($docs->doc_id))
                                    <button type="button" class="mt-sm mb-sm btn btn-danger" onclick="do_hapus('{{ $docs->doc_id }}')" id="hapus"><i class="fa fa-delete"></i> Hapus</button>
                                    @endif
                                    <button type="button" class="btn btn-default" onclick="do_back()"><i class="fa fa-spinner"></i> Kembali</button>

                                    <textarea name="docs"  style="display:none;"></textarea>

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
	CKEDITOR.replace('dokumen', {height: 200});
</script>
<script>
function do_up(id)
{
	// alert(id);
	$('#soalan_id').val(id);
}
</script>

@endsection
