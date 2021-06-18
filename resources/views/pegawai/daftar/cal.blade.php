@include('components.datepicker')
<script type="text/javascript" src="{{ asset('cal/script/wz_tooltip.js') }}"></script>
<script type="text/javascript" src="{{ asset('cal/script/tip_balloon.js') }}"></script>
<script>
function do_page()
{
  var sel_mth = $('#sel_mth').val();
  var sel_year = $('#sel_year').val();

  window.location = '/peg_bertugas/cal_view?sel_mth='+sel_mth+'&sel_year='+sel_year;
}

function do_cetak(type)
{
  // alert(type);
  if(type.trim == ''){
    document.jakim.action = '/peg_bertugas/cetak_peg/view';
  } else {
    document.jakim.action = '/peg_bertugas/cetak_peg/view?pro=BLN';
  }
  document.jakim.target = '_blank';
  document.jakim.method = 'GET';
  document.jakim.submit();
}

function do_edit(id)
{
  window.location = "cal_view/add_pegawai_form/"+id;
}
</script>
@php
$objKalendar = new KalendarDP();
if(!empty($_GET['sel_year'])){
	$objKalendar->setYear($_GET['sel_year']);//Set current year to prev year
	$yr = $_GET['sel_year'];
} else {
	if (!empty($_GET['prevYear'])){
		$objKalendar->setYear($_GET['prevYear']);//Set current year to prev year
		$yr = $_GET['prevYear'];
	}elseif (!empty($_GET['nextYear'])){
		$objKalendar->setYear($_GET['nextYear']);//Set current year to next year
		$yr = $_GET['nextYear'];
	}elseif(!empty($_GET['curYear'])){
		$objKalendar->setYear(($_GET['curYear']));
		$yr = $_GET['curYear'];
	}else{	
		$objKalendar->setYear(date("Y"));//Set default year
		$yr = date("Y");
	}
}

if(!empty($_GET['sel_mth'])){
	$objKalendar->setMonth($_GET['sel_mth']);//Set current year to prev year
	$mth = $_GET['sel_mth'];
} else {
	if(!empty($_GET['prevMonth'])){
		$objKalendar->setMonth(($_GET['prevMonth']));//Set current month to prev month
		$mth = $_GET['prevMonth'];
	}elseif(!empty($_GET['nextMonth'])){
		$objKalendar->setMonth(($_GET['nextMonth']));//Set current month to next month
		$mth = $_GET['nextMonth'];
	}else{	
		$objKalendar->setMonth(date("m")); //Set default month
		$mth = date("m");
	}
}

//Variables for calendar
$intDays = 1; //Start to end day of the month
$intAllDays = 0; //All days (35 days)

$intDayInMonth = $objKalendar->getDaysInMonth();//Get days in month (28-31)
$intStartDayOfMonth = $objKalendar->getFirstDayOfMonth();//Get start day of the month (0-6)
$intYear = $objKalendar->getYear();//Get year
$strLongMonth = $objKalendar->getLongMonth();//Get Long Month eg: September
$strLongMonth1 = $objKalendar->getLongMonth();//Get Long Month eg: September
$intMonth = $objKalendar->getMonth();

$d=date("d")-0;
$m=date("m")-0;
$y=date("Y");

$hourdiff = "0";
$timeadjust = ($hourdiff * 60 * 60);
$melbdate = date("Y-m-d h:i a",time() + $timeadjust);
//$Today = substr($melbdate,8,2)."/".substr($melbdate,5,2)."/".substr($melbdate,0,4);
$Today = date("d/m/Y");
$curr_date = date("Y-m-d");
$curr_dt = date("d");
$curr_mt = date("m");

if($intMonth==1){
	$prevYear = $intYear - 1;  
	$prevMonth = $intMonth - 1; 
	if ($prevMonth % 12 == 0){
		$prevMonth = 12;
		$intYear = $intYear;
	}
} else {
	$prevYear = $intYear;  
	$prevMonth = $intMonth - 1; 
	if ($prevMonth % 12 == 0){
		$prevMonth = 12;
		$intYear = $intYear;
	}
}

  $nextMonth = $intMonth + 1; 
  if ($nextMonth % 13 == 0){
	$nextMonth = 1;
	$nextYear = $intYear + 1;
  } else {
	$nextYear = $intYear;
  }	
  
@endphp

<div align="center">
  <input type="hidden" value="BLN" name="pro" id="pro"/>
  <table width="100%" border="1" cellspacing="0" cellpadding="5" class="headline_box">
    <tr>
      <td colspan="7" bgcolor="#B9CAE6">
        <table width=100% border="0" style="height:50px">
          <tr> 
            <td valign="middle" nowrap width="20%"align="left">&nbsp;
              <a href="cal_view?prevMonth=<?=$prevMonth;?>&curYear=<?=$prevYear;?>&p=PREV">
                <img src="{{ asset('images/arrow_left.gif') }}" title="Sila klik untuk paparan bulan terdahulu" />
              </a>
            </td>
            <td valign="middle" width="100%" align="left">
              <div align="center">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">
                  <div class="col-md-2 col-xm-3">
                    <select name="sel_mth" id="sel_mth" class="form-control" onchange="do_page()">
                        <option value="1" @if($mth=='1') selected @endif>Januari</option>
                        <option value="2" @if($mth=='2') selected @endif>Februari</option>
                        <option value="3" @if($mth=='3') selected @endif>Mac</option>
                        <option value="4" @if($mth=='4') selected @endif>April</option>
                        <option value="5" @if($mth=='5') selected @endif>May</option>
                        <option value="6" @if($mth=='6') selected @endif>Jun</option>
                        <option value="7" @if($mth=='7') selected @endif>Julai</option>
                        <option value="8" @if($mth=='8') selected @endif>Ogos</option>
                        <option value="9" @if($mth=='9') selected @endif>September</option>
                        <option value="10" @if($mth=='10') selected @endif>Oktober</option>
                        <option value="11" @if($mth=='11') selected @endif>November</option>
                        <option value="12" @if($mth=='12') selected @endif>Disember</option>
                    </select>
                  </div>
                  <div class="col-md-2 col-xm-3">
                    <select name="sel_year" id="sel_year" class="form-control" onchange="do_page()">
                        @for ($t=date("Y")+1;$t>=2008;$t--)
                        <option value="{{ $t }}" @if($yr==$t) selected @endif>{{ $t }}</option>
                        @endfor
                    </select>
                  </div>
                  <div class="col-md-3">
                    <a href="cal_view/info?sel_mth={{ $mth }}&sel_year={{ $yr }}" data-toggle="modal" data-target="#myModal"  
                      title="Selenggaran maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana">
                    <input type="button" value="Maklumat Pegawai Bertugas" style="cursor:pointer" class="form-control btn btn-primary"/></a>
                  </div>
                </font>
              </div>
              <div class="col-md-2">
                <input type="button" value="Cetak Jadual Bulan" style="cursor:pointer" class="form-control btn btn-primary" onClick="do_cetak('BLN')" />
                </div>
                <div class="col-md-2">
                <input type="button" value="Cetak Jadual Sidang" style="cursor:pointer" class="form-control btn btn-primary"onClick="do_cetak('')" />
              </div>
            </td>
            <td valign="middle" nowrap width="20%" align="right">
              <a href="cal_view?nextMonth=<?=$nextMonth;?>&curYear=<?=$nextYear;?>&p=NEXT">
              <img src="{{ asset('images/arrow_right.gif') }}" title="Sila klik untuk paparan bulan kehadapan" /></a>&nbsp;
            </td>
          </tr>
        </table>
      </td>
    </tr>
  
    <tr class=tablebg style="height:40px"> 
      <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">Ahad</font></b></div></td>
      <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Isnin</font></b></div></td>
      <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Selasa</font></b></div></td>
      <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Rabu</font></b></div></td>
      <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Khamis</font></b></div></td>
      <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Jumaat</font></b></div></td>
      <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">Sabtu</font></b></div></td>
    </tr>

    @for ($i=0;$i<6;$i++)   
    <tr class=cal_bg>
      @for ($j=0;$j<7;$j++)
        <td height=60 valign=top class=Days>
          @if ($intAllDays >= $intStartDayOfMonth && $intDays <= $intDayInMonth)
            @php
              $intMonth = $intMonth - 0;
            @endphp

            @if ($j==0 || $j==5 || $j==6)
                @if ($intDays == $curr_dt && $intMonth == $curr_mt)
                  <table width=100% bgcolor=#B9CAE6 border=0><tr><td title=Today style="cursor:pointer;padding-left:5px;padding-right:5px;" align=left>
                    <font size=1 face=Verdana, Arial, Helvetica, sans-serif color=red><b><i>{{ $intDays }}</i></b></font>
                @else
                  <table width=100%><tr><td align=left style="padding-left:5px;padding-right:5px;">
                    <font size=1 face=Verdana, Arial, Helvetica, sans-serif color=red>{{ $intDays }}</font>
                @endif
                
                @php
                  if (strlen($intDays)<2)	{$day = "0" . $intDays;} else { $day = $intDays;}
                  if (strlen($intMonth)<2) {$month = "0" . $intMonth;} else { $month = $intMonth; }		
                  $dateDisp = "$intYear-$month-$day";
                @endphp
                
                @foreach ($result_t->where('jad_tkh',$dateDisp)->where('kod_sidang.status',0) as $rst)
                  <font size=1 face=Verdana, Arial, Helvetica, sans-serif color="#000000">
                  @if(!empty($rst->pegawai1)) <br>P1 - {{ $rst->p1->nama_kakitangan }} @endif
                  @if(!empty($rst->pegawai2)) <br>P2 - {{ $rst->p2->nama_kakitangan }} @endif
                  @if(!empty($rst->pegawai3)) <br>P3 - {{ $rst->p3->nama_kakitangan }} @endif
                  <br>
                  @if(!empty($rst->urusetia)) <br>UR - {{ $rst->us->nama_kakitangan }} @endif
                  @if(!empty($rst->pemandu)) <br>PE - {{ $rst->pm->nama_kakitangan }} @endif
                  </font><br>
                @endforeach
                </td></tr></table>
            @else
                @if ($intDays == $curr_dt  && $intMonth == $curr_mt)
                  <table width=100% bgcolor=#B9CAE6 border=0><tr><td title=Today style="cursor:pointer;padding-left:5px;padding-right:5px;" align=left>
                    <font size=1 face=Verdana, Arial, Helvetica, sans-serif color=red><b><i>{{ $intDays }}</i></b></font>

                    @php
                      if (strlen($intDays)<2)	{$day = "0" . $intDays;} else { $day = $intDays;}
                      if (strlen($intMonth)<2) {$month = "0" . $intMonth;} else { $month = $intMonth; }			
                      $dateDisp = "$intYear-$month-$day";
                    @endphp
                    
                    @foreach ($result_p->where('jad_tkh',$dateDisp)->where('kod_sidang.status',0) as $rsp)
                      <u>{{ $rsp->dewan }}</u></a>
                      &nbsp;<img src="{{ asset('images/edit.png') }}" style="cursor:pointer" onclick="do_edit('{{ $rsp->jad_id }}')" title="Kemaskini Maklumat Pegawai">
                      <input type="hidden" value="{{ $rsp->id_sidang }}" name="id_sidang" id="id_sidang"/>
                      <table width="100%" cellpadding="3" cellspacing="0" border="0" style="font-size:10px">
                      @if(!empty($rsp->pegawai1) || !empty($rsp->pegawai1_bhg))
                        <tr>
                          <td valign="top" width="10%"><b>P1:</b> </td>
                          <td>{{ optional($rsp->bhgp1)->kod_bahagian }} - {{ $rsp->p1->nama_kakitangan }}</td>
                        </tr>
                      @endif
                      @if(!empty($rsp->pegawai2) || !empty($rsp->pegawai2_bhg))
                      <tr>
                        <td valign="top" width="10%"><b>P2:</b> </td>
                        <td>{{ optional($rsp->bhgp2)->kod_bahagian }} - {{ $rsp->p2->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      @if(!empty($rsp->pegawai3) || !empty($rsp->pegawai3_bhg))
                      <tr>
                        <td valign="top" width="10%"><b>P3:</b> </td>
                        <td>{{ optional($rsp->bhgp3)->kod_bahagian }} - {{ $rsp->p3->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      <br>
                      @if(!empty($rsp->urusetia))
                      <tr>
                        <td valign="top" width="10%"><b>UR:</b> </td>
                        <td>{{ $rsp->us->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      @if(!empty($rsp->pemandu))
                      <tr>
                        <td valign="top" width="10%"><b>PE:</b> </td>
                        <td>{{ $rsp->pm->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      </table>
                    @endforeach
                  </td></tr></table>
                @else
                  <table width=100%><tr><td align=left style="padding-left:5px;padding-right:5px;">
                    <font size=1 face=Verdana, Arial, Helvetica, sans-serif color=#000000>{{ $intDays }}</font>

                    @php
                      if (strlen($intDays)<2)	{$day = "0" . $intDays;} else { $day = $intDays;}
                      if (strlen($intMonth)<2) {$month = "0" . $intMonth;} else { $month = $intMonth; }			
                      $dateDisp = date('Y-m-d', strtotime("$intYear-$month-$day"));$dateDisp = "$intYear-$month-$day";	
                      $dateDisp = "$intYear-$month-$day";
                      // echo $dateDisp;
                    @endphp

                    @foreach ($result_p->where('jad_tkh',$dateDisp)->where('kod_sidang.status',0) as $rsp)
                      <u>{{ $rsp->dewan }}</u></a>
                      &nbsp;<img src="{{ asset('images/edit.png') }}" style="cursor:pointer" onclick="do_edit('{{ $rsp->jad_id }}')" title="Kemaskini Maklumat Pegawai">
                      <input type="hidden" value="{{ $rsp->id_sidang }}" name="id_sidang" id="id_sidang"/>
                      <table width="100%" cellpadding="3" cellspacing="0" border="0" style="font-size:10px">
                      @if(!empty($rsp->pegawai1) || !empty($rsp->pegawai1_bhg))
                        <tr>
                          <td valign="top" width="10%"><b>P1:</b> </td>
                          <td>{{ optional($rsp->bhgp1)->kod_bahagian }} - {{ $rsp->p1->nama_kakitangan }}</td>
                        </tr>
                      @endif
                      @if(!empty($rsp->pegawai2) || !empty($rsp->pegawai2_bhg))
                      <tr>
                        <td valign="top" width="10%"><b>P2:</b> </td>
                        <td>{{ optional($rsp->bhgp2)->kod_bahagian }} - {{ $rsp->p2->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      @if(!empty($rsp->pegawai3) || !empty($rsp->pegawai3_bhg))
                      <tr>
                        <td valign="top" width="10%"><b>P3:</b> </td>
                        <td>{{ optional($rsp->bhgp3)->kod_bahagian }} - {{ $rsp->p3->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      <br>
                      @if(!empty($rsp->urusetia))
                      <tr>
                        <td valign="top" width="10%"><b>UR:</b> </td>
                        <td>{{ $rsp->us->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      @if(!empty($rsp->pemandu))
                      <tr>
                        <td valign="top" width="10%"><b>PE:</b> </td>
                        <td>{{ $rsp->pm->nama_kakitangan }}</td>
                      </tr>
                      @endif
                      </table>
                    @endforeach
                  </td></tr></table>
                @endif
            @endif
            @php $intDays = $intDays + 1; @endphp
          @endif
        </td>
        @php $intAllDays = $intAllDays + 1; @endphp
      @endfor
    </tr>
    @endfor
      <td colspan="7" align="center" bgcolor="#B9CAE6">
          <font size=1 face=Verdana, Arial, Helvetica, sans-serif color="#000000"><b>
          @php 
              $dateDayDesc = date("D");
              $dateDay = date("d");
              $dateYear = date("Y");
              $dateMth = date("M");
              
              if($dateDayDesc=='Sun'){ $dateDayDesc='Ahad'; }
              else if($dateDayDesc=='Mon'){ $dateDayDesc='Isnin'; }
              else if($dateDayDesc=='Tue'){ $dateDayDesc='Selasa'; }
              else if($dateDayDesc=='Wed'){ $dateDayDesc='Rabu'; }
              else if($dateDayDesc=='Thu'){ $dateDayDesc='Khamis'; }
              else if($dateDayDesc=='Fri'){ $dateDayDesc='Jumaat'; }
              else if($dateDayDesc=='Sat'){ $dateDayDesc='Sabtu'; }

              if($dateMth=='Jan'){ $dateMth='Januari'; }
              else if($dateMth=='Feb'){ $dateMth='Februari'; }
              else if($dateMth=='Mar'){ $dateMth='Mac'; }
              else if($dateMth=='Apr'){ $dateMth='April'; }
              else if($dateMth=='May'){ $dateMth='Mei'; }
              else if($dateMth=='Jun'){ $dateMth='Jun'; }
              else if($dateMth=='Jul'){ $dateMth='Julai'; }
              else if($dateMth=='Aug'){ $dateMth='Ogos'; }
              else if($dateMth=='Sept'){ $dateMth='September'; }
              else if($dateMth=='Oct'){ $dateMth='Oktober'; }
              else if($dateMth=='Nov'){ $dateMth='November'; }
              else if($dateMth=='Dec'){ $dateMth='Disember'; }
          @endphp
          Today: {{ $dateDayDesc }} , {{ $dateDay }} {{ $dateMth }} {{ $dateYear }}
          </b></font>
      </td>
    </tr>
  </table>
</div>