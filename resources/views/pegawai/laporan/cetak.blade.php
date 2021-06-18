@include('components.dateformat')
<link rel="stylesheet" type="text/css" href="{{ asset('css/printmemo.css') }}" />
<STYLE TYPE="text/css">
	body, table, tr, td{
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
	}
    P.breakhere {page-break-before: always}
</STYLE>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td width="96%" align="center"><h3>{!! $title !!}</h3></td>
  </tr>
  <tr>
    <td width="96%">
      <table width="100%" border="0">
        <tr>
          <td width="20%">Dewan Persidangan :</td>
          <td width="80%">{{ $row->sidang->dewan->dewan }}</td>
        </tr>
        <tr>
          <td>Tarikh Soalan :</td>
          <td>{{ DisplayDate($row->jad_tkh) }}</td>
        </tr>
        <tr>
          <td>Hari :</td>
          <td>{{ nama_hari(date("N",strtotime($row->jad_tkh))) }}</td>
        </tr>
        <tr>
          <td>Pegawai Bertugas :</td>
          <td>
            1. {{ optional($row->p1)->nama_kakitangan }}<br />
            2. {{ optional($row->p2)->nama_kakitangan }}<br />
            3. {{ optional($row->p3)->nama_kakitangan }}
          </td>
        </tr>
        <tr>
          <td>Sidang :</td>
          <td>{{ $row->sidang->persidangan }}
            <input type="hidden" name="id_sidang" value="{{ $row->id_sidang }}" />
          </td>
        </tr>
        <tr>
          <td colspan="3"><hr /></td>
        </tr>
      </table>

      <table width="100%" border="0">
        <tr>
          <td colspan="3"><b><u>A. SESI JAWAPAN LISAN :</u></b></td>
        </tr>
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="95%">
            <table width="100%" border="1" cellpadding="5" cellspacing="0">
              <tr bgcolor="#CCCCCC">
                <td width="5%"><b>Bil</b></td>
                <td width="80%" align="center"><b>Perkara</b></td>
                <td width="15%" align="center"><b>Tindakan</b></td>
              </tr>
              <tr>
                <td width="5%">1.</td>
                <td>Jumlah soalan yang dibentangkan di dalam Dewan (mengikut Aturan Urusan Mesyuarat)</td>
                <td align="center">{{ $row_soalan->soalan1 }}&nbsp;</td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Jumlah soalan yang sempat dijawab di dalam Dewan</td>
                <td align="center">{{ $row_soalan->soalan2 }}&nbsp;</td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Adakah terdapat soalan-soalan yang ditujukan kepada Jabatan Kemajuan Islam Malaysia :<br />
                Jika ada, sebutkan nombor bilangan soalan tersebut</td>
                <td align="center">{{ $row_soalan->soalan3 }}<br />
                {{ $row_soalan->soalan3a }}
                </td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Adakah terdapat soalan-soalan tambahan kepada soalan soalan di (3): <br />
                Jika ada, huraikan soalan dan sebutkan nama Ahli Yang Berhormat dan Kawasan di Lampiran I</td>
                <td align="center">{{ $row_soalan->soalan4 }}<br />
                {{ $row_soalan->soalan4a }}&nbsp;</td>
              </tr>
              <tr>
                <td>5.</td>
                <td>Apakah jawapan-jawapan kepada (4)<br />- Huraikan secara lampiran</td>
                <td align="center">{{ $row_soalan->soalan5 }}&nbsp;</td>
              </tr>
              <tr>
                <td>6.</td>
                <td>Adakah soalan-soalan yang ditujukan kepada Perdana Menteri atau lain-lain Menteri tetapi ada berkaitan dengan 
                hal ehwal Jabatan Kemajuan Islam Malaysia :<br />
                Jika ada, sebutkan nama Ahli Yang Berhormat dan kawasan. Huraikan Soalan-soalan tersebut secara lampiran </td>
                <td align="center">{{ $row_soalan->soalan6 }}&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
      </table>

      <table width="100%" border="0" cellpadding="5" cellspacing="1">
        <tr>
          <td colspan="3"><b><u>B. PERBAHASAN TITAH UCAPAN/RANG UNDANG-UNDANG:</u></b></td>
        </tr>
        <tr>
          <td width="39%" valign="top">1. Siapakah Ahli-ahli Yang Berhormat yang membahaskan Titah Ucapan dan menyatakan isu 
          yang dibangkitkan sekiranya berkaitan dengan Jabatan Kemajuan Islam Malaysia:</td>
          <td width="7%">&nbsp;</td>
          <td width="54%" valign="top">{{ $row_soalan->soalan7 }}</td>
        </tr>
        <tr>
          <td valign="top">2. Apakah Rang Undang-undang yang dibahaskan:</td>
          <td>&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;2.1 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan8_1 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;2.2 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan8_2 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;2.3 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan8_3 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;2.4 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan8_4 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;2.5 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan8_5 }}</td>
        </tr>
        <tr>
          <td valign="top">3. Adakah Rang Undang-undang yang berkaitan dengan Jabatan Kemajuan Islam Malaysia dibahaskan:
          <i>(Jika ada, sebutkan nama Ahli Yang Berhormat dan Kawasan serta isu yang dibangkitkan di Lampiran II)</i></td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan9 }}</td>
        </tr>
        <tr>
          <td valign="top">4. Keputusan perbahasan Rang Undang-Undang di para 2:</td>
          <td>&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;4.1 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan10_1 }}<br />{{ $row_soalan->soalan10_1a }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;4.2 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan10_2 }}<br />{{ $row_soalan->soalan10_2a }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;4.3 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan10_3 }}<br />{{ $row_soalan->soalan10_3a }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;4.4 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan10_4 }}<br />{{ $row_soalan->soalan10_4a }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;4.5 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan10_5 }}<br />{{ $row_soalan->soalan10_5a }}</td>
        </tr>
        <tr>
          <td valign="top">5. Apakah Rang Undang-undang yang ditangguhkan:</td>
          <td>&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;5.1 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan11_1 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;5.2 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan11_2 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;5.3 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan11_3 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;5.4 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan11_4 }}</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;5.5 Rang Undang-Undang:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->soalan11_5 }}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
          <td colspan="3"><b><u>C. PENUTUP:</u></b></td>
        </tr>
        <tr>
          <td valign="top">1. Dewan ditangguhkan pada pukul:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->dewan_tangguh }}</td>
        </tr>
        <tr>
          <td valign="top">2. Persidangan akan disambung pada:</td>
          <td>&nbsp;</td>
          <td valign="top">{{ $row_soalan->sidang_sambung }}</td>
        </tr>
        <tr><td colspan="3"><hr /></td></tr>
        <tr>
          <td colspan="3"><b><u>DILAPORKAN OLEH:</u></b>
          <BR />
          </td>
        </tr>
        <tr>
          <td colspan="1"><br /><br /><br />
          <!--..........................................................-->
          <label style="border-bottom:dotted"> Cetakan komputer, Tidak perlu tandatangan </label><BR />
          ( {{ $row->p1->nama_kakitangan }} )<br />
          Bahagian : {{ $row->p1->bahagiannama_bahagian }}<br />
          Tarikh : {{ DisplayDate($row_soalan->update_dt) }}
          </td>
          <td>&nbsp;</td>
          <td colspan="1"><br /><br /><br />
          @if(!empty($row->pegawai2))
          <!--..........................................................-->
          <label style="border-bottom:dotted"> Cetakan komputer, Tidak perlu tandatangan </label><BR />
          ( {{ $row->p2->nama_kakitangan }} )<br />
          Bahagian : {{ $row->p2->bahagiannama_bahagian }}<br />
          Tarikh : {{ DisplayDate($row_soalan->update_dt) }}
          @endif  
          </td>
        </tr>
        @if(!empty($row->pegawai3))
        <tr>
          <td colspan="1"><br /><br /><br />
          <!--..........................................................-->
          <label style="border-bottom:dotted"> Cetakan komputer, Tidak perlu tandatangan </label><BR />
          ( {{ $row->p3->nama_kakitangan }} )<br />
          Bahagian : {{ $row->p3->bahagiannama_bahagian }}<br />
          Tarikh : {{ DisplayDate($row_soalan->update_dt) }}
          </td>
          <td>&nbsp;</td>
          <td colspan="1"><br /><br /><br /></td>
        </tr>
        @endif
      </table>

      <tr>
        <td colspan="3">
          <div style="page-break-after:always">&nbsp;</div>
          <table width="100%" border="0">
            <tr>
              <td colspan="2" align="right"><b>LAMPIRAN I </b></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><b><u>LAPORAN PEGAWAI BERTUGAS</u></b></td>
            </tr>
            <tr>
              <td colspan="2" align="left"><b>Dewan : {{ $row->sidang->dewan->dewan }}</b></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><b><u>SOALAN TAMBAHAN</u></b></td>
            </tr>
            <tr>
              <td width="15%">Tarikh Soalan :</td>
              <td width="85%">{{ DisplayDate($row->jad_tkh) }}</td>
            </tr>
            <tr>
              <td>Hari :</td>
              <td>{{ nama_hari(date("N",strtotime($row->jad_tkh))) }}</td>
            </tr>
            <tr><td colspan="2"><hr /></td></tr>
            @if(!$row_l1->isEmpty())
            @php $bil=0; @endphp
            @foreach ($row_l1 as $l1)
            <tr>
              <td colspan="2" align="left"><b>SOALAN TAMBAHAN {{ ++$bil }}</b></td>
            </tr>
            <tr>
              <td valign="top" align="left" width="25%">Nama Y. Berhormat :</td>
              <td valign="top" align="left" width="75%">{{ stripslashes($l1->ahli_parlimen) }}</td>
            </tr>
            <tr>
              <td valign="top" align="left" width="25%">Kawasan:</td>
              <td valign="top" align="left" width="75%">{{ stripslashes($l1->kawasan_parlimen) }}</td>
            </tr>
            <tr>
              <td valign="top" align="left">Masa:</td>
              <td valign="top" align="left">{{ $l1->masa }}</td>
            </tr>
            <tr>
              <td valign="top" align="left">Soalan/Isu/Pendapat:</td>
              <td valign="top" align="left" height="60px">{{ stripslashes(nl2br($l1->soalan)) }}</td>
            </tr>
            <tr>
              <td valign="top" align="left">Tindakan:</td>
              <td valign="top" align="left" height="60px">{{ stripslashes(nl2br($l1->tindakan)) }}</td>
            </tr>
            <tr><td colspan="2"><hr /></td></tr>
            @endforeach
            @endif
          </table>
        </td>
      </tr>

      <tr>
        <td colspan="3">
          <div style="page-break-after:always">&nbsp;</div>
          <table width="100%" border="0">
            <tr>
              <td colspan="2" align="right"><b>LAMPIRAN II </b></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><b><u>LAPORAN PEGAWAI BERTUGAS</u></b></td>
            </tr>
            <tr>
              <td colspan="2" align="left"><b>Dewan : {{ $row->sidang->dewan->dewan }}</b></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><b>PERBAHASAN TITAH DIRAJA YANG BERKAITAN<br /><u>JABATAN KEMAJUAN ISLAM MALAYSIA</u></b></td>
            </tr>
            <tr>
              <td width="15%">Tarikh Soalan :</td>
              <td width="85%">{{ DisplayDate($row->jad_tkh) }}</td>
            </tr>
            <tr>
              <td>Hari :</td>
              <td>{{ nama_hari(date("N",strtotime($row->jad_tkh))) }}</td>
            </tr>
            <tr><td colspan="2"><hr /></td></tr>
            @if(!$row_l2->isEmpty())
            @php $bil=0; @endphp
            @foreach ($row_l2 as $l2)
            <tr>
              <td colspan="2" align="left"><b>PERBAHASAN {{ ++$bil }}</b></td>
            </tr>
            <tr>
              <td valign="top" align="left" width="25%">Nama Y. Berhormat :</td>
              <td valign="top" align="left" width="75%">{{ stripslashes($l2->ahli_parlimen) }}</td>
            </tr>
            <tr>
              <td valign="top" align="left" width="25%">Kawasan:</td>
              <td valign="top" align="left" width="75%">{{ stripslashes($l2->kawasan_parlimen) }}</td>
            </tr>
            <tr>
              <td valign="top" align="left">Masa:</td>
              <td valign="top" align="left">{{ $l2->masa }}</td>
            </tr>
            <tr>
              <td valign="top" align="left">Soalan/Isu/Pendapat:</td>
              <td valign="top" align="left" height="60px">{{ stripslashes(nl2br($l2->soalan)) }}</td>
            </tr>
            <tr>
              <td valign="top" align="left">Tindakan:</td>
              <td valign="top" align="left" height="60px">{{ stripslashes(nl2br($l2->tindakan)) }}</td>
            </tr>
            <tr><td colspan="2"><hr /></td></tr>
            @endforeach
            @endif
          </table>
        </td>
      </tr>

      <table width="100%" border="0">
        <tr>
          <td colspan="2" align="center">
            <input type="hidden" name="id" value="{{ $row_soalan->id }}" />
            <input type="hidden" name="jad_id" value="{{ $row->jad_id }}" />
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
