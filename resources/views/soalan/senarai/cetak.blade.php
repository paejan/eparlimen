@include('components.dateformat')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cetak Jawapan</title>
  <style type="text/css">
    .page1{FONT-SIZE: 20px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
    .page2{FONT-SIZE: 20px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
    .page3{FONT-SIZE: 18px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
    .page4{FONT-SIZE: 16px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
  </style>
</head>
<body>
  <div align="right" class="page1"><h3>Soalan No. : {{ $soalan->no_soalan }}</h3></div>
  <br/>

  <table width="70%" border="0" cellspacing="1" cellpadding="5" align="center" class="page1">
    <tr>
      <td valign="top" align="center">{{ strtoupper($soalan->dewan->dewan) }}</td>
    </tr>	
    <tr>
      <td valign="top" align="center">{{ $soalan->sidang->persidangan }}</td>
    </tr>	
  </table>

  <hr />
  <br /><br />

  <table width="90%" border="0" cellspacing="1" cellpadding="5" align="center" class="page1">
    <tr>
      <td valign="top" width="28%">PERTANYAAN </td>
      <td valign="top" width="2%"> : </td>
      <td valign="top" width="70%">{{ strtoupper($soalan->tanya->pertanyaan) }} </td>
    </tr>	
    <tr>
      <td valign="top">DARIPADA </td>
      <td valign="top"> : </td>
      <td valign="top">{{ strtoupper($soalan->soalan_oleh) }}</br>{{ strtoupper($soalan->soalan_kawasan) }}</td>
    </tr>	
    <tr>
      <td valign="top">TARIKH </td>
      <td valign="top"> : </td>
      <td valign="top">{{ DisplayDateF($soalan->tkh_soalan) }} </td>
    </tr>	
    <tr>
      <td valign="top" colspan="3">&nbsp;</td>
    </tr>	
    <tr>
      <td valign="top"><u>SOALAN : </u></td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>	
    <tr>
      <td valign="top" colspan="3" align="justify">{!! stripslashes(nl2br($soalan->soalan)) !!}</td>
    </tr>	
    <tr>
      <td valign="top" colspan="3">&nbsp;<br /><br /></td>
    </tr>	
    <tr>
      <td valign="top"><u>JAWAPAN : </u></td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>	
    <tr>
      <td valign="top" colspan="3" align="justify">{!! stripslashes(nl2br($soalan->jawapan)) !!}</td>
    </tr>	
  </table>

  <!--<p style="page-break-before: always">-->

  <table width="90%" border="0" cellspacing="1" cellpadding="5" align="center" class="page3">
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" width="28%">Disediakan Oleh </td>
      <td valign="top" width="2%"> : </td>
      <td valign="top" width="70%">.............................................................. <!--<img src="../img/apps.gif" height="25" width="25" />--></td>
    </tr>

    <tr>
      <td valign="top">Nama Pegawai</td>
      <td valign="top"> : </td>
      <td valign="top">{{ strtoupper($sedia->nama_kakitangan ?? '') }} </td>
    </tr>	
    <tr>
      <td valign="top">Jawatan </td>
      <td valign="top"> : </td>
      <td valign="top">{{ $sedia->jawatan_kakitangan ?? '' }}</br>{{ $sedia->nama_bahagian ?? '' }} </td>
    </tr>	
    <tr>
      <td valign="top">No. Telefon </td>
      <td valign="top"> : </td>
      <td valign="top">{{ $sedia->no_telefon ?? '' }} </td>
    </tr>
    <tr>
      <td colspan="3" height="40">&nbsp;</td>
    </tr>	
    <tr>
      <td valign="top" width="28%">Disemak Oleh </td>
      <td valign="top" width="2%"> : </td>
      <td valign="top" width="70%">.............................................................. <!--<img src="../img/apps.gif" height="25" width="25" />--></td>
    </tr>	
    <tr>
      <td valign="top">Nama Pegawai</td>
      <td valign="top"> : </td>
      <td valign="top">{{ strtoupper($semak->nama_kakitangan ?? '') }} </td>
    </tr>	
    <tr>
      <td valign="top">Jawatan </td>
      <td valign="top"> : </td>
      <td valign="top">{{ $semak->jawatan_kakitangan ?? '' }}</br>{{ $semak->nama_bahagian ?? '' }} </td>
    </tr>	
    <tr>
      <td valign="top">No. Telefon </td>
      <td valign="top"> : </td>
      <td valign="top">{{ $semak->no_telefon ?? '' }} </td>
    </tr>
    <tr>
      <td colspan="3" height="40">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" width="28%">Diluluskan Oleh </td>
      <td valign="top" width="2%"> : </td>
      <td valign="top" width="70%">.............................................................. <!--<img src="../img/apps.gif" height="25" width="25" />--></td>
    </tr>	
    <tr>
      <td valign="top">Nama Pegawai</td>
      <td valign="top"> : </td>
      <td valign="top">{{ strtoupper($lulus->nama_kakitangan ?? '') }} </td>
    </tr>	
    <tr>
      <td valign="top">Jawatan </td>
      <td valign="top"> : </td>
      <td valign="top">{{ $lulus->jawatan_kakitangan ?? '' }}</br>{{ $lulus->nama_bahagian ?? '' }} </td>
    </tr>	
    <tr>
      <td valign="top">No. Telefon </td>
      <td valign="top"> : </td>
      <td valign="top">{{ $lulus->no_telefon ?? '' }} </td>
    </tr>
    <tr>
      <td colspan="3" height="40">&nbsp;</td>
    </tr>
  </table>
</body>
</html>
