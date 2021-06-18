@extends('components.page')

@section('content')
<script language="javascript">
function do_submit(){
  var j_dewan = $('#j_dewan').val();
  var id_sidang = $('#id_sidang').val();
  var mula = $('#mula').val();
  var hingga = $('#hingga').val();
  
  // alert(mula);

  if(mula.trim() =='') {
    mula = '0';
  } 
  if(hingga.trim() =='') {
    hingga = '0';
  }

	if(j_dewan.trim()==''){
		alert("Sila pilih Dewan Persidangan");
		document.jakim.j_dewan.focus();
	} else if(id_sidang.trim()==''){
		alert("Sila pilih maklumat persidangan");
		document.jakim.id_sidang.focus();
	} else {
    window.open("/laporan/laporan_pertanyaan/"+mula+"/"+hingga+"/"+j_dewan+"/"+id_sidang);
	}
}

function do_sidang(){
  var j_dewan = $('#j_dewan').val();
  var id_sidang = $('#id_sidang').val();

  if(j_dewan.trim() == '' && id_sidang.trim() == '') {
    window.location = '/laporan/laporan_pertanyaan';
  } else {
    window.location = '/laporan/laporan_pertanyaan?j_dewan='+j_dewan+'&id_sidang='+id_sidang;
  }

}
</script>
@php
$j_dewan = isset($_REQUEST["j_dewan"])?$_REQUEST["j_dewan"]:"";
$id_sidang = isset($_REQUEST["id_sidang"])?$_REQUEST["id_sidang"]:"";
@endphp
<div class="box" style="background-color:#F2F2F2">
  <div class="box-body">
    <div class="x_panel">
      <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <div class="panel-actions">
          <!--<a href="#" class="fa fa-caret-down"></a>
          <a href="#" class="fa fa-times"></a>-->
        </div>
        <h6 class="panel-title" align="center"><font color="#000000"><b>CETAK LAPORAN</b></font></h6> 
      </header>
    </div>
    <div class="box-body">
      <div class="form-group">
        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Dewan :</b></label>
        <div class="col-md-2 col-sm-12 col-xs-12">
          <select name="j_dewan" id="j_dewan" onChange="do_sidang()" class="form-control">
            <option value=""> -- Sila pilih -- </option>
            @foreach($dewan as $dew)
            <option value="{{ $dew->j_dewan }}" @if($j_dewan == $dew->j_dewan) selected @endif>{{ $dew->dewan }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Maklumat Persidangan :</b></label>
        <div class="col-md-8 col-sm-12 col-xs-12">
          <select name="id_sidang" id="id_sidang" onChange="do_sidang()" class="form-control">
            <option value="">-- Pilih nama persidangan --</option>
            @foreach($sidang as $sid)
            <option value="{{ $sid->id_sidang }}" @if($id_sidang == $sid->id_sidang) selected @endif>{{ $sid->persidangan }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tarikh Mula :</b></label>
        <div class="col-md-2 col-sm-12 col-xs-12">
          <input name="mula" id="mula" type="date" size="10" maxlength="10" value="{{ $tarikh->start_dt ?? '' }}" class="form-control" style="height:40px" />
        </div>
        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tarikh Hingga :</b></label>
        <div class="col-md-2 col-sm-12 col-xs-12">
          <input name="hingga" id="hingga" type="date" size="10" maxlength="10" value="{{ $tarikh->end_dt ?? '' }}" class="form-control" style="height:40px" />
        </div>
      </div>
			<br />
      <div class="form-group">
				<div align="center">
          <input type="button" value="Papar & Cetak Laporan" style="cursor:pointer" class="btn btn-primary" onClick="do_submit()" />
        </div>
      </div>
      <br /><br />
    </div>
  </div>
</div>
@endsection