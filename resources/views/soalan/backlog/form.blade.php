@extends('components.page')

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
<script language="javascript">
function do_sidang(){
  var l_type = $('#l_type').val();

  if(l_type.trim != ''){
    $.get('/soalan/daftar_backlog/search?l_type='+l_type,function(data){
        // console.log(data[0].length);

        $('#id_sidang').html('');
        $("#id_sidang").append(new Option('-- Pilih Nama Persidangan --', ''));
        for(i=0;i<data[0].length;i++){
            $("#id_sidang").append(new Option(data[0][i].persidangan, data[0][i].id_sidang));
        }
    });
  }
}

function do_lookup(){
    var sidang = $('#id_sidang').val();
    $('#nama_ap').html('');
    $.get('/soalan/daftar_backlog/lookup?sidang='+sidang,function(data){
        // console.log(data);

        $('.ahli_parlimen').attr('hidden',false)

        if(data[0] == 1){
            $('#label_oleh').html('<b>Kawasan Parlimen / YB :</b>');
            $("#nama_ap").append(new Option('-- Sila Pilih Nama Ahli Parlimen -- ', ''));
        } else {
            $('#label_oleh').html('<b>Yang Berhormat :</b>');
            $("#nama_ap").append(new Option(' -- Sila Pilih Nama Yang Berhormat -- ', ''));
        }

        for(i=0;i<data[1].length;i++){
            // console.log(data[1][i].nama_ap);
            if(data[0] == 1){
                $("#nama_ap").append(new Option(data[1][i].kod_kaw_ap+' : '+data[1][i].p_nama+' - '+data[1][i].nama_ap+' ('+data[1][i].parti+')', data[1][i].id_ap));
            } else {
                $("#nama_ap").append(new Option(data[1][i].nama_ap+' - '+data[1][i].kawasan_ap, data[1][i].id_ap));
            }
        }

        $('#nama_ap').selectpicker('refresh');
    })
}

function do_sel(){
	var theContents = document.getElementById('nama_ap')[document.getElementById('nama_ap').selectedIndex].innerHTML;
	var data = theContents.split(" - ");
	document.jakim.kawasan_parlimen.value = data[0];
	document.jakim.ahli_parlimen.value = data[1];
}

function do_tanya(val){
	if(val==2){
		document.getElementById("j_tanya_det").disabled = false;
	} else {
		document.getElementById("j_tanya_det").disabled = true;
	}
}

function do_save(){
  var l_type = $('#l_type').val();
	var tkh_soalan = $('#tkh_soalan').val();
	var no_soalan = $('#no_soalan').val();
	var j_tanya = $('#j_tanya').val();
	var id_sidang = $('#id_sidang').val();
	var ahli_parlimen = $('#ahli_parlimen').val();
	var kawasan_parlimen = $('#kawasan_parlimen').val();
	var j_kategori = $('#j_kategori').val();
	var mailContents = CKEDITOR.instances['soalan'].getData();
	document.jakim.soal.value=mailContents;
	var suratContents = CKEDITOR.instances['jawapan'].getData();
	document.jakim.jwb.value=suratContents;

	//alert("dd");
  if(l_type.trim() == ''){
    alert('Sila pilih dewan.');
    $('#l_type').focus(); return false;
  } else if(tkh_soalan.trim() == '' ){
    alert('Sila masukkan maklumat tarikh soalan.');
    $('#tkh_soalan').focus(); return false;
	} else if(no_soalan.trim() == '' ){
    alert('Sila masukkan maklumat nombor soalan.');
    $('#no_soalan').focus(); return false;
	} else if(j_tanya.trim() == '' ){
    alert('Sila pilih maklumat jenis pertanyaan.');
    $('#j_tanya').focus(); return false;
	} else if(id_sidang.trim() == '' ){
    alert('Sila pilih maklumat persidangan.');
    $('#id_sidang').focus(); return false;
	} else if(ahli_parlimen.trim() == '' ){
    alert('Sila pilih maklumat ahli parlimen.');
    $('#ahli_parlimen').focus(); return false;
	} else if(kawasan_parlimen.trim() == '' ){
    alert('Sila pilih maklumat ahli parlimen.');
    $('#kawasan_parlimen').focus(); return false;
	} else if(j_kategori.trim() == '' ){
    alert('Sila pilih maklumat kategori soalan.');
    $('#j_kategori').focus(); return false;
	} else if(mailContents.trim() == '' ){
    alert('Sila msukkan maklumat soalan.');
    $('#mailContents').focus(); return false;
  } else {
		$.ajax({
			url:'/soalan/daftar_backlog/store', //&datas='+datas,
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
						reload = window.location;
						window.location = reload;
					});
				}
			}
		});
    }
}

function do_back()
{
  window.location = '/soalan/daftar_backlog'
}
</script>
@php
  $ids=isset($_REQUEST["ids"])?$_REQUEST["ids"]:"";
  $s_dewan = $soalan->j_dewan ?? '';
  $s_tanya = $soalan->j_tanya ?? '';
  $s_tanya_det = $soalan->j_tanya_det ?? '';
  $s_sidang = $soalan->id_sidang ?? '';
  $s_ahli = $soalan->s_oleh ?? '';
  $s_kategori = $soalan->j_kategori ?? '';
  $s_jawab_oleh = $soalan->menteri ?? '';
@endphp
<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        <!-- PROFILE -->
        <div class="active tab-pane" id="profile">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><b>@if(empty($ids)) Tambah @else Kemaskini @endif Maklumat Daftar Soalan Backlog</b></h3><br />
              <!-- /.box-header -->
              @csrf
            </div>
            <div class="box-body">

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="menteri"><b>Soalan Bagi :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <select name="l_type"  id="l_type" class="form-control" onchange="do_sidang()">
                    <option value=""> -- Sila pilih -- </option>
                    <option value="1" @if ($s_dewan == '1') selected @endif>Dewan Rakyat</option>
                    <option value="2" @if ($s_dewan == '2') selected @endif>Dewan Negara</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh Soalan Dikemukakan :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input type="date" name="tkh_soalan" id="tkh_soalan" size="13" maxlength="10" class="form-control" value="{{ $soalan->tkh_soalan ?? '' }}"/>
                </div>
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"></label>
                <label class="control-label col-md-2 col-xs-12" for="no_soalan"><b>No. Soalan :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input type="text" name="no_soalan" id="no_soalan" value="{{ $soalan->no_soalan ?? '' }}"  class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="j_tanya"><b>Jenis Pertanyaan :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <select name="j_tanya" id="j_tanya" class="form-control"  onchange="do_tanya(this.value)">
                    <option value=""> -- Sila Pilih -- </option>
                    @foreach($tanya as $tanya)
                    <option value="{{ $tanya->j_tanya }}" @if ($s_tanya == $tanya->j_tanya) selected @endif>{{ $tanya->pertanyaan }}</option>
                    @endforeach
                  </select>
                </div>
                <label class="control-label col-md-2 col-xs-12" for="j_tanya"></label>
                <label class="control-label col-md-2 col-xs-12" for="j_tanya_det"><b>Pertanyaan Bagi: </b></label>
                <div class="col-md-3 col-sm-12 col-xs-12" id="tanya_detail">
                  <select name="j_tanya_det" id="j_tanya_det" class="form-control" disabled>
                    <option value=""></option>
                    <option value="MQT" @if ($s_tanya_det == 'MQT') selected @endif>Pertanyaan MQT</option>
                    <option value="LISAN" @if ($s_tanya_det == 'LISAN') selected @endif>Pertanyaan LISAN</option>
                    <option value="KAMAR KHAS" @if ($s_tanya_det == 'KAMAR KHAS') selected @endif>Pertanyaan KAMAR KHAS</option>
                    <option value="USUL" @if ($s_tanya_det == 'USUL') selected @endif>Pertanyaan USUL</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="id_sidang"><b>Sidang :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <select name="id_sidang" id="id_sidang" class="form-control" onchange="do_lookup()">
                    <option value="">-- Pilih Nama Persidangan --</option>
                    @if (!empty($ids))
                    @foreach ($sidang as $sid)
                    <option value="{{ $sid->id_sidang }}" @if ($s_sidang == $sid->id_sidang) selected @endif>{{ $sid->persidangan }}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>

              <div class="form-group ahli_parlimen" @if (empty($user)) hidden @endif>
                <label class="control-label col-md-2 col-xs-12" for="s_oleh" id="label_oleh"></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <input type="hidden" name="s_oleh" id="s_oleh" value="{{ $soalan->s_oleh ?? '' }}" class="form-control" />
                  <select name="nama_ap" id="nama_ap" onChange="do_sel()" class="form-control input-lg" data-live-search="true" style="height:50px">
                    <option value=""> -- Sila Pilih Ahli Parlimen -- </option>
                    @if ($ids)
                    @foreach ($ahli as $ahli)
                    @if ($ahli->type == 'AP')
                    <option value="{{ $ahli->id_ap }}" @if ($s_ahli == $ahli->id_ap) selected @endif>{{ $ahli->kod_kaw_ap }} : {{ $ahli->p_nama }} - {{ $ahli->nama_ap }} ({{ $ahli->parti }})</option>
                    @else
                    <option value="{{ $ahli->id_ap }}" @if ($s_ahli == $ahli->id_ap) selected @endif>{{ $ahli->nama_ap }} - {{ $ahli->kawasan_ap }}</option>
                    @endif
                    @endforeach
                    @endif
                  </select>
                  <input name="ahli_parlimen" id="ahli_parlimen" type="hidden" size="50" value="{{ $soalan->soalan_oleh ?? '' }}" readonly />
                  <input name="kawasan_parlimen" id="kawasan_parlimen" type="hidden" size="50" value="{{ $soalan->soalan_kawasan ?? '' }}" readonly />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="j_kategori"><b>Kategori/Klasifikasi :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <select name="j_kategori" id="j_kategori" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}" @if ($s_kategori == $kat->id_kategori) selected @endif>{{ $kat->nama_kategori }}</option>
                    @endforeach
                  </select>
                </div>
                <label class="control-label col-md-2 col-xs-12"></label>
                <label class="control-label col-md-2 col-xs-12" for="j_kategori_sub"><b>Sub-Kategori :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <select name="j_kategori_sub" id="j_kategori_sub" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    @foreach($sub as $sub)
                    <option value="{{ $sub->idsub_kategori }}">{{ $sub->nama_sub_kategori }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="j_kategori"><b>Soalan :</b><br /><br />
                  <i style="font-size:11px">
                    <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br />
                    <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                  </i>
                </label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <textarea name="soalan" id="soalan" cols="70" rows="6" style="width:100%" class="form-control">{{ $soalan->soalan ?? '' }}</textarea>
                </div>
              </div>

              <hr />

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="j_kategori"><b>Jawapan :</b><br /><br />
                  <i style="font-size:11px">
                    <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br />
                    <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                  </i>
                </label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <textarea name="jawapan" id="jawapan" cols="70" rows="6" style="width:100%" class="form-control">{{ $soalan->jawapan ?? '' }}</textarea>
                </div>
              </div>

              <hr />

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="menteri"><b>Dijawab Oleh :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <select name="menteri"  id="menteri" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    <option value="YB Menteri" @if ($s_jawab_oleh == "YB Menteri") selected @endif>YB Menteri</option>
                    <option value="YB Timbalan Menteri" @if ($s_jawab_oleh == "YB Timbalan Menteri") selected @endif>YB Timbalan Menteri</option>
                    <option value="Dijawab oleh Agensi Lain" @if ($s_jawab_oleh == "Dijawab oleh Agensi Lain") selected @endif>Dijawab oleh Agensi Lain</option>
                  </select>
                </div>
                <label class="control-label col-md-2 col-xs-12" for="menteri"></label>
                <label class="control-label col-md-2 col-xs-12" for="menteri"><b>Tarikh Jawapan Di Parlimen :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input name="tkh_jwb_parlimen" id="tkh_jwb_parlimen" type="date" class="form-control" value="{{ $soalan->tkh_jwb_parlimen ?? '' }}" />
                </div>
              </div>

              <hr />
              <div class="form-group" align="center">
                <input type="button" id="button" value="Simpan" class="btn btn-primary" onclick="do_save()" />
                <input type="button" id="button" value="Kembali" class="btn btn-default" onclick="do_back()" />
                <input name="ids" id="ids" type="hidden" value="{{ $ids ?? '' }}" readonly />
                <textarea name="soal" style="display:none;width:100%" rows="3"></textarea>
                <textarea name="jwb" style="display:none;width:100%" rows="3"></textarea>
              </div>

            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
CKEDITOR.replace( 'soalan' );
CKEDITOR.replace( 'jawapan' );

$('#nama_ap').selectpicker('refresh');

document.getElementById("j_tanya_det").disabled = true;
</script>
@endsection
