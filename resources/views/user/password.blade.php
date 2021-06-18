<script language="javascript">    
    function do_simpan(){
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
    
        //alert("dd");
        if(password1.trim() == '' ){
            alert('Sila masukkan maklumat katalaluan baru anda');
            $('#password1').focus(); return false;
        } else if(password2.trim() == '' ){
            alert('Sila ulang kataluan baru anda.');
            $('#password2').focus(); return false;
        } else if(password1.trim() != password2.trim()){
            alert('Katalaluan anda tidak sama');
            $('#password2').focus(); return false;
        } else {
            if(password1.length <= 5){
                alert('Katalaluan anda terlalu pendek, perlu lebih 5 aksara');
                $('#password1').focus(); return false;
            } else {
    
                $.ajax({
                    url:'/user_store?type=pass', //&datas='+datas,
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
                        }
                    }
                });
            }
        }
    }
    
</script>

<div class="col-md-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h6 class="panel-title"><font color="#000000" size="3"><b>Tukar Kata Laluan Pengguna</b></font></h6>
    </header>
    <div class="panel-body">
        @csrf
        <input type="hidden" name="id" value="{{ $rsData->id_kakitangan }}">
        <div class="col-md-12">
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label">ID Pengguna: </label>
                <div class="col-sm-3">
                    <input type="text" name="username" id="username" class="form-control" placeholder="ID Pengguna" disabled="disabled" 
                    value="{{ $rsData->userid }}">
                </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>No Kad Pengenalan: </label>
                <div class="col-sm-3">
                    <input type="text" name="ic" id="ic" class="form-control" placeholder="No Kad Pengenalan" 
                    value="{{ $rsData->no_kp_kakitangan }}" maxlength="12" readonly="readonly"> 
                </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Nama Penuh: </label>
                <div class="col-sm-8">
                    <input type="text" name="nama" id="nama" class="form-control" readonly="readonly" 
                    value="{{ $rsData->nama_kakitangan }}">
                </div>
                </div>
            </div>
    
            <div class="form-group">
                <div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> Katalaluan Baru :</label>
                <div class="col-md-4 control-label">
                    <input id="password1" name="password1" type="password" class="form-control" value="" required >
                </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                <label class="col-md-3 control-label"><font color="#FF0000">*</font> Ulang Katalaluan Baru :</label>
                <div class="col-md-4 control-label">
                    <input id="password2" name="password2" type="password" class="form-control" value="" required >
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
<script language="javascript">
$('#password1').focus(); 
</script>