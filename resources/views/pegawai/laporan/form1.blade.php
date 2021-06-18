@extends('components.page')

@section('content')
@include('pegawai.laporan.form_head')

<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <u><b>LAMPIRAN I : SOALAN TAMBAHAN :</b></u>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12" align="right">
                                            <a href="/peg_bertugas/laporan/lampiran1?jad_id={{ $result->jad_id }}&lp_id=" 
                                                data-toggle="modal" data-target="#myModal" 
                                                title="Tambah Soalan Tambahan" class="fa" data-backdrop="static">
                                            <input type="button" value="Tambah Soalan Tambahan" class="btn btn-primary" style="font-family:Verdana, Geneva, sans-serif" />
                                            </a>
                                        </div>
                                    </div>

                                    @if (!$lampiran->isEmpty())
                                    @php $bil=0; @endphp
                                    @foreach ($lampiran as $lampiran)
                                    <div class="form-group" style="background-color:#CCC;height:35px">
                                        <div class="col-md-2 col-sm-12 col-xs-12" style="background-color:#CCC;height:35px">
                                            <b>SOALAN TAMBAHAN {{ ++$bil }} :</b>
                                        </div>
                                        <div class="col-md-10 col-sm-12 col-xs-12" style="background-color:#CCC;height:35px">
                                            <a href="/peg_bertugas/laporan/lampiran1?jad_id={{ $result->jad_id }}&lp_id={{ $lampiran->lp_id }}" 
                                            data-toggle="modal" data-target="#myModal"  
                                            title="Tambah Maklumat Ahli Parlimen" class="fa" data-backdrop="static">
                                            <img src="{{ asset('images/edit.png') }}" style="cursor:pointer" title="Sila klik untuk kemaskini maklumat Soalan Tambahan" />
                                                &nbsp;<i>Sila klik untuk kemaskini maklumat Soalan Tambahan</i>
                                                <input type="hidden" name="lp_id" value="{{ $lampiran->lp_id }}" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Nama Y. Berhormat :</b></label>
                                        <div class="col-md-10 col-sm-12 col-xs-12">{{ $lampiran->ahli_parlimen }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Kawasan :</b></label>
                                        <div class="col-md-10 col-sm-12 col-xs-12">{{ $lampiran->kawasan_parlimen }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tarikh & Masa :</b></label>
                                        <div class="col-md-10 col-sm-12 col-xs-12">{{ DisplayDate($lampiran->tarikh) }} - {{ $lampiran->masa }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Soalan/Isu/Pendapat :</b></label>
                                        <div class="col-md-10 col-sm-12 col-xs-12">{{ nl2br($lampiran->soalan) }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tindakan :</b></label>
                                        <div class="col-md-10 col-sm-12 col-xs-12">{{ nl2br($lampiran->tindakan) }}</div>
                                    </div>
                                    <hr />
                                    @endforeach
                                    @else
                                    <hr />
                                    @endif
                                </div>

@include('pegawai.laporan.form_footer')
@endsection