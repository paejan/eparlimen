@extends('components.page')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>Paparan Utama Soalan Parlimen</b> </h2>
                <div class="clearfix"></div>
            </div>

            <!-- MULA BARIS PERTAMA -->
            <div class="clearfix"></div>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-primary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa fa-comments-o"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Soalan Dewan Rakyat</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $dewanRakyat->count() }}<br>Soalan</strong>
                                                <!--<span class="text-primary">(14 unread)</span>-->
                                            </div>
                                        </div>
                                        @if(Auth::user()->type == 'A' || Auth::user()->type == 'U')
                                        <div class="summary-footer">
                                            <a href="soalan/daftar?lj_tanya=&lj_dewan=1&ljid_sidang=&lj_kategori=&lj_status=&l_cari=" class="text-muted text-uppercase">Papar Maklumat</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-secondary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fa fa-comment"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Soalan Dewan Negara</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $dewanNegara->count() }}<br>Soalan</strong>
                                            </div>
                                        </div>
                                        @if(Auth::user()->type == 'A' || Auth::user()->type == 'U')
                                        <div class="summary-footer">
                                            <a href="soalan/daftar?lj_tanya=&lj_dewan=2&ljid_sidang=&lj_kategori=&lj_status=&l_cari=" 
                                            class="text-muted text-uppercase">Paparan Terperinci</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-tertiary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-tertiary">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Jumlah Soalan</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $jumlah }}<br>Soalan</strong>
                                            </div>
                                        </div>
                                        @if(Auth::user()->type == 'A' || Auth::user()->type == 'U')
                                        <div class="summary-footer">
                                            <a href="/soalan/daftar" class="text-muted text-uppercase">Papar Maklumat</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- AKHIR BARIS PERTAMA -->
			
            <!-- MULA BARIS KEDUA -->
            <div class="clearfix"></div>
			<h2><b>Statistik Agihan Soalan</b> </h2>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-primary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa fa-comments-o"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Belum Diagihkan</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $belumAgih->count() }}<br>Soalan</strong>
                                            </div>
                                        </div>
                                        @if(Auth::user()->type == 'A' || Auth::user()->type == 'U')
                                        <div class="summary-footer">
                                            <a href="soalan/daftar?lj_tanya=&lj_dewan=&ljid_sidang=&lj_kategori=&lj_status=9&l_cari=" class="text-muted text-uppercase">(Papar Maklumat)</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-secondary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fa fa-comment"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Belum Dijawab</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $belumJawab->count() }}<br>Soalan</strong>
                                            </div>
                                        </div>
                                        @if(Auth::user()->type == 'A' || Auth::user()->type == 'U')
                                        <div class="summary-footer">
                                            <a href="soalan/jawapan" class="text-muted text-uppercase">(Papar Maklumat)</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-tertiary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-tertiary">
                                            <i class="fa fa-comments"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Telah Dijawab</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $telahJawab->count() }}<br>Soalan</strong>
                                            </div>
                                        </div>
                                        @if(Auth::user()->type == 'A' || Auth::user()->type == 'U')
                                        <div class="summary-footer">
                                            <a href="soalan/daftar?lj_tanya=&lj_dewan=&ljid_sidang=&lj_kategori=&lj_status=2&l_cari=" class="text-muted text-uppercase">(Papar Maklumat)</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- AKHIR BARIS KEDUA -->
        </div>
    </div>
</div>
@if(Auth::user()->type == 'A' || Auth::user()->type == 'U' || Auth::user()->type == 'B')
	<hr />
	@include('dashboard.bahagian')                        
@endif
@endsection