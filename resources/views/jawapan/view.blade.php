            <div class="box-header with-border">
              <div class="box-header with-border">
                <h3 class="box-title"><b> {{ $title }} [ No. Soalan : {{ $soalan->no_soalan }}]</b></h3><br />
              </div>                    <!-- /.box-header -->
            </div>
            <div class="box-body">
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh Soalan Dikemukakan :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">{{ date('d/m/Y', strtotime($soalan->tkh_soalan)) }}</div>
                <label class="control-label col-md-3 col-xs-12" for="dokumen_tajuk">&nbsp;</label>
                <label class="control-label col-md-2 col-xs-12" for="no_soalan"><b>Tarikh Jawapan :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  @if(!empty($soalan->tkh_jwb_parlimen))<b>{{ date('d/m/Y', strtotime($soalan->tkh_jwb_parlimen)) }}</b> @else ?? @endif
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Jenis Pertanyaan :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  {{ $soalan->tanya->pertanyaan }}
                  @if(!empty($soalan->j_tanya_det)) ({{ $soalan->j_tanya_det }}) @endif
                </div>
                <label class="control-label col-md-3 col-xs-12" for="dokumen_tajuk">&nbsp;</label>
                <label class="control-label col-md-2 col-xs-12" for="no_soalan"><b>Dewan :</b></label>
                <div class="col-md-2 col-sm-12 col-xs-12">{{ $soalan->dewan->dewan }}</div>
              </div>
              
              @php
              if($soalan->j_dewan == 1){
                $oleh = $ahli->nama_ap;
                $kawasan = $ahli->kod_kaw_ap." : ".$ahli->p_nama;
                $disp = "Parlimen";
              } else {
                $oleh = optional($ahli)->nama_ap;
                $kawasan = optional($ahli)->kawasan_ap;
                $disp = "Ahli Dewan";
              }
              @endphp

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Pertanyaan Oleh :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{{ $oleh }}</div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>{{ $disp }} :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{{ $kawasan }}</div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Kategori :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{{ $soalan->kategori->nama_kategori }}</div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Bahagian :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{{ $soalan->bahagian->nama_bahagian }}</div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Soalan :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{!! nl2br($soalan->soalan) !!}</div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Jawapan :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{!! $soalan->jawapan !!}</div>
              </div>
              <hr />
              
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Maklumat Tambahan :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{!! nl2br($soalan->maklumat_tambah) !!}</div>
              </div>

              @if(!$attach->isEmpty())
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b></b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <tr bgcolor="#CCCCCC" align="center">
                      <td width="5%">Bil</td>
                      <td width="40%">Tajuk</td>
                      <td width="40%">Nama Dokumen</td>
                      <td width="10%">Jenis</td>
                    </tr>
                    @php $bil = 0 @endphp
                    @foreach($attach as $doc)
                    <tr bgcolor="#FFFFFF">
                      <td width="5%" align="right">{{ ++$bil }}.&nbsp;</td>
                      <td width="40%">{{ $doc->file_tajuk }}</td>
                      <td width="40%"><a href="/soalan/jawapan/view/{{ $doc->file_name }}" target="_blank">{{ $doc->file_name }}</a></td>
                      <td width="10%" align="center">{{ $doc->file_type }}</td>
                    </tr>
                    @endforeach
                  </table>                                
                </div>
              </div>
              @endif

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="tkh_soalan"><b>Tarikh Jawapan di Parlimen :</b></label>
                <div class="col-md-10 col-sm-12 col-xs-12">{{ date('d/m/Y', strtotime($soalan->tkh_jwb_parlimen)) }}</div>
              </div>
              <hr />
