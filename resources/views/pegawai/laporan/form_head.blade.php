@include('components.dateformat')
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
                        <!-- form start -->
                            <input type="hidden" id="id_sidang" name="id_sidang" value="{{ $result->id_sidang }}" />
                            <input type="hidden" id="jad_id" name="jad_id" value="{{ $result->jad_id }}" />
                            <input type="hidden" name="nama_hari" value="{{ $result->hari }}" />
                    
                            <div class="box-header with-border">
                                <h3 class="box-title"><b> {{ $title }}</b></h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan"><b>Dewan Persidangan :</b></label>
                                    <div class="col-md-5 col-sm-12 col-xs-12">{{ $result->dewan }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan"><b>Sidang :</b></label>
                                    <div class="col-md-5 col-sm-12 col-xs-12">{{ $result->sidang->persidangan }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan"><b>Tarikh Soalan :</b></label>
                                    <div class="col-md-5 col-sm-12 col-xs-12">{{ DisplayDate($result->tarikh) }} ({{ $result->hari }})</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan"><b>Pegawai Bertugas :</b></label>
                                    <div class="col-md-5 col-sm-12 col-xs-12">
									1. {{ $result->pegawai1 ?? '' }}<br />
                                    2. {{ $result->pegawai2 ?? '' }}<br />
                                    3. {{ $result->pegawai3 ?? '' }}</div>
                                    </div>
								</div>
                            </div>
                            <hr />
                            <div class="box-body">
                                <div class="form-group">
									<div class="col-md-12 col-sm-12 col-xs-12"><b>
                                        @if ($page == '')
                                            <font color="#FF0000">LAPORAN PERSIDANGAN</font>
                                        @else
                                            <a href="/peg_bertugas/laporan/create/{{ $result->jad_id }}">LAPORAN PERSIDANGAN</a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        @if ($page == 'soalan')
                                            <font color="#FF0000">LAMPIRAN I : SOALAN TAMBAHAN</font>
                                        @else
                                            <a href="/peg_bertugas/laporan/create/{{ $result->jad_id }}?page=soalan">LAMPIRAN I : SOALAN TAMBAHAN</a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        @if ($page == 'bahas')
                                            <font color="#FF0000">LAMPIRAN II : PERBAHASAN</font>
                                        @else
                                            <a href="/peg_bertugas/laporan/create/{{ $result->jad_id }}?page=bahas">LAMPIRAN II : PERBAHASAN</a>
                                        @endif
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </b>
                                    </div>
								</div>
                            </div>

                            <hr />
                            
