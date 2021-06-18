@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script language="javascript">
function do_page(){
  var lj_kategori = $('#lj_kategori').val();
  var bahagian = $('#bahagian').val();
  var carian = $('#carian').val();

  window.location = 'carian?lj_kategori='+lj_kategori+'&bahagian='+bahagian+'&carian='+carian
}
</script>
@php
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
$lj_kategori=isset($_REQUEST["lj_kategori"])?$_REQUEST["lj_kategori"]:"";
$bahagian=isset($_REQUEST["bahagian"])?$_REQUEST["bahagian"]:"";
@endphp
  <div class="box" style="background-color:#F2F2F2">
    <div class="box-body">
      <input type="hidden" name="id" value="" />
      <div class="x_panel">
      <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <div class="panel-actions">
          <!--<a href="#" class="fa fa-caret-down"></a>
          <a href="#" class="fa fa-times"></a>-->
        </div>
        <h6 class="panel-title"><font color="#000000"><b>CARIAN MAKLUMAT</b></font></h6> 
      </header>
			</div>
    </div>            
    <br />
    <div class="box-body">
      <div class="form-group">
        <div class="col-md-5">
          <select name="bahagian" id="bahagian" class="form-control">
            <option value="">-- Semua Bahagian --</option>
            @foreach($bah as $bah)
            <option value="{{ $bah->id_bahagian }}" @if($bahagian == $bah->id_bahagian) selected @endif>{{ $bah->nama_bahagian }}</option>
            @endforeach
          </select>
        </div>   

        <div class="col-md-5">
          <select name="lj_kategori" id="lj_kategori" class="form-control">
            <option value="">-- Semua Kategori --</option>
            @foreach($kategori as $kat)
            <option value="{{ $kat->id_kategori }}" @if($lj_kategori == $kat->id_kategori) selected @endif>{{ $kat->nama_kategori }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-1 control-label" for="inputDefault">Carian</label>
        <div class="col-md-3">
          <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}">
        </div>
        <div class="col-md-5" align="left">
          <button type="button" class=" mb-xs mt-xs mr-xs btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
        </div>
      </div>                    
    </div>
    @if(!empty($carian) || !empty($bahagian) || !empty($lj_kategori))
    <div class="box-body">
      <div class="form-group">
        <div class="col-md-12">
          <b>Hasil carian : </b> Terdapat <font color="#FF0000"><b>{{ $search->total() }}</b></font> keputusan pencarian 
          @if(!empty($carian)) bagi perkataan <font color="#FF0000"><b>{{ $carian }}</b></font> @endif
        </div>
      </div>
      <table id="datatable-responsive" class="table dt-responsive" cellspacing="0" width="100%">
        <tbody>
          @php $bil = $search->perPage()*($search->currentPage()-1)@endphp
          @foreach($search as $rs)
            @php
                $content = trim(stripslashes($rs->content));
                $content = substr($content,0,300);
                $content  =str_replace("<!--","<!",$content);
                
                for($i=0;$i<$oc;$i++){
                  $content = str_replace($s[$i],"<font color=#FF0000>".$s[$i]."</font>",$content);
                  $content = str_replace(ucfirst($s[$i]),"<font color=#FF0000>".ucfirst($s[$i])."</font>",$content);
                  $content = str_replace(strtoupper($s[$i]),"<font color=#FF0000>".strtoupper($s[$i])."</font>",$content);
                  //print "<br>TEST";
                }
            @endphp
            @if ($rs->type == 'DOC')
              @php
                $nama_fail = $rs->link;
                $file_ext	= substr($nama_fail, strripos($nama_fail, '.'));
                $file_ext	= str_replace(".","",$file_ext);
                if($file_ext=='pdf'){ $img = "<img src=\"img\pdf.png\" border=\"0\">"; }
                else if($file_ext=='doc'){ $img = "<img src=\"img\doc.gif\" border=\"0\">"; }
                else if($file_ext=='xls'){ $img = "<img src=\"img\xls.gif\" border=\"0\">"; }
                else if($file_ext=='ppt'){ $img = "<img src=\"img\ppt.gif\" border=\"0\">"; }
              @endphp
              <tr>
                <td width=5% align=right valign=top>{{ ++$bil }}&nbsp;</td>
                <td width=95% valign=top align=left colspan=2>
                  <a href="\" target=_blank>{{ trim($rs->doc_title) }} - [ {{ $img }} ]</a><br>
                  {{ trim($content) }} ...<br>
                </td>
              </tr>
            @else
              <tr>
                <td width=5% align=right valign=top>{{ ++$bil }}&nbsp;</td>
                <td width=95% valign=top align=left colspan=2><a href="/carian/view/{{ $rs->ref_id }}" target=_blank>{{ trim($rs->doc_title) }}</a><br>
                  {!! trim($content) !!} ...<br>
                </td>
              </tr>  
            @endif
          @endforeach
        </tbody>
      </table>  
		</div>
    <div align="center" class="d-flex justify-content-center">
      {!! $search->appends(['lj_kategori'=>$lj_kategori,'bahagian'=>$bahagian,'carian'=>$carian])->render() !!}
    </div>
  </div>
</div>  
@else
<br /><br />
<div align="center">Sila masukkan maklumat carian anda.</div>
@endif
</table>
<br>
@endsection