@extends('components.page')

@section('content')
<script language="javascript">
function do_submit(URL){
	if(document.jakim.j_dewan.value==''){
		alert("Sila pilih Dewan Persidangan");
		document.jakim.j_dewan.focus();
	} else if(document.jakim.id_sidang.value==''){
		alert("Sila pilih maklumat persidangan");
		document.jakim.id_sidang.focus();
	} else {
		document.jakim.action = '/peg_bertugas/cetak_peg/view?pro=HARI';
		document.jakim.target = '_blank';
		document.jakim.method = 'GET';
		document.jakim.submit();
	}
}

function do_sidang(){
    var j_dewan = $('#j_dewan').val();
    var id_sidang = $('#id_sidang').val();
    var pathname = window.location.pathname;

    // alert(pathname);
    if(j_dewan.trim() == '' && id_sidang.trim() == '') {
        window.location = pathname;
    } else {
        window.location = pathname+'?j_dewan='+j_dewan+'&id_sidang='+id_sidang;
    }
}

</script>
@php
$lj_dewan=isset($_REQUEST["j_dewan"])?$_REQUEST["j_dewan"]:"";
$lj_sidang=isset($_REQUEST["id_sidang"])?$_REQUEST["id_sidang"]:"";
@endphp
<div class="box" style="background-color:#F2F2F2">
    <input type="hidden" value="HARI" name="pro" id="pro"/>
	<div class="box-body">
        <div class="x_panel">
            <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
                <div class="panel-actions"></div>
                <h6 class="panel-title" align="center"><font color="#000000"><b>CETAK JADUAL PEGAWAI BERTUGAS</b></font></h6> 
            </header>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Dewan :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">
                <select name="j_dewan" id="j_dewan" onChange="do_sidang()" class="form-control">
                    <option value=""> -- Sila pilih -- </option>
                    @foreach ($dewan as $dewan)
                    <option value="{{ $dewan->j_dewan }}" @if($lj_dewan == $dewan->j_dewan) selected @endif>{{ $dewan->dewan }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Maklumat Persidangan :</b></label>
                <div class="col-md-8 col-sm-12 col-xs-12">
                <select name="id_sidang" id="id_sidang" onChange="do_sidang()" class="form-control">
                    <option value="">-- Pilih nama persidangan --</option>
                    @foreach ($sidang as $sidang)
                    <option value="{{ $sidang->id_sidang }}" @if($lj_sidang == $sidang->id_sidang) selected @endif>{{ $sidang->persidangan }}</option>
                    @endforeach
                 </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tarikh Mula :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">
                	<input name="mula" type="date" size="10" maxlength="10" value="{{ optional($date)->start_dt }}" class="form-control" style="height:40px" />
                </div>
                <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tarikh Hingga :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">
                	<input name="hingga" type="date" size="10" maxlength="10" value="{{ optional($date)->end_dt }}" class="form-control" style="height:40px" />
                </div>
            </div>
			<br />
            <div class="form-group">
				<div align="center">
               	    <input type="button" value="Cetak Jadual" style="cursor:pointer" class="btn btn-primary" onClick="do_submit()"/>
                </div>
            </div>
            <br /><br>
        </div>
     </div>
</div>         
@endsection