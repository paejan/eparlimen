<script language="javascript">
function do_save(ids,type)
{
    // alert(ids+type);
    $.ajax({
        url:'/utiliti/kakitangan/menu_store?id_menu='+ids+'&type='+type, //&datas='+datas,
        type:'POST',
        //dataType: 'json',
        beforeSend: function () {
            $('#simpan').attr("disabled","disabled");
            $('.dispmodal').css('opacity', '.5');
        },
        data: $("form").serialize(),
        //data: datas,
        success: function(data){
            console.log(data);
            $('#'+data).prop( "checked", true );
        }
    });
}
</script>
<div class="col-md-12">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
        <div style="float:right"><span><label data-dismiss="modal" aria-label="Close" style="cursor:pointer"><b>X</b></label></span></div>
        <h6 class="panel-title"><font color="#000000" size="3"><b>KEMASKINI MENU CAPAIAN PENGGUNA</b></font></h6>
    </header>
    <div class="panel-body">

        <input type="hidden" name="ids" value="{{ $rs->id_kakitangan }}">
        <div class="col-md-12">
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label">ID Pengguna Sistem : </label>
                <div class="col-sm-3">
                    <input type="text" name="userid" id="userid" class="form-control" placeholder="ID Pengguna" disabled="disabled" value="{{ stripslashes($rs->userid) }}">
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label class="col-sm-3 control-label">Nama Pengguna Sistem : </label>
                <div class="col-sm-9">
                    <input type="text" name="nama_kakitangan" id="nama_kakitangan" class="form-control" placeholder="Nama Pengguna" disabled="disabled" value="{{ stripslashes($rs->nama_kakitangan) }}">
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-12 control-label">
                        <i color="red"> *Proses penyimpanan data disimpan secara automatik apabila pengguna klik dimana-mana kotak.</i>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        @php $bil=0; @endphp
                        @for ($i = 0; $i < $rs_m->count(); $i++)
                            <tr>
                                <td width="5%" align="right">&nbsp;</td>
                                <td width="65%" align="left"><b>Nama Menu</b></td>
                                <td width="10%" align="center"><b>Tambah</b></td>
                                <td width="10%" align="center"><b>Kemaskini</b></td>
                                <td width="10%" align="center"><b>Hapus</b></td>
                            </tr>
                            @for ($j = 0; $j < $rsmd[$i]->count(); $j++)
                            @php
                            $menu_id = $rsmd[$i][$j]->menu_id;
                            $is_menu = 0; $is_add = 0; $is_upd = 0; $is_del = 0;
                            if(!empty($rs_data[$i][$j])){
                                $is_menu = 1;
                                $menu_uid = $rs_data[$i][$j]->menu_uid;
                                $is_add = $rs_data[$i][$j]->is_add;
                                $is_upd = $rs_data[$i][$j]->is_upd;
                                $is_del = $rs_data[$i][$j]->is_del;
                            } else {
                                $is_menu = 0; $is_add = 0; $is_upd = 0; $is_del = 0; $menu_uid='';
                            }
                            @endphp
                            <tr>
                                <td align="right">&raquo;&nbsp;<input type="checkbox" id="{{ $menu_id }}" name="is_menu[{{ $bil }}]" @if($is_menu == 1) checked @endif onchange="do_save({{ $menu_id }},'M')">&nbsp;
                                <input type="hidden" name="menu_uid[{{ $bil }}]" value="{{ $menu_uid }}">
                                <input type="hidden" name="menu_id[{{ $bil }}]" value="{{ $menu_id }}">
                                </td>
                                <td align="left">{{ $rsmd[$i][$j]->menu_name }}</td>
                                <td align="center"><input type="checkbox" name="is_add[{{ $bil }}]" value="1" @if($is_add == 1) checked @endif onchange="do_save({{ $menu_id }},'A')"></td>
                                <td align="center"><input type="checkbox" name="is_upd[{{ $bil }}]" value="1" @if($is_upd == 1) checked @endif onchange="do_save({{ $menu_id }},'U')"></td>
                                <td align="center"><input type="checkbox" name="is_del[{{ $bil }}]" value="1" @if($is_del == 1) checked @endif onchange="do_save({{ $menu_id }},'D')"></td>
                            </tr>
                            @php $bil++; @endphp
                            @endfor
                        @endfor
                    </table>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12"><div align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><i class="fa fa-spinner"></i> Kembali</button>
                    <input type="hidden" name="id_kakitangan" value="{{ $rs->id_kakitangan }}">
                </div>
            </div>
        </div>
    </div>
</section>
</div>
