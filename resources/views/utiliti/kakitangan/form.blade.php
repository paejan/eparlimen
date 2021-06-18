<script language="javascript">
function do_simpan(){

    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var no_kp_kakitangan = $('#no_kp_kakitangan').val();
    var nama_kakitangan = $('#nama_kakitangan').val();
    var no_telefon = $('#no_telefon').val();
    var no_hp = $('#no_hp').val();
    var email = $('#email').val();
    var id_bahagian = $('#id_bahagian').val();
    var type = $('#type').val();
    var stat = $('#stat').val();

    //alert("dd");
    if(no_kp_kakitangan.trim() == '' ){
        alert('Sila masukkan maklumat No. Pengenalan.');
        $('#no_kp_kakitangan').focus(); return false;
    } else if(nama_kakitangan.trim() == '' ){
        alert('Sila masukkan maklumat nama.');
        $('#nama_kakitangan').focus(); return false;
    } else if(no_telefon.trim() == '' ){
        alert('Sila masukkan maklumat no. telefon.');
        $('#no_telefon').focus(); return false;
    } else if(no_hp.trim() == '' ){
        alert('Sila masukkan maklumat no. telefon bimbit.');
        $('#no_hp').focus(); return false;
    } else if(email.trim() == '' ){
        alert('Sila masukkan maklumat emel.');
        $('#email').focus(); return false;
    } else if(id_bahagian.trim() == '' ){
        alert('Sila pilih maklumat jabatan.');
        $('#id_bahagian').focus(); return false;
    } else if(type.trim() == '' ){
        alert('Sila masukkan peranan pengguna.');
        $('#type').focus(); return false;
    } else if(stat.trim() == '' ){
        alert('Sila pilih status pengguna.');
        $('#stat').focus(); return false;
    }
    
    $.ajax({
        url:'/utiliti/kakitangan/store', //&datas='+datas,
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
            } else if(data=='ADA'){
                swal({
                title: 'Pemberitahuan',
                text: 'Nama pegawai telah ada di dalam sistem.',
                type: 'error',
                confirmButtonClass: "btn-Info",
                confirmButtonText: "Ok",
                showConfirmButton: true,
                });
            }
        }
    });
}

function do_close()
{
    window.location.reload();
}
</script>
@php
    $ids = $rsData->id_kakitangan ?? '';
    $bahagian = $rsData->id_bahagian ?? '';
    $type = $rsData->type ?? '';
    $status = $rsData->status ?? '';
    $is_semak = $rsData->is_semak ?? '';
    $is_lulus = $rsData->is_lulus ?? '';
@endphp
<div class="col-md-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b class="modal-title">@if(empty($ids)) Tambah @else Kemaskini @endif Pengguna Sistem</b></font></h6>
    </header>
    <div class="panel-body">
        <input type="hidden" id="ids" name="ids" value="{{ $rsData->id_kakitangan ?? '' }}">

        <div class="col-md-12">
            @if (!empty($rsData))
            <div class="form-group" id="user-id">
            	<div class="row">
                <label class="col-sm-3 control-label">ID Pengguna : </label>
                <div class="col-sm-3">
                    <input type="text" name="userid" id="userid" class="form-control" placeholder="ID Pengguna" disabled="disabled" value="{{ $rsData->userid ?? '' }}">
                </div>
                </div>
            </div>
            @endif
            
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> No Kad Pengenalan : </label>
                <div class="col-sm-3">
                    <input type="text" name="no_kp_kakitangan" id="no_kp_kakitangan" class="form-control" placeholder="No. Kad Pengenalan" 
                    value="{{ $rsData->no_kp_kakitangan ?? '' }}" maxlength="12" 
                    onkeydown="return (event.ctrlKey || event.altKey 
                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                        || (95<event.keyCode && event.keyCode<106)
                        || (event.keyCode==8) || (event.keyCode==9) 
                        || (event.keyCode>34 && event.keyCode<40) 
                        || (event.keyCode==46) )" > 
                </div>
                <div class="col-sm-5">&nbsp;<i>(Sila masukkan No. MyKID tanpa tanda '-')</i>
				</div>
				</div>
            </div>
            
            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Penuh : </label>
                <div class="col-sm-8">
                    <input type="text" name="nama_kakitangan" id="nama_kakitangan" class="form-control" value="{{ $rsData->nama_kakitangan ?? '' }}">
                </div>
				</div>
            </div>
 
            <div class="form-group">
            	<div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> E-mel :</label>
                <div class="col-md-8 control-label">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email" name="email" data-plugin-masked-input data-input-mask="" placeholder="abc@gmail.com" class="form-control" value="{{ $rsData->email ?? '' }}">
                    </div>
				</div>
                </div>
            </div> 
            
            <div class="form-group">
            	<div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> No. Telefon :</label>
                <div class="col-md-4 control-label">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input id="no_telefon" name="no_telefon" data-plugin-masked-input data-input-mask="" placeholder="(03) 1223-1234" class="form-control"  
                        value="{{ $rsData->no_telefon ?? '' }}" required >
                    </div>
                </div>
				</div>
            </div>
            <div class="form-group">
            	<div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> No. Telefon Bimbit :</label>
                <div class="col-md-4 control-label">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile"></i>&nbsp;</span>
                        <input id="no_hp" name="no_hp" data-plugin-masked-input data-input-mask="" placeholder="(013) 122-1234" class="form-control" value="{{ $rsData->no_hp ?? '' }}" required >
                    </div>
                </div>
				</div>
            </div>

            <div class="form-group">
            	<div class="row">
                <label class="col-md-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Bahagian :</label>
                <div class="col-md-4">
                <select name="id_bahagian" id="id_bahagian" class="form-control">
                    <option value="">Sila pilih agensi</option>
                    @foreach($bah as $bah)
                    <option value="{{ $bah->id_bahagian }}" @if ($bah->id_bahagian == $bahagian) selected @endif>{{ $bah->nama_bahagian }}</option>
                    @endforeach
                </select>
                </div>
				</div>
            </div> 

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Gred : </label>
                <div class="col-sm-6">
                    <input type="text" name="gred" id="gred" class="form-control" value="{{ $rsData->gred ?? '' }}">
                </div>
				</div>
            </div> 

            <div class="form-group">
            	<div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Jawatan : </label>
                <div class="col-sm-6">
                    <input type="text" name="jawatan_kakitangan" id="jawatan_kakitangan" class="form-control" value="{{ $rsData->jawatan_kakitangan ?? '' }}">
                </div>
				</div>
            </div> 

          
        	<div class="form-group">
            	<div class="row">
                    <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Peranan: </label>
                    <div class="col-sm-3">
                        <select class="form-control" id="type" name="type">
                            <option value="">Sila Pilih</option>
                            <option value="P" @if ($type == 'P') selected @endif>Pegawai Bertugas</option>
                            <option value="U" @if ($type == 'U') selected @endif>Urusetia Parlimen</option>
                            <option value="B" @if ($type == 'B') selected @endif>Pengguna Bahagian / Penyedia Jawapan</option>
                            <option value="D" @if ($type == 'D') selected @endif>Pemandu</option>
                            <option value="A" @if ($type == 'A') selected @endif>Administrator</option>
                        </select> 
                    </div>
                    <label class="col-md-1 control-label"></label>
                    <label class="col-md-2 control-label"><font color="#FF0000">*</font> Status Pengguna:</label>
                    <div class="col-md-2">
                        <select class="form-control" id="stat" name="stat">
                            <option value="">Sila Pilih</option>
                            <option value="0" @if (empty($status)) selected @endif>Aktif</option>
                            <option value="1" @if ($status == '1') selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
				</div>
            </div> 
            
            <div class="form-group">
            	<div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> Status Tindakan:</label>
                <div class="col-md-6 control-label">
                    <div class="input-group">
                        <input type="checkbox" name="is_semak" @if ($is_semak == '1') checked='checked' @endif/>
                        &nbsp;Penyemak Jawapan
                        &nbsp;&nbsp;
                        <input type="checkbox" name="is_lulus" @if ($is_lulus == '1') checked='checked' @endif/>
                        &nbsp;Pelulus Jawapan
                    </div>
				</div>
                </div>
            </div> 
            
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-sm-8">
                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                    	<i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
                </div> 
            </div>		 
          </div>
</section>

</div> 