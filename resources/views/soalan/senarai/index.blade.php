@extends('components.page')

@section('content')

<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('cal/script/wz_tooltip.js') }}"></script>
<script language="javascript">
function do_agih(ID){
	swal({
		title: 'Adakah anda pasti untuk mengagihkan soalan ini kepada bahagian yang berkenaan?',
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
			url:'/soalan/daftar/agih/'+ID, //&datas='+datas,
			type:'POST',
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Soalan Parlimen telah diagihkan',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
						refresh = window.location; 
						window.location = refresh;
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

function do_cetak(id){
  if(confirm("Adakah anda pasti untuk membuat cetakan kepada soalan/jawapan ini.")){
    window.open("/soalan/daftar/cetak/"+id);
  }
}

function do_page()
{
  var lj_tanya = $('#lj_tanya').val();
  var lj_dewan = $('#lj_dewan').val();
  var ljid_sidang = $('#ljid_sidang').val();
  var lj_kategori = $('#lj_kategori').val();
  var lj_status = $('#lj_status').val();
  var l_cari = $('#l_cari').val();

  var pathname = window.location.pathname;

  // alert(pathname);
  if(lj_tanya.trim() == '' && lj_dewan.trim() == '' && ljid_sidang.trim() == '' && lj_kategori.trim() == '' && lj_status.trim() == '' && l_cari.trim() == '') {
    window.location = pathname;
  } else {
    window.location = pathname+'?lj_tanya='+lj_tanya+'&lj_dewan='+lj_dewan+'&ljid_sidang='+ljid_sidang+'&lj_kategori='+lj_kategori+'&lj_status='+lj_status+'&l_cari='+l_cari;
  }
}
</script>
@php
$lj_tanya=isset($_REQUEST["lj_tanya"])?$_REQUEST["lj_tanya"]:"";
$lj_dewan=isset($_REQUEST["lj_dewan"])?$_REQUEST["lj_dewan"]:"";
$ljid_sidang=isset($_REQUEST["ljid_sidang"])?$_REQUEST["ljid_sidang"]:"";
$lj_kategori=isset($_REQUEST["lj_kategori"])?$_REQUEST["lj_kategori"]:"";
$lj_status=isset($_REQUEST["lj_status"])?$_REQUEST["lj_status"]:"";
$l_cari=isset($_REQUEST["l_cari"])?$_REQUEST["l_cari"]:"";
@endphp
  <div class="box" style="background-color:#F2F2F2">
    <div class="box-body">
      <input type="hidden" name="soalan_id" value="" />
      <div class="x_panel">
        <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
          <h6 class="panel-title"><font color="#000000"><b>SENARAI MAKLUMAT DAFTAR SOALAN</b></font></h6> 
        </header>
      </div>
    </div>
    <br />
    <div class="box-body">
    @csrf
      <div class="form-group">
        <div class="col-md-2">
          <select name="lj_tanya" id="lj_tanya" onchange="do_page()" class="form-control">
            <option value="">Jenis Pertanyaan-</option>
            <option value="1" @if($lj_tanya == 1) selected @endif>Bertulis</option>
            <option value="2" @if($lj_tanya == 2) selected @endif>Lisan</option>
          </select>
        </div>

        <div class="col-md-2">
          <select name="lj_dewan" id="lj_dewan" onchange="do_page()" class="form-control">
            <option value="">Jenis Dewan</option>
            <option value="1" @if($lj_dewan == 1) selected @endif>Dewan Rakyat</option>
            <option value="2" @if($lj_dewan == 2) selected @endif>Dewan Negara</option>
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
            <option value="">Bahagian</option>
            @foreach($kategori as $kat)
            <option value="{{ $kat->id_bahagian }}" @if($lj_kategori == $kat->id_bahagian) selected @endif>{{ $kat->nama_bahagian }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <select name="lj_status" id="lj_status" onchange="do_page()" class="form-control">
            <option value="">Status Soalan</option>
            <option value="9" @if($lj_status == 9) selected @endif>Belum Diagihkan</option>
            <option value="1" @if($lj_status == 1) selected @endif>Belum Dijawab</option>
            <option value="2" @if($lj_status == 2) selected @endif>Telah Dijawab</option>
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
    <div align="right" style="padding-right:10px"><b>{{ $soalan->total() }} rekod dijumpai</b></div>
    <div class="box-body">
      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Tarikh Jawapan<br />(No. Soalan)</div></font></th>
            <th width="50%"><font color="#000000"><div align="left">Soalan</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Dewan Persidangan</div></font></th>
            <th width="15%"><font color="#000000"><div align="left">Bahagian<br /><i>[Kategori]</i></div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Status</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Tarikh Agihan/<br /><i>Tarikh Sasaran</i></div></font></th>
            <th width="5%"><font color="#000000"><div align="left">Tindakan</div></font></th>
          </tr>
        </thead>
        <tbody>
          @php $bil = $soalan->perPage()*($soalan->currentPage()-1) @endphp

          @foreach($soalan as $soal)
          @php
          $peg_1 = "<b>Nama : </b>".optional($soal->peg)->nama_kakitangan." [ ".optional($soal->peg)->gred." ] <br>";
					$peg_1 .= "<b>Jawatan : </b>".optional($soal->peg)->jawatan_kakitangan."<br>";
					$peg_1 .= "<b>No. Telefon : </b>".optional($soal->peg)->no_telefon." / ".optional($soal->peg)->no_hp."<br>";
					$peg_1 .= "<b>Bahagian : </b>".optional(optional($soal->peg)->bahagian)->nama_bahagian."<br>";
          @endphp
          <tr>
            <td align="right" valign="top">{{ ++$bil }}.</td>
            <td valign="top" align="center">@if(empty($soal->tkh_jwb_parlimen)) ?? @else {{date('d/m/Y', strtotime($soal->tkh_jwb_parlimen))}} @endif<br />
              ({{ $soal->no_soalan }})<br /><br />{{ $soal->tanya->pertanyaan }}
            </td>
            <td valign="top" align="left">
              <a href="/soalan/daftar/edit/{{$soal->soalan_id}}{{$soal->j_dewan}}">{!! nl2br($soal->soalan) !!}</a>
            </td>
            <td valign="top" align="left">{{ $soal->dewan->dewan }}</td>
            <td valign="top" align="left">{{ optional($soal->bahagian)->nama_bahagian }}<br />
              <i>[{{ $soal->kategori->nama_kategori }}]</i>
            </td>
            <td valign="top" align="center">
            @if($soal->status == 0)
              <font color="#FF0000">Belum diagihkan</font>
            @elseif($soal->status == 1)
              Belum Dijawab
            @elseif($soal->status == 2)
              <font color="#0033FF">Telah dijawab</font>
            @endif
            </td>
            <td valign="top" align="center">@if(!empty($soal->tkh_agihan)) {{ date('d/m/Y', strtotime($soal->tkh_agihan)) }} @endif<br />/<br />
              <i>@if(!empty($soal->tkh_dedline)) {{ date('d/m/Y', strtotime($soal->tkh_dedline)) }} @endif</i>
            </td>
            <td valign="top" align="center">
              <img src="{{ asset('images/printer.png') }}" border="0" width="25" height="24" title="Cetak Jawapan" style="cursor:pointer" onclick="do_cetak('{{ $soal->soalan_id }}')" />&nbsp;
              @if($soal->status == 0)
              <img src="{{ asset('images/animearrow.gif') }}" width="25" height="24" title="Hantar kepada bahagian" style="cursor:pointer" onclick="do_agih('{{ $soal->soalan_id }}')" /><br /><br />
              @endif
              <font size=1 face=Verdana, Arial, Helvetica, sans-serif color="#000000"> 
              <img src="{{ asset('images/user.gif') }}" width="25" height="24" style="cursor:pointer" border=0 onMouseOver="Tip('{{ $peg_1.'<br>' }}', 
              TITLE, 'Maklumat Penyedia Jawapan', ABOVE, true, SHADOW, true, LEFT, true, FADEIN, 400, FADEOUT, 400)"></font>
      
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div align="center" class="d-flex justify-content-center">
    {!! $soalan->appends(['lj_tanya'=>$lj_tanya,'lj_dewan'=>$lj_dewan,'ljid_sidang'=>$ljid_sidang,'lj_kategori'=>$lj_kategori,'lj_status'=>$lj_status,'l_cari'=>$l_cari])->render() !!}
  </div>
</div>
  <!--</div>-->    
<!-- DataTables -->
@endsection