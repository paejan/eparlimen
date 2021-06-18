<script language="javascript">    
    function do_simpan(){
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var bah = $('#bah').val();
        var jawatan = $('#jawatan_kakitangan').val();
        var notel = $('#no_telefon').val();
        var email = $('#email').val();
    
        //alert("dd");
        if(bah.trim() == '' ){
            alert('Sila masukkan maklumat bahagian.');
            $('#bah').focus(); return false;
        } else if(jawatan.trim() == '' ){
            alert('Sila masukkan maklumat jawatan.');
            $('#jawatan').focus(); return false;
        } else if(notel.trim() == '' ){
            alert('Sila masukkan maklumat no. telefon.');
            $('#notel').focus(); return false;
        /*} else if(nohp.trim() == '' ){
            alert('Sila masukkan maklumat no. telefon bimbit.');
            $('#nohp').focus(); return false;*/
        } else if(email.trim() == '' ){
            alert('Sila masukkan maklumat email.');
            $('#email').focus(); return false;
        } else {
            $.ajax({
                url:'/user_store?type=profile', //&datas='+datas,
                type:'POST',
                //dataType: 'json',
                beforeSend: function () {
                    $('#simpan').attr("disabled","disabled");
                    $('.dispmodal').css('opacity', '.5');
                },
                data: $("form").serialize(),
                //data: datas,
                success: function(data){
                    //console.log(data);
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
                    }
                }
            });
        }
    }
    
</script>
<div class="col-md-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h6 class="panel-title"><font color="#000000" size="3"><b>Kemaskini Profile Pengguna</b></font></h6>
    </header>
    <div class="panel-body">
        @csrf
        <input type="hidden" name="id" value="{{ $rsData->id_kakitangan }}">
        <div class="col-md-12">
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label">ID Pengguna : </label>
                    <div class="col-sm-3">
                        <input type="text" name="userid" id="userid" class="form-control" placeholder="ID Pengguna" disabled="disabled" value="{{ $rsData->userid }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>No Kad Pengenalan : </label>
                <div class="col-sm-3">
                    <input type="text" name="no_kp_kakitangan" id="no_kp_kakitangan" class="form-control" placeholder="No Kad Pengenalan" 
                    value="{{ $rsData->no_kp_kakitangan }}" maxlength="12" readonly="readonly"> 
                </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Nama Penuh : </label>
                <div class="col-sm-8">
                    <input type="text" name="nama_kakitangan" id="nama_kakitangan" class="form-control" readonly="readonly" 
                    value="{{ $rsData->nama_kakitangan }}">
                </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Agensi : </label>
                <div class="col-sm-8">
                    <input type="text" name="nama" id="nama" class="form-control" readonly="readonly" value="Jabatan Kemajuan Islam Malaysia">
                </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Bahagian : </label>
                <div class="col-sm-8">
                    <input type="text" name="bah" id="bah" class="form-control" readonly="readonly" value="{{ $rsData->bahagian->nama_bahagian }}">
                </div>
                </div>
            </div> 

            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Jawatan : </label>
                <div class="col-sm-8">
                    <input type="text" name="jawatan_kakitangan" id="jawatan_kakitangan" class="form-control"value="{{ $rsData->jawatan_kakitangan }}">
                </div>
                </div>
            </div> 
            
            <div class="form-group">
                <div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> No. Telefon :</label>
                <div class="col-md-4 control-label">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                        <input id="no_telefon" name="no_telefon" data-plugin-masked-input data-input-mask="" placeholder="(03) 1123-1234" class="form-control"  
                        value="{{ $rsData->no_telefon }}" required >
                    </div>
                </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> No. HP :</label>
                <div class="col-md-4 control-label">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fax"></i></span>
                        <input id="no_hp" name="no_hp" data-plugin-masked-input data-input-mask="" placeholder="(013) 123-1234" class="form-control"  
                        value="{{ $rsData->no_hp }}" required >
                    </div>
                </div>
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> E-mel:</label>
                <div class="col-md-6 control-label">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email" name="email" data-plugin-masked-input data-input-mask="" placeholder="abc@gmail.com" class="form-control" 
                        value="{{ $rsData->email }}">
                    </div>
                </div>
                </div>
            </div> 
            
            
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-sm-8">
                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                        <i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
                </div> 
            </div>
                                
            
            </div>
        
</section>

</div> 