@extends('components.page')

@section('content')
<script language="javascript">
function do_page()
{
    window.location = '/soalan/jawapan'
}

function do_email()
{
    $.ajax({
        url:'/soalan/jawapan/email', //&datas='+datas,
        type:'POST',
        data: $("form").serialize(),
        //data: datas,
        success: function(data){
            console.log(data);
            //alert(data);
            if(data=='OK'){
                swal({
                    title: 'Berjaya',
                    text: 'Maklumat telah berjaya dihantar',
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
                    text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dihantar.',
                    type: 'error',
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                });
            }
        }
    });
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
                                    <a href="/soalan/jawapan/form/{{ $soalan->soalan_id }}?page=agensi">Input Agensi</a>
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
                                <div class="col-md-10 col-sm-12 col-xs-12">{{ $ahliparlimen->kawasan_ap }}</div>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <tr>
                                            <td width="5%" align="center"><b>Bil</b></td>
                                            <td width="25%" align="left"><b>Nama Agensi</b></td>
                                            <td width="60%" align="center"><b>Input Agensi</b></td>
                                            <td width="20%" align="center"><b>Tarikh Sasaran</b></td>
                                        </tr>
                                        @php $bil = 0; @endphp
                                        @foreach ($soalan_input as $si)
                                        <tr>
                                            <td width="5%" align="center">{{ ++$bil }}</td>
                                            <td width="25%" align="left">{{ $si->bahagian->nama_bahagian }}</td>
                                            <td width="60%" align="left">{!! $si->jawapan_input !!}</td>
                                            <td width="20%" align="center">
                                                @php
                                                $tkh = $si->tkh_sasaran;
                                                $date1 = time();
                                                $y = substr($tkh,0,4);
                                                $m = substr($tkh,5,2);
                                                $d = substr($tkh,8,2);
                                                $date2 = mktime(0,0,0,$m,$d,$y);
                                                $dateDiff = $date2 - $date1;
                                                $fullDays = floor($dateDiff/(60*60*24));
                                                if(empty($si->jawapan_input)){
                                                    print "<font color=red><b>".$fullDays." Hari</b></font>";
                                                } else {
                                                    print $fullDays." Hari";
                                                }
                                                @endphp
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>

                            <hr />

                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                      <input type="button" name="button3" id="kembali" value="Kembali" class="btn btn-default" onclick="do_page()" />
                                      <button type="button" class="mt-sm mb-sm btn btn-warning" onclick="do_email()"><i class="fa fa-envelope-o"></i> Hantar Email</button>

                                      <input type="hidden" name="soalan_id" id="soalan_id" value="{{ $soalan->soalan_id }}" />
								</div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
