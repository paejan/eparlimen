@extends('components.page')

@section('content')

<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script language="javascript">
function do_submit(id){
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
    $.ajax({
      url:'/soalan/jawapan/serah/'+id, //&datas='+datas,
      type:'POST',
      data: $('form').serialize(),
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
                  location.reload();
              });
          }
      }
    });
	});
}

function do_cetak(id){
	if(confirm("Adakah anda pasti untuk membuat cetakan kepada soalan/jawapan ini.")){
		window.open('/soalan/jawapan/cetak/'+id);
	}
}

function do_page()
{
  var lj_tanya = $('#lj_tanya').val();
  var lj_dewan = $('#lj_dewan').val();
  var ljid_sidang = $('#ljid_sidang').val();
  var lj_kategori = $('#lj_kategori').val();
  var l_cari = $('#l_cari').val();

  if(lj_tanya.trim() == '' && lj_dewan.trim() == '' && ljid_sidang.trim() == '' && lj_kategori.trim() == '' && l_cari.trim() == ''){
    window.location = '/soalan/jawapan'
  } else {
    window.location = '/soalan/jawapan?lj_tanya='+lj_tanya+'&lj_dewan='+lj_dewan+'&ljid_sidang='+ljid_sidang+'&lj_kategori='+lj_kategori+'&l_cari='+l_cari;
  }
}

</script>
@php

$BTN_UPDATE=0;

if(Auth::user()->type =='P'){
	$BTN_UPDATE=0;
} else if(Auth::user()->type =='B'){
	$BTN_UPDATE=1;
} else if(Auth::user()->type =='A' || Auth::user()->type =='U'){
	$BTN_UPDATE=1;
}

$l_cari=isset($_REQUEST["l_cari"])?$_REQUEST["l_cari"]:"";
$lj_tanya=isset($_REQUEST["lj_tanya"])?$_REQUEST["lj_tanya"]:"";
$lj_dewan=isset($_REQUEST["lj_dewan"])?$_REQUEST["lj_dewan"]:"";
$ljid_sidang=isset($_REQUEST["ljid_sidang"])?$_REQUEST["ljid_sidang"]:"";
$lj_kategori=isset($_REQUEST["lj_kategori"])?$_REQUEST["lj_kategori"]:"";
@endphp

  <div class="box" style="background-color:#F2F2F2">
  @csrf
    <div class="box-body">
      <input type="hidden" name="soalan_id" value="" />
      <div class="x_panel">
        <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
          <div class="panel-actions">
            <!--<a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>-->
          </div>
          <h6 class="panel-title"><font color="#000000"><b>SENARAI SOALAN YANG PERLU DIJAWAB</b></font></h6>
        </header>
      </div>
    </div>

    <br />

    <div class="box-body">
      <div class="form-group">
        <div class="col-md-2">
          <select name="lj_tanya" id="lj_tanya" onchange="do_page()" class="form-control">
            <option value="">Jenis Pertanyaan-</option>
            <option value="1" @if($lj_tanya == '1') selected @endif>Bertulis</option>
            <option value="2" @if($lj_tanya == '2') selected @endif>Lisan</option>
          </select>
        </div>
        <div class="col-md-2">
          <select name="lj_dewan" id="lj_dewan" onchange="do_page()" class="form-control">
            <option value="">Jenis Dewan</option>
            <option value="1" @if($lj_dewan == '1') selected @endif>Dewan Rakyat</option>
            <option value="2" @if($lj_dewan == '2') selected @endif>Dewan Negara</option>
          </select>
        </div>

        <div class="col-md-8">
          <select name="ljid_sidang" id="ljid_sidang" onchange="do_page()" class="form-control">
            <option value="">Maklumat Persidangan</option>
            @foreach($sidang as $sid)
            <option value="{{ $sid->id_sidang }}" @if($ljid_sidang == $sid->id_sidang) selected @endif>{{ $sid->persidangan }} - [{{ strtoupper($sid->dewan) }}]</option>
            @endforeach
            </select>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6">
          <select name="lj_kategori" id="lj_kategori" onchange="do_page()" class="form-control">
            <option value="">-- Sila pilih --</option>
            @foreach($kategori as $kat)
            <option value="{{ $kat->id_kategori }}" @if($lj_kategori == $kat->id_kategori) selected @endif>{{ $kat->nama_kategori }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control" id="l_cari" name="l_cari" value="{{ $l_cari }}" placeholder="Maklumat Carian">
        </div>

        <div class="col-md-2" align="right">
          <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
        </div>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <div class="col-md-12">
          <b>Sila klik pada ikon <img src="{{ asset('images/animearrow.gif') }}" border="0" width="35" height="30" /> untuk proses serahan kepada urusetia.</b>&nbsp;&nbsp;<br />
          <b>Sila klik pada ikon <img src="{{ asset('images/printer.png') }}" border="0" /> untuk proses cetakan.</b>&nbsp;&nbsp;<br />
        </div>
      </div>
    </div>
    <div align="right" style="padding-right:10px"><b>{{ $soalan->total() }} rekod dijumpai</b></div>
    <div class="box-body">
      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
            <th width="55%"><font color="#000000"><div align="left">Soalan</div></font></th>
            <th width="10%"><font color="#000000"><div align="left"><b>Jenis Pertanyaan<br /><i>Tarikh Sasaran Jawapan</i></b></div></font></th>
            <th width="15%"><font color="#000000"><div align="left">Dewan Persidangan</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Bahagian<br /><i>[Kategori]</i></div></font></th>
            <th width="5%"><font color="#000000"><div align="left">Tindakan</div></font></th>
            <th width="5%"><font color="#000000"><div align="left">Perlu jawapan dalam masa</div></font></th>
          </tr>
        </thead>
        <tbody>
          @php $bil = $soalan->perPage()*($soalan->currentPage()-1) @endphp
          @foreach($soalan as $soal)
				  <tr>
            <td align="center" valign="top">{{ ++$bil }}.</td>
            <td align="left" valign="top">
              <b>No. Soalan: {{ $soal->no_soalan }} bagi tahun {{ substr($soal->tkh_soalan,0,4) }}</b>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(Tarikh Jawapan Di Parlimen : {{ date('d/m/Y', strtotime($soal->tkh_jwb_parlimen)) }})</i><br />
              <br />
              @if($soal->peg_id==Auth::user()->id_kakitangan || $BTN_UPDATE==1)
                <a href="/soalan/jawapan/form/{{ $soal->soalan_id }}">{!! nl2br($soal->soalan) !!}</a>
						  @else
                {!! nl2br($soal->soalan) !!}
              @endif
            </td>
            <td valign="top" align="center"><b>{{ $soal->tanya->pertanyaan }}</b>
              <br /><br /><i>{{ date('d/m/Y',strtotime($soal->tkh_dedline))}}</i>
            </td>
            <td valign="top" align="center">
              <b>{{ $soal->dewan->dewan }}</b>
              <br /><br /><i>{{ $soal->tanya->pertanyaan }}</i>
            </td>
            <td valign="top">
              <b>{{ $soal->bahagian->nama_bahagian }}</b>
              <br />
              <i>[{{ $soal->kategori->nama_kategori }}]</i>
            </td>
            <td align="center" valign="top">
              @if(!empty($soal->jawapan))
              <img src="{{ asset('images/animearrow.gif') }}" title="Hantar Jawapan Kepada Urusetia" style="cursor:pointer" onclick="do_submit('{{$soal->soalan_id}}')" width="25" height="24" /><br /><br />
              @endif
              <img src="{{ asset('images/printer.png') }}" border="0" title="Cetak Jawapan" style="cursor:pointer" onclick="do_cetak('{{ $soal->soalan_id }}')" width="25" height="24" />
            </td>
            <td align="center">
              @php
              $tkh = $soal->tkh_dedline;
              $date1 = time();
              $y = intval(substr($tkh,0,4));
              $m = intval(substr($tkh,5,2));
              $d = intval(substr($tkh,8,2));
              $date2 = mktime(0,0,0,$m,$d,$y);
              $dateDiff = $date2 - $date1;
              $fullDays = floor($dateDiff/(60*60*24));
              if($fullDays<=2){
                if($fullDays<0){ $fd=0-$fullDays; $fd="(".$fd.")"; } else { $fd=$fullDays; }
                print "<font color=red><b>".$fd." Hari</b></font>";
              } else {
                print $fullDays." Hari";
              }
              @endphp
              &nbsp;
            </td>
				  </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div align="center" class="d-flex justify-content-center">
      {!! $soalan->appends(['lj_tanya'=>$lj_tanya,'lj_dewan'=>$lj_dewan,'ljid_sidang'=>$ljid_sidang,'lj_kategori'=>$lj_kategori,'l_cari'=>$l_cari])->render() !!}
    </div>
  </div>
</div>
<!-- DataTables -->
@endsection
