@extends('components.page')

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
<script language="javascript">
function do_chk(){
	document.jakim.chk_upd.value=1;
}

function do_simpan(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var soalan_id = $('#soalan_id').val();
	var jawapan = CKEDITOR.instances['jawapan'].getData();
	document.jakim.jawapan_text.value=jawapan;
	var tambahan = CKEDITOR.instances['maklumat_tambah'].getData();
	document.jakim.tambahan_text.value=tambahan;

    $.ajax({
		url:'/soalan/jawapan/form/store', //&datas='+datas,
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

function do_hapus(ids){
	var chk = document.jakim.chk_input.value;
	if(chk==1){
		swal({
			title: 'Sila tekan butang simpan terlebih dahulu kerana terdapat perubahan ke atad maklumat di paparan ini?',
			//text: "You won't be able to revert this!",
			type: 'warning',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			reverseButtons: true
		});
	} else {
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
				url:'/soalan/jawapan/delete/'+ids, //&datas='+datas,
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
							/*reload = window.location;
							window.location = reload;*/
							window.location.href = "";
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
}

function add_doc(){
	var chk = document.jakim.chk_input.value;
	if(chk==1){
		swal({
			title: 'Sila tekan butang simpan terlebih dahulu kerana terdapat perubahan ke atas maklumat di paparan ini?',
			//text: "You won't be able to revert this!",
			type: 'warning',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			reverseButtons: true
		});
	} else {
		$('#add_doc').click();
	}
}

function do_serah(){
	swal({
		title: 'Adakah anda pasti untuk membuat penyerahan ke atas jawapan bagi soalan perlimen ini?',
		//text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Teruskan',
		cancelButtonText: 'Tidak, Batal!',
		reverseButtons: true
	}).then(function () {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var soalan_id = $('#soalan_id').val();
        var jawapan = CKEDITOR.instances['jawapan'].getData();
        document.jakim.jawapan_text.value=jawapan;
        var tambahan = CKEDITOR.instances['maklumat_tambah'].getData();
        document.jakim.tambahan_text.value=tambahan;

        $.ajax({
            url:'/soalan/jawapan/form/serah', //&datas='+datas,
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
                        window.location = "/soalan/jawapan";
                    });
                }
            }
        });
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
                            @if (!$soalan_input->isEmpty())
                            <ul class="nav nav-tabs">
                                @if ($page == '')
                                <li role="presentation" class="active">
                                    <a href="#">Maklumat Jawapan</a>
                                @else
                                <li role="presentation">
                                    <a href="/soalan/jawapan/form/{{ $soalan->soalan_id }}">Maklumat Jawapan</a>
                                @endif
                                </li>
                                @if ($page=='agensi')
                                <li role="presentation" class="active">
                                    <a href="#">Jawapan Agensi</a>
                                    @else
                                <li role="presentation">
                                    <a href="/soalan/jawapan/form/{{ $soalan->soalan_id }}?page=agensi">Jawapan Agensi</a>
                                @endif
                                </li>
                            </ul>
                            @endif
                            <div class="col-md-12 col-sm-12 col-xs-12" align="right">
                                <a href="/soalan/jawapan/list?ids={{ $soalan->soalan_id }}" data-toggle="modal" data-target="#myModal" title="Lihat List Agensi" class="fa" data-backdrop="static">
                                    <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
                                    <i class=" fa fa-book"></i> <font style="font-family:Verdana, Geneva, sans-serif">List Agensi</font></button>
                                </a>
                            </div>
                            <h3 class="box-title"><b> Kemaskini Maklumat Jawapan Kepada Soalan [ No. Soalan : {{ $soalan->no_soalan }}]</b></h3>
							<input type="hidden" name="doc_id" value="{{ $soalan->soalan_id }}" />
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
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                    @if ($soalan->j_dewan == 1)
                                    {{ $ahliparlimen->p_nama }}
                                    @else
                                    {{ $ahliparlimen->kawasan_ap }}
                                    @endif
                                </div>
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
                                        @if(!empty($soalan->jawapan))
                                            {!! $soalan->jawapan !!}
                                        @else
                                            Tuan Yang di-Pertua,<br><br>
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan">Dokumen Lampiran <i>(Jika ada)</i></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <b>Sila klik pada ikon <img src="{{ asset('images/boxin2.gif') }}" border="0" width="25" height="25" /> untuk muatnaik dokumen lampiran.</b>
                                        <tr bgcolor="#CCCCCC" align="center">
                                            <td width="5%">Bil</td>
                                            <td width="40%">Tajuk</td>
                                            <td width="40%">Nama Dokumen</td>
                                            <td width="10%">Jenis</td>
                                            <td width="5%">&nbsp;</td>
                                        </tr>
                                        @php $bil = 0 @endphp
                                        @foreach($attachment as $att)
                                        <tr bgcolor="#FFFFFF">
                                            <td width="5%" align="right">{{ ++$bil }}.&nbsp;</td>
                                            <td width="40%">{{ $att->file_tajuk }}</td>
                                            <td width="40%"><a href="/soalan/jawapan/view/{{ $att->file_name }}" target="_blank">{{ $att->file_name }}</a></td>
                                            <td width="10%" align="center">{{ $att->file_type }}</td>
                                            <td width="5%" align="center">
                                                <img src="{{ asset('images/del.gif') }}" border="0" width="25" height="25" onclick="do_hapus('{{ $att->attach_id }}')" style="cursor:pointer" />
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr bgcolor="#FFFFFF">
                                            <td width="5%">-</td>
                                            <td width="40%">-</td>
                                            <td width="40%">-</td>
                                            <td width="10%">-</td>
                                            <td width="5%" align="center">
                                            	<img src="{{ asset('images/boxin2.gif') }}" border="0" width="25" height="25" style="cursor:pointer" onclick="add_doc()" />
                                                <a href="/soalan/jawapan/doc/{{ $soalan->soalan_id }}" id="add_doc" data-toggle="modal" data-target="#myModal" title="Tambah Maklumat Dokumen Lampiran" class="fa" data-backdrop="static"></a>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
							<hr />
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Maklumat Tambahan </b><div style="float:right">: </div><br /><br />
                                    <i style="font-size:11px">
                                    <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br /><br />
                                    <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                                    </i>
                                </label>
                                <div class="col-md-10 col-sm-12 col-xs-12">
									<textarea name="maklumat_tambah" id="maklumat_tambah" cols="50" rows="10" class="form-control">
                                        {!! $soalan->maklumat_tambah !!}
                                    </textarea>
                                </div>
                            </div>
							<hr />

                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan">Disediakan Oleh <div style="float:right">: </div></label>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <select name="sedia_oleh" class="form-control" onchange="do_update()">
                                @foreach($sedia as $sedia)
                                    <option value="{{ $sedia->id_kakitangan }}" @if($soalan->sedia_oleh==$sedia->id_kakitangan) selected @endif>{{ $sedia->nama_kakitangan }}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan">Disemak Oleh <div style="float:right">: </div></label>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <select name="semak_oleh" disabled="disabled" class="form-control">
                                        <option value=""> -- Sila pilih -- </option>
                                        @foreach($semak as $semak)
                                        <option value="{{ $semak->id_kakitangan }}" @if($soalan->semak_oleh==$semak->id_kakitangan) selected @endif>{{ $sedia->nama_kakitangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan">Komen Pegawai Penyemak <div style="float:right">: </div></label>
                                <div class="col-md-10 col-sm-12 col-xs-12">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                @php $bil = 0 @endphp
                                @foreach($soalan_semak as $soalan_semak)
                                    @if($bil == 0)
									<tr>
                                        <td align="left" rowspan="{{ $soalan_semak->count() }}" valign="top"><font color="#FF0000">Komen Pegawai Penyemak</font> <div style="float:right">: </div></td>
                                        <td align="left">Tarikh Semakan : {{ $soalan_semak->tkh_kemaskini }} :<br>{{ $soalan_semak->kenyataan }}
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td align="left">Tarikh Semakan : {{ $soalan_semak->tkh_kemaskini }} :<br>{{ $soalan_semak->kenyataan }}
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </table>
								</div>
                             </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan">Diluluskan Oleh <div style="float:right">: </div></label>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <select name="lulus_oleh" disabled="disabled" class="form-control">
                                        <option value=""> -- Sila pilih -- </option>
                                        @foreach($lulus as $lulus)
                                        <option value="{{ $lulus->id_kakitangan }}" @if($soalan->lulus_oleh==$lulus->id_kakitangan) selected @endif>{{ $sedia->nama_kakitangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
							<hr />
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                    @if($usermenu->is_add=='1' || $usermenu->is_upd=='1')
                                      <input type="button" name="button" id="button" value="Simpan" class="btn btn-primary" onclick="do_simpan()" />

                                      <input type="button" name="button" id="button" value="Serah Ke Urusetia" style="max-width:180px" class="btn btn-primary" onclick="do_serah()" />
                                    @endif
                                      <input type="button" name="button3" id="kembali" value="Kembali" class="btn btn-default" onclick="do_page()" />

                                      <input type="hidden" name="soalan_id" id="soalan_id" value="{{ $soalan->soalan_id }}" />

	                                <textarea name="jawapan_text"  style="display:none;"></textarea>
                                    <textarea name="tambahan_text"  style="display:none;"></textarea>
                                    <input type="hidden" name="chk_input" value="" />

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
