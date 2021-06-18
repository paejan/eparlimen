@php
$prn=isset($_REQUEST["prn"])?$_REQUEST["prn"]:"";
if($prn=='WORD'){
	header("Content-Type: application/vnd.ms-word");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=jadual_bertugas.doc");
} else if($prn=='EXCEL'){
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=jadual_bertugas.xls");
}
@endphp
@include('components.dateformat')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Persoalan Sidang Dewan</title>
<style type="text/css" rel="stylesheet" media="all">
p.breaks{
	page-break-after: always;
}	
</style>
<style media="print" type="text/css">
	/*body{FONT-SIZE: 14px;FONT-FAMILY: Arial;COLOR: #000000}*/
	.printButton { display: none; }
</style>
<style type="text/css">
td{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:10px;
}
.tbl_tajuk{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:bold;
}
</style>
<script language="javascript" type="text/javascript">	
function do_pages(URL){
	document.frm.action = URL;
	document.frm.target = '_self';
	document.frm.submit();
}
function do_print(){
	window.print();
}
function handleprint(){
	window.print();
}
</script>
</head>
@php
$pro=isset($_REQUEST["pro"])?$_REQUEST["pro"]:"";
$j_dewan=isset($_REQUEST["j_dewan"])?$_REQUEST["j_dewan"]:"";
$id_sidang=isset($_REQUEST["id_sidang"])?$_REQUEST["id_sidang"]:"";
$mula=isset($_REQUEST["mula"])?$_REQUEST["mula"]:"";
$hingga=isset($_REQUEST["hingga"])?$_REQUEST["hingga"]:"";
$sql_tkh="";
$numofday=1;
$num_of_sidang = "4";
//print "MULA:".$mula;
@endphp
<form name="frm" method="post" action="">
<div class="printButton" align="center">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
    <tr>
        <td align="center" colspan="2">
    	<input type="button" value="Cetak" onClick="do_print()" style="cursor:pointer" />
    	<input type="button" value="Salin Ke Word" onClick="do_pages('cetak_peg_view.php?prn=WORD')" style="cursor:pointer" />
    	<input type="button" value="Salin Ke Excel" onClick="do_pages('cetak_peg_view.php?prn=EXCEL')" style="cursor:pointer" />
        <input type="button" value="Tutup" onClick="javascript:window.close();" title="Sila klik untuk menutup paparan" style="cursor:pointer">
        <input type="hidden" name="j_dewan" value="<?=$j_dewan;?>" />
        <input type="hidden" name="id_sidang" value="<?=$id_sidang;?>" />
        <input type="hidden" name="mula" value="<?=$mula;?>" />
        <input type="hidden" name="hingga" value="<?=$hingga;?>" />
        </td>
    </tr>
</table>
</div>
@if (!empty($rs_si))
    @php
    $numofweek = date("W",strtotime($rs_si->start_dt));
    $bil = 0; 
    @endphp
    @foreach ($rs as $rs)
        @php
            $bil++;
            $hari_sidang = date("N",strtotime($rs->jad_tkh));
            $numofday = date("N",strtotime($rs->jad_tkh));
        @endphp
        {{-- {{ $numofday }} --}}
        @if ($numofday>=1 && $numofday<=$num_of_sidang)
            @if ($numofday==1 || $bil==1)
                @php
                $weeknum = date("W",strtotime($rs->jad_tkh));
                $dispweek = $weeknum - $numofweek + 1;
                @endphp
                <table width="95%" border="1" cellspacing="1" cellpadding="5" align="center">
                    <tr class="tbl_tajuk">
                        <td width="100%" align="center" colspan="7" class="tbl_tajuk">
                            {{strtoupper($rs_si->persidangan)}}<br>
                            {{strtoupper($rs_si->dewan)}} ( {{DisplayDateF($rs_si->start_dt)}} HINGGA {{DisplayDateF($rs_si->end_dt)}}  )
                        </td>
                    </tr>
                    <tr class="tbl_tajuk">
                        <td width="100%" align="left" colspan="7" class="tbl_tajuk">MINGGU {{nama_minggu($dispweek)}} </td>
                    </tr>
                    <tr class="tbl_tajuk">
                        <td width="5%" align="center">HARI</td>
                        <td width="5%" align="center">TARIKH</td>
                        <td width="30%" align="center">NAMA PEGAWAI</td>
                        <td width="25%" align="center">JAWATAN</td>
                        <td width="10%" align="center">JABATAN/AGENSI</td>
                        <td width="10%" align="center">NOMBOR TELEFON</td>
                        <td width="15%" align="center">CATATAN</td>
                    </tr>
            @endif
                    <tr class="kandungan">
                        <td align="center" valign="top">{{ strtoupper(nama_hari($hari_sidang)) }}</td>
                        <td align="center" valign="top">{{ DisplayDate($rs->jad_tkh) }}</td>
                        <td valign="top" align="left">
                            @if(!empty($rs->urusetia)) U. {{ $rs->us->nama_kakitangan }} @else U.  @endif
                            <br><br><br><br>
                            @if(!empty($rs->pegawai1)) 1. {{ $rs->p1->nama_kakitangan }} @else 1.  @endif
                            <br><br><br><br>
                            @if(!empty($rs->pegawai2)) 2. {{ $rs->p2->nama_kakitangan }} @else 2.  @endif
                            <br><br><br><br>
                            @if(!empty($rs->pegawai3)) 3. {{ $rs->p3->nama_kakitangan }} @else 3.  @endif
                            <br><br><br><br>
                            @if(!empty($rs->pemandu)) P. {{ $rs->pm->nama_kakitangan }} @else P.  @endif
                            <br><br>
                        </td>
                        <td align="center" valign="top">
                            {{ optional($rs->us)->jawatan_kakitangan }}
                            <br /><br /><br /><br />
                            {{ optional($rs->p1)->jawatan_kakitangan }}
                            <br /><br /><br /><br />
                            {{ optional($rs->p2)->jawatan_kakitangan }}
                            <br /><br /><br /><br />
                            {{ optional($rs->p3)->jawatan_kakitangan }}
                            <br /><br /><br /><br />
                            {{ optional($rs->pm)->jawatan_kakitangan }}
                            <br /><br />
                        </td>
                        <td align="center" valign="top">
                            {{ optional(optional($rs->us)->bahagian)->kod_bahagian }}
                            <br /><br /><br /><br />
                            {{ optional(optional($rs->p1)->bahagian)->kod_bahagian }}
                            <br /><br /><br /><br />
                            {{ optional(optional($rs->p2)->bahagian)->kod_bahagian }}
                            <br /><br /><br /><br />
                            {{ optional(optional($rs->p3)->bahagian)->kod_bahagian }}
                            <br /><br /><br /><br />
                            {{ optional(optional($rs->pm)->bahagian)->kod_bahagian }}
                            <br /><br />
                        </td>
                        <td align="center" valign="top">
                            {{ optional($rs->us)->no_telefon }}<br />{{ optional($rs->us)->no_hp }}
                            <br /><br /><br />
                            {{ optional($rs->p1)->no_telefon }}<br />{{ optional($rs->p1)->no_hp }}
                            <br /><br /><br />
                            {{ optional($rs->p2)->no_telefon }}<br />{{ optional($rs->p2)->no_hp }}
                            <br /><br /><br />
                            {{ optional($rs->p3)->no_telefon }}<br />{{ optional($rs->p3)->no_hp }}
                            <br /><br /><br />
                            {{ optional($rs->pm)->no_telefon }}<br />{{ optional($rs->pm)->no_hp }}
                            <br />
                        </td>
                        <td align="center" valign="top">{{ $rs->catatan }}&nbsp;</td>
                    </tr>
                @if($numofday==$num_of_sidang)
                </table>
                <div style="page-break-after:always"></div>
                @endif
        @endif
    @endforeach
    @if($numofday<>$num_of_sidang)
    </table>
    @endif    
@endif

</form>
</html>
