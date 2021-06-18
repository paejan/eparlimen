@extends('components.page')

@section('content')
@include('pegawai.laporan.form_head')
<script language="javascript">
    function do_update(jad_id, fields, value){
        //alert(jad_id+":"+fields+":"+value);
        vals = encodeURIComponent(value);
        $.ajax({
            url:'/peg_bertugas/laporan/update?jad_id='+jad_id+'&fields='+fields+'&val='+vals, //&datas='+datas,
            type:'POST',
            //dataType: 'json',
            data: $("form").serialize(),
            //data: datas,
            success: function(data){
                console.log(data);
                //alert(data);
            }
        });
    }
    
</script>
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12"><hr />
                                            <u><b>A. SESI JAWAPAN LISAN :</b></u>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>1. Jumlah soalan yang dibentangkan di dalam Dewan (mengikut Aturan Urusan Mesyuarat) :</b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control"  name="soalan1" value="{{ $result->soalan1 }}" 
                                        onchange="do_update('{{ $result->jad_id }}','soalan1',this.value)" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>2. Jumlah soalan yang sempat dijawab di dalam Dewan :</b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control"   name="soalan2" value="{{ $result->soalan2 }}" 
                                        onchange="do_update('{{ $result->jad_id }}','soalan2',this.value)" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>3. Adakah terdapat soalan-soalan yang ditujukan kepada Jabatan Kemajuan Islam Malaysia (JAKIM) :<br />
                                            Jika ada, sebutkan nombor bilangan soalan tersebut</b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan3" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan3',this.value)" />
                                                <option value="Tiada" @if($result->soalan3=='Tiada') selected @endif>Tiada</option>
                                                <option value="Ada" @if($result->soalan3=='Ada') selected @endif>Ada</option>
                                            </select>
                                            <input type="text" class="form-control" name="soalan3a" value="{{ $result->soalan3a }}" 
                                            onchange="do_update('{{ $result->jad_id }}','soalan3a',this.value)" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>4. Adakah terdapat soalan-soalan tambahan kepada soalan soalan di (3): <br />
                                            Jika ada, huraikan soalan dan sebutkan nama Ahli Yang Berhormat dan Kawasan di Lampiran I</b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan4" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan4',this.value)" >
                                                <option value="Tiada" @if($result->soalan4=='Tiada') selected @endif>Tiada</option>
                                                <option value="Ada" @if($result->soalan4=='Ada') selected @endif>Ada</option>
                                            </select>
                                            <input type="text" class="form-control" name="soalan4a" value="{{ $result->soalan4a }}" 
                                            onchange="do_update('{{ $result->jad_id }}','soalan4a',this.value)" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>5. Apakah jawapan-jawapan kepada (4)<br /> - Huraikan secara lampiran</b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan5" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan5',this.value)" >
                                                <option value="Tiada" @if($result->soalan5=='Tiada') selected @endif>Tiada</option>
                                                <option value="Ada" @if($result->soalan5=='Ada') selected @endif>Ada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>6. Adakah soalan-soalan yang ditujukan kepada Perdana Menteri atau lain-lain Menteri tetapi ada berkaitan dengan Jabatan Kemajuan Islam Malaysia (JAKIM) :<br />
                                                Jika ada, sebutkan nama Ahli Yang Berhormat dan kawasan. Huraikan Soalan-soalan tersebut secara lampiran</b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan6" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan6',this.value)" >
                                                <option value="Tiada" @if($result->soalan6=='Tiada') selected @endif>Tiada</option>
                                                <option value="Ada" @if($result->soalan6=='Ada') selected @endif>Ada</option>
                                            </select>
                                        </div>
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
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                        <textarea rows="6" class="form-control" name="soalan7" onchange="do_update('{{ $result->jad_id }}','soalan7',this.value)">{{ $result->soalan7 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>2. Apakah Rang Undang-undang yang dibahaskan :</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;2.1 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan8_1" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan8_1',this.value)" 
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan8_1 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;2.2 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan8_2" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan8_2',this.value)" 
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan8_2 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;2.3 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan8_3" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan8_3',this.value)" 
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan8_3 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;2.4 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan8_4" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan8_4',this.value)" 
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan8_4 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;2.5 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan8_5" maxlength="254" class="form-control"onchange="do_update('{{ $result->jad_id }}','soalan8_5',this.value)" 
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan8_5 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>3. Adakah Rang Undang-undang yang berkaitan dengan Jabatan Kemajuan Islam Malaysia (JAKIM) dibahaskan:
                                            <br /><i>(Jika ada, sebutkan nama Ahli Yang Berhormat dan Kawasan serta isu yang dibangkitkan di Lampiran II)</i> </b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan9" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan9',this.value)" >
                                                <option value="Ada" @if($result->soalan9=='Ada') selected @endif>Ada</option>
                                                <option value="Tiada" @if($result->soalan9=='Tiada') selected @endif>Tiada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>4. Keputusan perbahasan Rang Undang-Undang di para 2 :</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;4.1 Rang Undang-Undang </b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan10_1" onchange="do_update('{{ $result->jad_id }}','soalan10_1',this.value)" >
                                                <option value=""> -- Sila pilih -- </option>
                                                <option value="Diluluskan" @if($result->soalan10_1=='Diluluskan') selected @endif>Diluluskan</option>
                                                <option value="Tidak Diluluskan" @if($result->soalan10_1=='Tidak Diluluskan') selected @endif>Tidak Diluluskan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan10_1a" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan10_1a',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan10_1a }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;4.2 Rang Undang-Undang </b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan10_2" onchange="do_update('{{ $result->jad_id }}','soalan10_2',this.value)">
                                                <option value=""> -- Sila pilih -- </option>
                                                <option value="Diluluskan" @if($result->soalan10_2=='Diluluskan') selected @endif>Diluluskan</option>
                                                <option value="Tidak Diluluskan" @if($result->soalan10_2=='Tidak Diluluskan') selected @endif>Tidak Diluluskan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan10_2a" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan10_2a',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan10_2a }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;4.3 Rang Undang-Undang </b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan10_3" onchange="do_update('{{ $result->jad_id }}','soalan10_3',this.value)">
                                                <option value=""> -- Sila pilih -- </option>
                                                <option value="Diluluskan" @if($result->soalan10_3=='Diluluskan') selected @endif>Diluluskan</option>
                                                <option value="Tidak Diluluskan" @if($result->soalan10_3=='Tidak Diluluskan') selected @endif>Tidak Diluluskan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan10_3a" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan10_3a',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan10_3a }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;4.4 Rang Undang-Undang </b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan10_4" onchange="do_update('{{ $result->jad_id }}','soalan10_4',this.value)">
                                                <option value=""> -- Sila pilih -- </option>
                                                <option value="Diluluskan" @if($result->soalan10_4=='Diluluskan') selected @endif>Diluluskan</option>
                                                <option value="Tidak Diluluskan" @if($result->soalan10_4=='Tidak Diluluskan') selected @endif>Tidak Diluluskan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan10_4a" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan10_4a',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan10_4a }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;4.5 Rang Undang-Undang </b></label>
                                        <div class="col-md-2 col-sm-12 col-xs-12">
                                            <select name="soalan10_5" onchange="do_update('{{ $result->jad_id }}','soalan10_5',this.value)">
                                                <option value=""> -- Sila pilih -- </option>
                                                <option value="Diluluskan" @if($result->soalan10_5=='Diluluskan') selected @endif>Diluluskan</option>
                                                <option value="Tidak Diluluskan" @if($result->soalan10_5=='Tidak Diluluskan') selected @endif>Tidak Diluluskan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan10_5a" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan10_5a',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan10_5a }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-xs-12" for="fldnorujukan">
                                            <b>5. Apakah Rang Undang-undang yang ditangguhkan :</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;5.1 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan11_1" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan11_1',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan11_1 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;5.2 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan11_2" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan11_2',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan11_2 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;5.3 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan11_3" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan11_3',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan11_3 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;5.4 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan11_4" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan11_4',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan11_4 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-xs-12" for="fldnorujukan">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;5.5 Rang Undang-Undang </b></label>
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <textarea rows="3" cols="90" name="soalan11_5" maxlength="254" class="form-control" onchange="do_update('{{ $result->jad_id }}','soalan11_5',this.value)"
                                            onkeyup="return ismaxlength(this)">{{ $result->soalan11_5 }}</textarea>
                                        </div>
                                    </div>
                                </div>
@include('pegawai.laporan.form_footer')
@endsection