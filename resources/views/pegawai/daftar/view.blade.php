@include('components.dateformat')
<script language="javascript">
function do_close(){
	reload = window.location; 
	window.location = reload;
}
</script>
<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00ced1 43%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Pegawai Bertugas</b></font></h6>
        </header>
        <div class="panel-body">
            <input type="hidden" name="jad_id" value="{{ $rsData->jad_id }}">

            <div class="col-md-12">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><strong>Tarikh Bertugas : </strong></label>
                        <div class="col-sm-9">{{ DisplayDate($rsData->jad_tkh) }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><strong>Dewan Persidangan : </strong></label>
                        <div class="col-sm-9">{{ $rsData->sidang->dewan->dewan }}</div>
                    </div>
                </div>

                @if(!empty($rsData->urusetia))
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><strong>Urusetia : </strong></label>
                        <div class="col-sm-9">
                            <div class="row">
                                <label class="col-sm-2 control-label">Nama : </label>
                                <label class="col-sm-10 control-label">{{ $urusetia->nama_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Bahagian : </label>
                                <label class="col-sm-10 control-label">{{ $urusetia->nama_bahagian }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Jawatan : </label>
                                <label class="col-sm-10 control-label">{{ $urusetia->jawatan_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Emel : </label>
                                <label class="col-sm-10 control-label">{{ $urusetia->email }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">No Tel & H/P : </label>
                                <label class="col-sm-10 control-label">{{ $urusetia->no_telefon }} / {{ $urusetia->no_hp }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($rsData->pegawai1))
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><strong>Pegawai 1 : </strong></label>
                        <div class="col-sm-9">
                            <div class="row">
                                <label class="col-sm-2 control-label">Nama : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai1->nama_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Bahagian : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai1->nama_bahagian }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Jawatan : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai1->jawatan_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Emel : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai1->email }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">No Tel & H/P : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai1->no_telefon }} / {{ $pegawai1->no_hp }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @if (!empty($rsData->pegawai2))
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><strong>Pegawai 2 : </strong></label>
                        <div class="col-sm-9">
                            <div class="row">
                                <label class="col-sm-2 control-label">Nama : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai2->nama_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Bahagian : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai2->nama_bahagian }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Jawatan : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai2->jawatan_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Emel : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai2->email }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">No Tel & H/P : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai2->no_telefon }} / {{ $pegawai2->no_hp }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if (!empty($rsData->pegawai3))
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><strong>Pegawai 3 : </strong></label>
                        <div class="col-sm-9">
                            <div class="row">
                                <label class="col-sm-2 control-label">Nama : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai3->nama_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Bahagian : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai3->nama_bahagian }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Jawatan : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai3->jawatan_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Emel : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai3->email }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">No Tel & H/P : </label>
                                <label class="col-sm-10 control-label">{{ $pegawai3->no_telefon }} / {{ $pegawai3->no_hp }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @if (!empty($rsData->pemandu))
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><strong>Pemandu : </strong></label>
                        <div class="col-sm-9">
                            <div class="row">
                                <label class="col-sm-2 control-label">Nama : </label>
                                <label class="col-sm-10 control-label">{{ $pemandu->nama_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Bahagian : </label>
                                <label class="col-sm-10 control-label">{{ $pemandu->nama_bahagian }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Jawatan : </label>
                                <label class="col-sm-10 control-label">{{ $pemandu->jawatan_kakitangan }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">Emel : </label>
                                <label class="col-sm-10 control-label">{{ $pemandu->email }}</label>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 control-label">No Tel & H/P : </label>
                                <label class="col-sm-10 control-label">{{ $pemandu->no_telefon }} / {{ $pemandu->no_hp }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div> 