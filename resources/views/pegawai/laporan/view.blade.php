@extends('components.page')

@section('content')
@include('components.dateformat')
<script>
function do_page()
{
    window.history.back();
}

function do_cetak(id)
{
    // alert(id);
    window.open('/peg_bertugas/cetak/'+id);
}
</script>
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
                                <h3 class="box-title"><b>{{ $title }}</b></h3>
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
									1. {{ $result->pegawai1 }}<br />
                                    2. {{ $result->pegawai2 }}<br />
                                    3. {{ $result->pegawai3 }}</div>
                                    </div>
								</div>
                            </div>
                            <hr />
							<div class="box-body">
                                <div class="form-group">
									<div class="col-md-12 col-sm-12 col-xs-12"><hr />
                                    <u><b>A. SESI JAWAPAN LISAN :</b></u>
                                    </div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>1. Jumlah soalan yang dibentangkan di dalam Dewan (mengikut Aturan Urusan Mesyuarat) :</b></label>
									<div class="col-md-2 col-sm-12 col-xs-12"> {{ $result->soalan1 }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>2. Jumlah soalan yang sempat dijawab di dalam Dewan :</b></label>
									<div class="col-md-2 col-sm-12 col-xs-12"> {{ $result->soalan2 }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>3. Adakah terdapat soalan-soalan yang ditujukan kepada Jabatan Kemajuan Islam Malaysia (JAKIM) :<br />
                                        Jika ada, sebutkan nombor bilangan soalan tersebut</b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan3 }}<br />
                                         {{ $result->soalan3a }}
                                    </div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>4. Adakah terdapat soalan-soalan tambahan kepada soalan soalan di (3): <br />
                                        Jika ada, huraikan soalan dan sebutkan nama Ahli Yang Berhormat dan Kawasan di Lampiran I</b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan4 }}<br />
                                         {{ $result->soalan4a }}
                                    </div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>5. Apakah jawapan-jawapan kepada (4)<br /> - Huraikan secara lampiran</b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan5 }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>6. Adakah soalan-soalan yang ditujukan kepada Perdana Menteri atau lain-lain Menteri tetapi ada berkaitan dengan Jabatan Kemajuan Islam Malaysia (JAKIM) :<br />
                                            Jika ada, sebutkan nama Ahli Yang Berhormat dan kawasan. Huraikan Soalan-soalan tersebut secara lampiran</b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan6 }}</div>
								</div>

                            </div>

                            <hr />
                            
							<div class="box-body">

                                <div class="form-group">
									<div class="col-md-12 col-sm-12 col-xs-12">
                                    <u><b>B. PERBAHASAN TITAH UCAPAN/RANG UNDANG-UNDANG :</b></u>
                                    </div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>1. Siapakah Ahli-ahli Yang Berhormat yang membahaskan Titah Ucapan dan menyatakan isu 
                           				 yang dibangkitkan sekiranya berkaitan dengan Jabatan Kemajuan Islam Malaysia (JAKIM) :</b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan7) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>2. Apakah Rang Undang-undang yang dibahaskan :</b></label>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>2.1 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan8_1) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>2.2 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan8_2) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>2.3 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan8_3) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>2.4 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan8_4) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>2.5 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan8_5) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>3. Adakah Rang Undang-undang yang berkaitan dengan Jabatan Kemajuan Islam Malaysia (JAKIM) dibahaskan:
                            			<br /><i>(Jika ada, sebutkan nama Ahli Yang Berhormat dan Kawasan serta isu yang dibangkitkan di Lampiran II)</i> </b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan9 }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>4. Keputusan perbahasan Rang Undang-Undang di para 2 :</b></label>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                    	<b>4.1 Rang Undang-Undang </b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan10_1 }}</div>
									<div class="col-md-7 col-sm-12 col-xs-12">{{ nl2br($result->soalan10_1a) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                    	<b>4.2 Rang Undang-Undang </b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan10_2 }}</div>
									<div class="col-md-7 col-sm-12 col-xs-12">{{ nl2br($result->soalan10_2a) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                    	<b>4.3 Rang Undang-Undang </b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan10_3 }}</div>
									<div class="col-md-7 col-sm-12 col-xs-12">{{ nl2br($result->soalan10_3a) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                    	<b>4.4 Rang Undang-Undang </b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan10_4 }}</div>
									<div class="col-md-7 col-sm-12 col-xs-12">{{ nl2br($result->soalan10_4a) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                    	<b>4.5 Rang Undang-Undang </b></label>
									<div class="col-md-2 col-sm-12 col-xs-12">{{ $result->soalan10_5 }}</div>
									<div class="col-md-7 col-sm-12 col-xs-12">{{ nl2br($result->soalan10_5a) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                    	<b>5. Apakah Rang Undang-undang yang ditangguhkan :</b></label>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>5.1 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan11_1) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>5.2 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan11_2) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>5.3 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan11_3) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>5.4 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan11_4) }}</div>
								</div>
                                <div class="form-group">
                                	<label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                    	<b>5.5 Rang Undang-Undang </b></label>
									<div class="col-md-8 col-sm-12 col-xs-12">{{ nl2br($result->soalan11_5) }}</div>
								</div>
                            </div>
                            <hr>

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <u><b>LAMPIRAN I : SOALAN TAMBAHAN :</b></u>
                                    </div>
                                </div>
                                @if(!$lampiran1->isEmpty())
                                @php $bil=0; @endphp
                                @foreach ($lampiran1 as $l1)
                                <div class="form-group" style="background-color:#CCC;height:35px">
                                    <div class="col-md-2 col-sm-12 col-xs-12" style="background-color:#CCC;height:35px">
                                        <b>SOALAN TAMBAHAN {{ ++$bil }} :</b>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Nama Y. Berhormat :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ $l1->ahli_parlimen }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Kawasan :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ $l1->kawasan_parlimen }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tarikh & Masa :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ DisplayDate($l1->tarikh) }} - {{ $l1->masa }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Soalan/Isu/Pendapat :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ nl2br($l1->soalan) }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tindakan :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ nl2br($l1->tindakan) }}</div>
                                </div>
                                @endforeach
                                @endif
                                <hr />
                            </div>
                            
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <u><b>LAMPIRAN II : PERBAHASAN :</b></u>
                                    </div>
                                </div>
                                @if(!$lampiran2->isEmpty())
                                @php $bil=0; @endphp
                                @foreach ($lampiran2 as $l2)
                                <div class="form-group" style="background-color:#CCC;height:35px">
                                    <div class="col-md-2 col-sm-12 col-xs-12" style="background-color:#CCC;height:35px">
                                        <b>SOALAN TAMBAHAN {{ ++$bil }} :</b>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Nama Y. Berhormat :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ $l2->ahli_parlimen }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Kawasan :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ $l2->kawasan_parlimen }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tarikh & Masa :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ DisplayDate($l2->tarikh) }} - {{ $l2->masa }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Soalan/Isu/Pendapat :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ nl2br($l2->soalan) }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Tindakan :</b></label>
                                    <div class="col-md-10 col-sm-12 col-xs-12">{{ nl2br($l2->tindakan) }}</div>
                                </div>
                                @endforeach
                                @endif
                                <hr />
                            </div>
                        <div align="center">
                            <input type="button" name="button3" id="button" value="Cetak" style="cursor:pointer" class="btn btn-primary" onclick="do_cetak('{{ $result->jad_id }}')" />
                            <input type="button" name="button3" id="button" value="Kembali" style="cursor:pointer" class="btn btn-primary" onclick="do_page()" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection