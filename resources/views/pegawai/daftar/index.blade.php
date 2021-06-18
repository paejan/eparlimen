@extends('components.page')

@section('content')
<link rel="stylesheet" href="{{ asset('modalwindow/modal.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('modalwindow/dhtmlwindow.css') }}" type="text/css" />
<script type="text/javascript" src="{{ asset('modalwindow/dhtmlwindow.js') }}">

/***********************************************
* DHTML Window Widget- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script type="text/javascript" src="{{ asset('modalwindow/modal.js') }}"></script>
<script language="javascript" type="text/javascript">
function open_win(URL,type){
	//var id = document.frm.soalan_id.value;
	URL = URL + '?id=' + type;
	emailwindow=dhtmlmodal.open('EmailBox', 'iframe', URL, 'Maklumat Jadual Bertugas Pegawai', 'width=900px,height=500px,center=0,resize=0,scrolling=1')
} //End "opennewsletter" function
</script>
<div class="box" style="background-color:#F2F2F2">
	<div class="box-body">
            <div class="x_panel">
			<header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
                <div class="panel-actions">
                <!--<a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>-->
                </div>
                <h6 class="panel-title"><font color="#000000"><b>MAKLUMAT JADUAL PEGAWAI BERTUGAS</b></font></h6> 
            </header>
			</div>
        <table width="98%" align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>
                    @include('pegawai.daftar.cal')
                </td>
            </tr>
        </table>
        <br>
    </div>
</div>
@endsection