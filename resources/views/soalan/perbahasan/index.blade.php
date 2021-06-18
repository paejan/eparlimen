@extends('components.page')

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
<script language="javascript">
function do_save(){
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var tkh_soalan = $('#tkh_soalan').val();
	var no_soalan = $('#no_soalan').val();
	var j_tanya = $('#j_tanya').val();
	var tkh_agihan = $('#tkh_agihan').val();
	var id_sidang = $('#id_sidang').val();
	var ahli_parlimen = $('#ahli_parlimen').val();
	var kawasan_parlimen = $('#kawasan_parlimen').val();
	var j_kategori = $('#j_kategori').val();
	var mailContents = CKEDITOR.instances['soalan'].getData();
	document.jakim.docs.value=mailContents;

	//alert("dd");
    if(tkh_soalan.trim() == '' ){
      alert('Sila masukkan maklumat tarikh soalan.');
      $('#tkh_soalan').focus(); return false;
	} else if(no_soalan.trim() == '' ){
      alert('Sila masukkan maklumat nombor soalan.');
      $('#no_soalan').focus(); return false;
	} else if(j_tanya.trim() == '' ){
      alert('Sila pilih maklumat jenis pertanyaan.');
      $('#j_tanya').focus(); return false;
	} else if(tkh_agihan.trim() == '' ){
      alert('Sila masukkan maklumat tarikh agihan.');
      $('#tkh_agihan').focus(); return false;
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
			url:'/soalan/daftar_form_bhs/store', //&datas='+datas,
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

function do_hapus(id_ap){
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
			url:'/soalan/daftar_form_bhs/delete/'+id_ap, //&datas='+datas,
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
						window.location = '/soalan/daftar';
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

function do_sel(){
	var theContents = document.getElementById('nama_ap')[document.getElementById('nama_ap').selectedIndex].innerHTML;
	var data = theContents.split(" - ");
	document.jakim.kawasan_parlimen.value = data[0];
	document.jakim.ahli_parlimen.value = data[1];
}

function do_lookup(){
    var sidang = $('#id_sidang').val();

    $('#nama_ap').html('');
    $.get('/soalan/daftar_form_bhs/sidang/'+sidang,function(data){
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

function SelectData(){
    var bahagian = $('#bahagian').val();

    $('#lstPegawai').html('');

    $.get('/soalan/daftar_form_bhs/'+bahagian,function(data){
        // console.log(data.length);

        $("#lstPegawai").append(new Option('-- Sila Pilih --', ''));
        for(i=0;i<data.length;i++){
            $("#lstPegawai").append(new Option(data[i].nama_kakitangan, data[i].id_kakitangan));
        }
    })
}

function do_back()
{
  window.location = "/soalan/daftar/"
}
</script>

@php
$user = $soalan ?? '';
$id = $user->soalan_id ?? '';
$kod_bahagian = $user->kod_bahagian ?? '';
$status = $user->status ?? 0;
$j_tanya = $user->j_tanya ?? '';
$j_tanya_det = $user->j_tanya_det ?? '';
$s_oleh = $user->s_oleh ?? '';
$id_sidang = $user->id_sidang ?? '';
$j_kategori = $user->j_kategori ?? '';
$kod_bahagian = $user->kod_bahagian ?? '';
$staff = $user->peg_id ?? '';
$menteri = $user->menteri ?? '';
$tkh_masuk = date('d/m/Y', strtotime($user->create_dt ?? now()));
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
                <h3 class="box-title"><b> @if(empty($id))Tambah @else Kemaskini @endif Maklumat Daftar Soalan Perbahasan</b></h3><br />
              </div>
              <!-- /.box-header -->
              @csrf
            </div>
            <div class="box-body">
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh Soalan Dikemukakan :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input type="date" name="tkh_soalan" id="tkh_soalan" size="13" maxlength="10" class="form-control" value="{{ $user->tkh_soalan ?? '' }}"/>
                </div>
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk">&nbsp;</label>
                <label class="control-label col-md-2 col-xs-12" for="no_soalan"><b>No. Soalan :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input type="text" name="no_soalan" id="no_soalan" value="{{ $user->no_soalan ?? '' }}"  class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="j_tanya"><b>Jenis Pertanyaan :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input type="hidden" name="j_tanya" id="j_tanya" value="2"  class="form-control" />LISAN
                </div>
                <label class="control-label col-md-2 col-xs-12" for="j_tanya"></label>
                <label class="control-label col-md-2 col-xs-12" for="j_tanya_det"><b>Usul: </b></label>
                <div class="col-md-3 col-sm-12 col-xs-12" id="tanya_detail">
                  <select name="j_tanya_det" id="j_tanya_det" class="form-control">
                    <option value=""></option>
                    <option value="BUDGET" @if($j_tanya_det == 'BUDGET') selected @endif>Perbahasan Bajet</option>
                    <option value="BUDGET" @if($j_tanya_det == 'MQT') selected @endif>Perbahasan Rang Undang-Undang Perbekalan</option>
                    <option value="AGUNG" @if($j_tanya_det == 'YDPA') selected @endif>Perbahasan Yand DiPertuan Agung</option>
                    <option value="MQT" @if($j_tanya_det == 'KAMAR KHAS') selected @endif>Perbahasan Kamar Khas</option>
                    <option value="MQT" @if($j_tanya_det == 'MQT') selected @endif>Perbahasan MQT</option>
                    <option value="MQT" @if($j_tanya_det == 'LAIN') selected @endif>Perbahasan Lain-lain</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Tarikh Di Agihkan :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input type="date" name="tkh_agihan" id="tkh_agihan" value="{{ $user->tkh_agihan ?? '' }}"class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="id_sidang"><b>Sidang :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <select name="id_sidang" id="id_sidang" class="form-control" onchange="do_lookup()">
                    <option value="">-- Pilih nama persidangan --</option>
                    @foreach($sidang as $sid)
                    <option value="{{ $sid->id_sidang }}" @if($id_sidang == $sid->id_sidang) selected @endif>{{ $sid->persidangan }} ({{ $sid->dewan->dewan }})</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group ahli_parlimen" @if (empty($user)) hidden @endif>
                <label class="control-label col-md-2 col-xs-12" for="s_oleh" id="label_oleh"></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <input type="hidden" name="s_oleh" id="s_oleh" value="{{ $user->s_oleh ?? '' }}" class="form-control" />
                  <select name="nama_ap" id="nama_ap" onChange="do_sel()" class="form-control input-lg" data-live-search="true" style="height:30px">
                  </select>
                  <input name="ahli_parlimen" id="ahli_parlimen" type="hidden" size="50" value="{{ $user->soalan_oleh ?? '' }}" readonly />
                  <input name="kawasan_parlimen" id="kawasan_parlimen" type="hidden" size="50" value="{{ $user->soalan_kawasan ?? '' }}" readonly />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="j_kategori"><b>Kategori/Klasifikasi :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <select name="j_kategori" id="j_kategori" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}" @if($j_kategori == $kat->id_kategori) selected @endif>{{ $kat->nama_kategori }}</option>
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
                  <textarea name="soalan" id="soalan" cols="70" rows="6" style="width:100%" class="form-control">{{ $user->soalan ?? '' }}</textarea>
                </div>
              </div>

              <hr />

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="bahagian"><b>Bahagian :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <select name="bahagian"  id="bahagian" class="form-control" onChange="SelectData()">
                    <option value=""> -- Sila pilih -- </option>
                    @foreach($bahagian as $bah)
                    <option value="{{ $bah->id_bahagian }}" @if($kod_bahagian == $bah->id_bahagian) selected  @endif>{{ $bah->nama_bahagian }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="lstPegawai"><b>Nama Pegawai :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <select name="lstPegawai"  id="lstPegawai" class="form-control">
                    <option value="">-- Sila Pilih --</option>
                    @if(!empty($id))
                    @foreach($kakitangan as $kt)
                    <option value="{{ $kt->id_kakitangan }}" @if($staff == $kt->id_kakitangan) selected @endif>{{ $kt->nama_kakitangan }}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_dedline"><b>Tarikh Sasaran :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input name="tkh_dedline" id="tkh_dedline" type="date" class="form-control" value="{{ $user->tkh_dedline ?? '' }}" />
                </div>
              </div>

              <hr />

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="menteri"><b>Dijawab Oleh :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <select name="menteri"  id="menteri" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    <option value="YB Menteri" @if($menteri == 'YB Menteri') selected   @endif>YB Menteri</option>
                    <option value="YB Timbalan Menteri" @if($menteri == 'YB Timbalan Menteri') selected   @endif>YB Timbalan Menteri</option>
                    <option value="Dijawab oleh Agensi Lain" @if($menteri == 'Dijawab oleh Agensi Lain') selected   @endif>Dijawab oleh Agensi Lain</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="menteri"><b>Tarikh Jawapan Di Parlimen :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                  <input name="tkh_jwb_parlimen" id="tkh_jwb_parlimen" type="date" class="form-control" value="{{ $user->tkh_jwb_parlimen ?? '' }}" />
                </div>
                <label class="control-label col-md-2 col-xs-12" for="menteri">&nbsp;</label>
                <label class="control-label col-md-2 col-xs-12" for="menteri"><b>Tarikh Kemasukan Data :</b></label>
                <div class="col-md-3 col-sm-12 col-xs-12">
                {{ $tkh_masuk}}
                  <input name="tkh_masuk" id="tkh_masuk" type="hidden" class="form-control" value="{{ $tkh_masuk }}" />
                </div>
              </div>

              <hr />

              <div class="form-group" align="center">
              @if($status <> 2)
                @if($status <= 1)
                  @if($usermenu->is_add == 1 || $usermenu->is_upd == 1)
                  <input type="button" id="button" value="Simpan" class="btn btn-primary" onclick="do_save()" />
                  @endif
                  @if(!empty($id))
                    @if($status <= 1)
                      @if($usermenu->is_upd == 1)
                      <input type="button" id="button" value="Simpan & Agih" class="btn btn-primary" onclick="do_save()" />
                      @endif
                    @endif
                    @if(!empty(Auth::user()->type) && Auth::user()->type == 'A')
                      @if($usermenu->is_del == 1)
                      <input type="button" id="button" value="Hapus" class="btn btn-primary" onclick="do_hapus('{{ $user->soalan_id }}')" />
                      @endif
                    @endif
                    @if(Auth::user()->id_bahagian==$kod_bahagian && Auth::user()->type == 'U')
                      @if($usermenu->is_del == 1)
                      <input type="button" id="button" value="Hapus" class="btn btn-primary" onclick="do_hapus('{{ $user->soalan_id }}')" />
                      @endif
                    @endif
                  @endif
                @endif
              @endif
                @if (!Request::is('soalan/daftar_form_*'))
                <input type="button" id="button" value="Kembali" class="btn btn-primary" onclick="do_back()" />
                @endif
                <input type="hidden" name="soalan_id" value="{{ $id }}" />
                <textarea name="docs" style="display:none;width:100%" rows="3"></textarea>
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

$('#nama_ap').selectpicker('refresh');
</script>
@endsection
