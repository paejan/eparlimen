@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_back()
{
  window.location = '/rujukan'
}
</script>
<div class="row">
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        <!-- PROFILE -->
        <div class="active tab-pane" id="profile">
          <div class="box box-info">
            <div class="box-header with-border">
              <div class="box-header with-border">
                <h3 class="box-title"><b> Maklumat Dokumen Rujukan</b></h3><br />
              </div>
              <!-- /.box-header -->
							<input type="hidden" name="doc_id" value="{{ $doc->doc_id }}" />
						</div>
            <div class="box-body">
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen_tajuk"><b>Nama Dokumen :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{{ $doc->dokumen_tajuk }}</div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="dokumen"><b>Maklumat Dokuman :</b></label>
                <div id="editors" class="col-md-10 col-sm-12 col-xs-12">{!! nl2br($doc->dokumen) !!}</div>
              </div>
              
              @if(!$attach->isEmpty())
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="fldnorujukan"><b>Dokumen Rujukan :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <tr bgcolor="#CCCCCC" align="center">
                        <td width="5%">Bil</td>
                        <td width="40%">Tajuk</td>
                        <td width="40%">Nama Dokumen</td>
                        <td width="10%">Jenis</td>
                      </tr>
                      @php $bil = 0 @endphp
                      @foreach($attach as $a)
                      <tr bgcolor="#FFFFFF" style="padding:10px">
                        <td width="5%" align="right">{{ ++$bil }}.&nbsp;</td>
                        <td width="40%">{{ $a->file_tajuk }}</td>
                        <td width="40%"><a href="/rujukan/{{ $a->file_name }}" target="_blank">{{ $a->file_name }}</a></td>
                        <td width="10%" align="center">{{ $a->file_type }}</td>
                      </tr>
                      @endforeach
                    </table>                                
                  </div>
                </div>
              </div>
              @endif

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-sm-8">
                  <button type="button" class="btn btn-default" onclick="do_back()"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
              </div>
					  </div>
				  </div>
        </div>
		  </div>
    </div>        
  </div>
</div>

@endsection