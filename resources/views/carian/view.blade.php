@include('components.dateformat')
<style type="text/css" media="all">
    table,tr,td{
        font-family:Arial, Helvetica, sans-serif;
        font-size:14px;
    }
    </style>
    <script language="javascript">    
    function do_cetak(id){
      // alert(id);
      window.print();
    }
    </script>
    
                <table width="100%" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="2%" height="40" align="left">&nbsp;</td>
                        <td width="96%" align="center"><h3>{{ $title }}</h3></td>
                        <td width="2%" align="right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="2%" height="40" align="left">&nbsp;</td>
                        <td width="96%">
                            <table width="100%" border="0">
                              <tr>
                                <td width="17%" align="left"><strong>Tarikh Soalan </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td width="83%" align="left">{{ DisplayDate($result->tkh_soalan) }} &nbsp;[dd-mm-yyyy]
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>No. Soalan : {{ $result->no_soalan }}</strong>
                                </td>
                              </tr>

                              <tr>
                                <td align="left"><strong>Jenis Pertanyaan </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{{ $result->tanya->pertanyaan }}</td>
                              </tr>

                              <tr>
                                <td align="left"><strong>Dewan </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{{ $result->dewan->dewan }}</td>
                              </tr>
                              
                              <tr>
                                <td align="left"><strong>Pertanyaan Oleh </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{{ $result->soalan_oleh }}</td>
                              </tr>

                              <tr>
                                <td align="left"><strong>Parlimen :</strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{{ $result->soalan_kawasan }}</td>
                              </tr>

                              <tr>
                                <td align="left"><strong>Kategori </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{{ $result->kategori->nama_kategori }}</td>
                              </tr>
                            
                              <tr>
                                <td align="left"><strong>Bahagian </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{{ $result->bahagian->nama_bahagian }}</td>
                              </tr>

                              <tr>
                                <td valign="top" align="left"><strong>Soalan </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{!! $result->soalan !!}<br /></td>
                              </tr>
                              
                              <tr>
                                <td valign="top" align="left"><strong>Jawapan </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left">{!! $result->jawapan !!}</td>
                              </tr>
                               
                              <tr>
                                <td valign="top" align="left"><strong>Disediakan Oleh </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td valign="top" align="left">
                                  {{ strtoupper(optional($rowp1)->nama_kakitangan) }}<br /> 
                                  {{ optional($rowp1)->jawatan_kakitangan }}<br />
                                  {{ optional(optional($rowp1)->bahagian)->nama_bahagian }}<br />
                                  {{ optional($rowp1)->no_telefon }}
                                </td>
                              </tr>	
                                
                              <tr>
                                  <td valign="top" align="left"><strong>Disemak Oleh </strong></td>
                                  <td valign="top" align="left"> : </td>
                                  <td valign="top" align="left">
                                    {{ strtoupper(optional($rowp2)->nama_kakitangan) }}<br /> 
                                    {{ optional($rowp2)->jawatan_kakitangan }}<br />
                                    {{ optional(optional($rowp2)->bahagian)->nama_bahagian }}<br />
                                    {{ optional($rowp2)->no_telefon }}
                                  </td>
                              </tr>	
                              
                              <tr>
                                  <td valign="top" align="left"><strong>Diluluskan Oleh </strong></td>
                                  <td valign="top" align="left"> : </td>
                                  <td valign="top" align="left">
                                    {{ strtoupper(optional($rowp3)->nama_kakitangan) }}<br /> 
                                    {{ optional($rowp3)->jawatan_kakitangan }}<br />
                                    {{ optional(optional($rowp3)->bahagian)->nama_bahagian }}<br />
                                    {{ optional($rowp3)->no_telefon }}
                                  </td>
                              </tr>	
                              <tr><td colspan="3"><hr /></td></tr>
                              <tr>
                                <td valign="top" align="left"><strong>Maklumat Tambahan </strong></td>
                                <td valign="top" align="left"> : </td>
                                <td align="left"></td>
                              </tr>
                              <tr>
                                <td valign="top" align="left"><strong></strong></td>
                                <td valign="top" align="left"></td>
                                <td align="left">{{ $result->maklumat_tambah }}</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="center">
                                  <input type="button" name="button3" id="button3" value="Tutup" class="btn btn-primary" 
                                  onclick="javascript:window.close();" />
                                  <input type="hidden" name="soalan_id" />
                                  <input type="button" value="Cetak" onclick="do_cetak('{{ $result->soalan_id }}')"  class="btn btn-default"  />	
                                </td>
                              </tr>
                           </table>
                        </td>
                        <td width="2%" align="right" >&nbsp;</td>
                    </tr>
                </table>
    
    