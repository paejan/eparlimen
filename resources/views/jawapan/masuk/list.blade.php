<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_input(ids) {
    $.ajax({
        url:'/soalan/jawapan/list_store?id_bahagian='+ids, //&datas='+datas,
        type:'POST',
        data: $("form").serialize(),
        //data: datas,
        success: function(data){
            console.log(data);
        }
    });
}
function do_close() {
    window.location.reload();
}
</script>
<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b class="modal-title">Senarai Agensi</b></font></h6>
        </header>
        <div class="panel-body">
            <input type="hidden" id="ids" name="ids" value="{{ $soalan_id }}">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <tr>
                            <td width="5%" align="right">&nbsp;</td>
                            <td width="65%" align="left"><b>Nama Agensi</b></td>
                            <td width="10%" align="center"><b>Tindakan</b></td>
                        </tr>
                        @php $bil = 0; @endphp
                        @foreach ($bah as $bahagian)
                        <tr>
                            @php
                                $input = App\SoalanInput::where('soalan_id',$soalan_id)->where('bahagian_id',$bahagian->id_bahagian)->first();
                            @endphp
                            <td width="10%" align="center">{{ ++$bil }}</td>
                            <td width="65%" align="left">{{ $bahagian->nama_bahagian }}</td>
                            <td width="10%" align="center">
                                <input type="checkbox" name="is_add[{{ $bahagian->id_bahagian }}]" @if(!empty($input) && $input->is_delete == 1) checked @endif value="1" onchange="do_input({{ $bahagian->id_bahagian }})">
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12"><div align="center">
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
            </div>
        </div>
    </section>
</div>
