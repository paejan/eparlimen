@include('components.dateformat')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laporan Persoalan Sidang Dewan</title>
  <link rel="stylesheet" type="text/css" href="../css/printmemo.css" />
  <style type="text/css" rel="stylesheet" media="all">
    p.breaks{
	  page-break-after: always;
    }	
    table, div, tr, td {
	  font-family:Verdana, Geneva, sans-serif;
	  font-size:12px;
    }
    .tajuk {
	  font-weight:bold;
    }
  </style>
  <style media="print" type="text/css">
    /*body{FONT-SIZE: 14px;FONT-FAMILY: Arial;COLOR: #000000}*/
    .printButton { display: none; }
    table, div, tr, td {
      font-family:Verdana, Geneva, sans-serif;
      font-size:12px;
    }
  </style>
  <script language="javascript" type="text/javascript">	
  function do_pages(){
  }
  function do_print(){
    window.print();
  }
  function handleprint(){
    window.print();
  }
  </script>
</head>
<body>
  <form name="frm" method="post" action="">
    <div class="printButton" align="center">
      <table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
        <tr>
          <td align="center" colspan="2">
            <input type="button" value="Cetak" onClick="do_print()" style="cursor:pointer" />
            <input type="button" value="Salin Ke Word" onClick="do_pages()" style="cursor:pointer" />
            <input type="button" value="Salin Ke Excel" onClick="do_pages()" style="cursor:pointer" />
            <input type="button" value="Kembali" onClick="javascript:window.close();" title="Sila klik untuk menutup paparan" style="cursor:pointer">
            <input type="hidden" name="j_dewan" value="{{ $j_dewan }}" />
            <input type="hidden" name="id_sidang" value="{{ $sidang }}" />
            <input type="hidden" name="mula" value="{{ $start }}" />
            <input type="hidden" name="hingga" value="{{ $end }}" />
          </td>
        </tr>
      </table>
    </div>

    <div align="center" class="tajuk">RINGKASAN PERTANYAAN {{ strtoupper($dewan) }}</div>
    <div align="center" class="tajuk">{{ $persidangan->persidangan }}</div>
    <div align="center" class="tajuk">({{ DisplayDateF($start) }} HINGGA {{ DisplayDateF($end) }})</div>
    <br/>
    <table width="95%" border="1" cellspacing="1" cellpadding="5" align="center">
      <tr class="tbl_tajuk">
        <td width="5%" align="center">BIL</td>
        <td width="20%" align="center">AHLI PARLIMEN<BR />/TARIKH</td>
        <td width="40%" align="center">PERTANYAAN</td>
        <td width="10%" align="center">TINDAKAN<BR />(Bhg./Unit)</td>
        <td width="10%" align="center">Hantar ke Bhg. Pen. Am</td>
        <td width="15%" align="center">DIJAWAB OLEH</td>
      </tr>
      @php $bil = 1; @endphp
      @foreach($soalan as $soal)
      <tr class="kandungan">
        <td align="right" valign="top">{{ $bil++ }}.&nbsp;</td>
        <td align="center" valign="top">{{ strtoupper($soal->soalan_oleh) }}<br />
          [ {{ strtoupper(nama_hari(date('N',strtotime($soal->tkh_jwb_parlimen)))) }} ]<br /><br />
          [ {{ DisplayDateF($soal->tkh_jwb_parlimen) }} ]
        </td>
        <td valign="top">{!! $soal->soalan !!}<br /><br />
        <td align="center" valign="top"><br />{{ optional($soal->bahagian)  ->nama_bahagian }} &nbsp;</td>
        <td align="center" valign="top"><br />
          @if(!empty($soal->tkh_agihan))
          {{ date('d/m/Y',strtotime($soal->tkh_agihan)) }}
          @endif
          <br />
          ({{ strtoupper(nama_hari(date('N',strtotime($soal->tkh_agihan)))) }})&nbsp;
        </td>
        <td align="center" valign="top"><br />{{ $soal->menteri }}&nbsp;</td>
      </tr>
      @endforeach
    </table>
  </form>
</body>
</html>
