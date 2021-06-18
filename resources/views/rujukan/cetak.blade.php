<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Jawapan</title>
  <style media="print" type="text/css">
	/*body{FONT-SIZE: 14px;FONT-FAMILY: Arial;COLOR: #000000}*/
	  .printButton { display: none; }
  </style>
  <style type="text/css">
    .page1{FONT-SIZE: 20px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
    .page2{FONT-SIZE: 20px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
    .page3{FONT-SIZE: 16px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
    .page4{FONT-SIZE: 14px;FONT-FAMILY: Arial;COLOR: #000000; font-weight:bold;}
  </style>
  <script language="javascript" type="text/javascript">	
  function do_print(){
	  window.print();
  }
  function handleprint(){
	  window.print();
  }
  </script>
</head>
<body>
  <form id="frm" name="frm" method="post" action="" enctype="multipart/form-data">
    <div class="printButton" align="center">
      <table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
        <tr>
          <td align="center" colspan="2">
    	      <input type="button" value="Cetak" onClick="do_print()" style="cursor:pointer" />
            <input type="button" value="Kembali" onClick="javascript:window.close();" title="Sila klik untuk menutup paparan" style="cursor:pointer">
          </td>
        </tr>
      </table>
    </div>
    <table width="95%" cellpadding="0" cellspacing="0" align="center">
	    <tr>
        <td>
          <table width="100%" border="0" cellspacing="1" cellpadding="5" align="center">
            <tr>
              <td colspan="2" height="40">
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="2%" height="40" align="left">&nbsp;</td>
                    <td width="96%" align="center"><h3>Maklumat Dokumen Rujukan</h3></td>
                    <td width="2%" align="right">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="2%" height="40" align="left">&nbsp;</td>
                      <td width="96%">
                        <table width="100%">
                          <tr>
                            <td width="100%">{!! nl2br($doc->dokumen) !!}</td>
                          </tr> 
                          <tr>
                            <td align="left">
                              @if(!$attach->isEmpty())
                              <table width="100%" cellpadding="4" cellspacing="0" border="1" bgcolor="#000000">
                                <tr bgcolor="#CCCCCC" align="center">
                                  <td width="5%">Bil</td>
                                  <td width="40%">Tajuk</td>
                                  <td width="40%">Nama Dokumen</td>
                                  <td width="10%">Jenis</td>
                                </tr>
                                @php $bil = 0 @endphp
                                @foreach($attach as $a)
                                <tr bgcolor="#FFFFFF">
                                  <td width="5%" align="right">{{ ++$bil }}.&nbsp;</td>
                                  <td width="40%">{{ $a->file_tajuk }}</td>
                                  <td width="40%">{{ $a->file_name }}</td>
                                  <td width="10%" align="center">{{ $a->file_type }}</td>
                                </tr>
                                @endforeach
                              </table>
                              @endif
                            </td>
                          </tr>

                          <tr>
                            <td><br /><br />
                              <input type="button" name="button3" id="button3" value="Tutup" onclick="window.close();" />
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td width="2%" align="right" >&nbsp;</td>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
