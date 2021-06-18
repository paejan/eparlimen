@include('components.dateformat')
<script language="javascript">
    function do_close(){
        reload = window.location;
        window.location = reload;
    }
    function do_simpan(jad_id, peg, id_p){

        //alert(jad_id+":"+peg+":"+id_p);
        $.ajax({
            url:'/peg_bertugas/cal_view/info/update?jad_id='+jad_id+'&peg='+peg+'&id_p='+id_p, //&datas='+datas,
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
@php
$bulan=isset($_REQUEST["sel_mth"])?$_REQUEST["sel_mth"]:"";
$tahun=isset($_REQUEST["sel_year"])?$_REQUEST["sel_year"]:"";
@endphp
<table width="100%" border="0" cellspacing="1" cellpadding="2" align="center">
    @csrf
    <tr>
        <td colspan="2">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="2%" align="left">&nbsp;</td>
                    <td width="96%" align="center"><h2>{{ $title }}</h2></td>
                    <td width="2%" align="right">
                    <button type="button" class="btn btn-default" onclick="do_close()">X</button>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td width="2%" align="left">&nbsp;</td>
                    <td width="96%">
                        <table width="100%" cellpadding="5" cellspacing="1" bgcolor="#000000" border="1">
                            <tr bgcolor="#CCCCCC" align="center" style="font-weight:bold">
                                <td width="12%">Tarikh</td>
                                <td width="15%">Dewan Persidangan</td>
                                <td width="68%">Nama Pegawai</td>
                            </tr>
                            @if (!$rs->isEmpty())
                            @php $i = 0; @endphp
                            @foreach ($rs as $rs)
                            @php
								$pemandu = explode(":",$datap);
								$peg = explode(":",$data);
								$count = 0;
								$hari_sidang = date("N",strtotime($rs->jad_tkh));
                            @endphp
                            <tr bgcolor="#FFFFFF">
                                <td align="center" style="padding:5px">{{ DisplayDate($rs->jad_tkh) }}<br />{{ nama_hari($hari_sidang) }}</td>
                                <td align="center" style="padding:5px">@if($hari_sidang>=1 && $hari_sidang<=4) {{ $rs->dewan }} @else &nbsp; @endif</td>
                                <td style="padding:5px">
                                    @if ($hari_sidang>=1 && $hari_sidang<=4)
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2">Urusetia</div>
                                        <div class="col-md-10 col-sm-10">
                                            <select name="urusetia[{{ $i }}]" class="form-control" onchange="do_simpan('{{ $rs->jad_id }}',4,this.value)">
                                                <option value="">-- Sila pilih --</option>
                                                @foreach($peg as $pegawai)
                                                @php $pg = explode(";",$pegawai); @endphp
                                                    <option value="{{ $pg[0] }}" @if($rs->urusetia==$pg[0]) selected @endif>{{ $pg[1] }}</option>
                                                @php $count++; @endphp
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2">Pemandu</div>
                                        <div class="col-md-10 col-sm-10">
                                            <select name="pemandu[{{ $i }}]" class="form-control" onchange="do_simpan('{{ $rs->jad_id }}',5,this.value)">
                                                <option value="">-- Sila pilih --</option>
                                                @foreach($pemandu as $pegawai)
                                                @php $pg = explode(";",$pegawai); @endphp
                                                    <option value="{{ $pg[0] }}" @if($rs->pemandu==$pg[0]) selected @endif>{{ $pg[1] }}</option>
                                                @php $count++; @endphp
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2">Pegawai 1</div>
                                        <div class="col-md-10 col-sm-10">
                                            <select name="pegawai1[{{ $i }}]" class="form-control" onchange="do_simpan('{{ $rs->jad_id }}',1,this.value)">
                                                <option value="">-- Sila pilih --</option>
                                                @foreach($peg as $pegawai)
                                                @php $pg = explode(";",$pegawai); @endphp
                                                    <option value="{{ $pg[0] }}" @if($rs->pegawai1==$pg[0]) selected @endif>{{ $pg[1] }}</option>
                                                @php $count++; @endphp
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2">Pegawai 2</div>
                                        <div class="col-md-10 col-sm-10">
                                            <select name="pegawai2[{{ $i }}]" class="form-control" onchange="do_simpan('{{ $rs->jad_id }}',2,this.value)">
                                                <option value="">-- Sila pilih --</option>
                                                @foreach($peg as $pegawai)
                                                @php $pg = explode(";",$pegawai); @endphp
                                                    <option value="{{ $pg[0] }}" @if($rs->pegawai2==$pg[0]) selected @endif>{{ $pg[1] }}</option>
                                                @php $count++; @endphp
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-2 col-sm-2">Pegawai 3</div>
                                        <div class="col-md-10 col-sm-10">
                                            <select name="pegawai3[{{ $i }}]" class="form-control" onchange="do_simpan('{{ $rs->jad_id }}',3,this.value)">
                                                <option value="">-- Sila pilih --</option>
                                                @foreach($peg as $pegawai)
                                                @php $pg = explode(";",$pegawai); @endphp
                                                    <option value="{{ $pg[0] }}" @if($rs->pegawai3==$pg[0]) selected @endif>{{ $pg[1] }}</option>
                                                @php $count++; @endphp
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}

                                    @endif
                                </td>
                            </tr>
                            @php $i++ @endphp
                            @endforeach
                            @else
                            <tr bgcolor="#FFFFFF" align="center">
                                <td width="100%" colspan="4">Tiada persidangan dijalankan</td>
                            </tr>
                            @endif

                        </table>
                    </td>
                    <td width="2%" align="right" >&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center">
            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
        </td>
    </tr>
</table>
