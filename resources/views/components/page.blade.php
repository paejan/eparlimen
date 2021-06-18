@extends('components.header')

@section('page')
<section class="content-body">
            <header class="page-header visible-lg" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(235,116,12,1) 0%, rgba(255,175,0,0.7651261188068977) 100%);">
                <h2 style="color:#000">Sistem e-Parlimen</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Sistem e-Parlimen</span></li>

                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>
            <header class="page-header" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(235,116,12,1) 0%, rgba(255,175,0,0.7651261188068977) 100%);">
                <h2 style="color:#000">Sistem e-Parlimen</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li style="color:#000">
                            <a href="/dashboard">
                                <i class="fa fa-home" style="color:#000"></i>
                            </a>
                        </li>

                        @php
                            $menu = '';
                            $sub_menu = '';

                            if(Request::is('dashboard*')){
                                $menu = '';
                            } else if(Request::is('soalan/daftar*')){
                                $menu = 'Soalan';
                                if(Request::is('soalan/daftar_form_dr')){
                                    $sub_menu = 'Daftar Soalan Dewan Rakyat';
                                } else if(Request::is('soalan/daftar_form_dn')){
                                    $sub_menu = 'Daftar Soalan Dewan Negara';
                                } else if(Request::is('soalan/daftar')){
                                    $sub_menu = 'Senarai Soalan';
                                } else if(Request::is('soalan/daftar_backlog*')){
                                    $sub_menu = 'Backlog';
                                } else if(Request::is('soalan/daftar_form_bhs*')){
                                    $sub_menu = 'Daftar Soalan Perbahasan';
                                }
                            } else if(Request::is('soalan/jawapan*')){
                                $menu = 'Jawapan';
                                if(Request::is('soalan/jawapan') || Request::is('soalan/jawapan/*')){
                                    $sub_menu = 'Kemasukan Jawapan';
                                } else if(Request::is('soalan/jawapan_senarai*')){
                                    $sub_menu = 'Senarai Jawapan';
                                } else if(Request::is('soalan/jawapan_input*')){
                                    $sub_menu = 'Jawapan Input';
                                } else if(Request::is('soalan/jawapan_semakan*')){
                                    $sub_menu = 'Semakan Jawapan';
                                } else if(Request::is('soalan/jawapan_kelulusan*')){
                                    $sub_menu = 'Pengesahan Jawapan';
                                }
                            } else if(Request::is('peg_bertugas*')){
                                $menu = 'Pegawai Bertugas';
                                if(Request::is('peg_bertugas/cal_view')){
                                    $sub_menu = 'Daftar Pegawai Bertugas';
                                } else if(Request::is('peg_bertugas/laporan')){
                                    $sub_menu = 'Laporan Pegawai Bertugas';
                                } else if(Request::is('peg_bertugas/senarai_laporan_peg')){
                                    $sub_menu = 'Senarai Laporan Bertugas';
                                } else if(Request::is('peg_bertugas/senarai')){
                                    $sub_menu = 'Senarai Pegawai Bertugas';
                                } else if(Request::is('peg_bertugas/cetak_peg')){
                                    $sub_menu = 'Cetak Jadual Pegawai Bertugas';
                                }
                            } else if(Request::is('utiliti*')){
                                $menu = 'Utiliti';
                                if(Request::is('utiliti/doc_rujukan')){
                                    $sub_menu = 'Dokumen Rujukan';
                                } else if(Request::is('utiliti/kakitangan')){
                                    $sub_menu = 'Daftar Kakitangan';
                                } else if(Request::is('utiliti/ap')){
                                    $sub_menu = 'Daftar Ahli Dewan Rakyat';
                                } else if(Request::is('utiliti/adewan')){
                                    $sub_menu = 'Daftar Ahli Dewan Negara';
                                } else if(Request::is('utiliti/kategori')){
                                    $sub_menu = 'Daftar Kategori';
                                } else if(Request::is('utiliti/sub_kategori')){
                                    $sub_menu = 'Daftar Sub-Kategori';
                                } else if(Request::is('utiliti/bahagian')){
                                    $sub_menu = 'Senarai Bahagian';
                                } else if(Request::is('utiliti/sidang')){
                                    $sub_menu = 'Daftar Maklumat Persidangan';
                                } else if(Request::is('utiliti/pro_update')){
                                    $sub_menu = '';
                                } else if(Request::is('utiliti/kakitangan_ta')){
                                    $sub_menu = 'Daftar Kakitangan Tidak Aktif  ';
                                } else if(Request::is('utiliti/ap_ta')){
                                    $sub_menu = 'Daftar Ahli Dewan Rakyat Tidak Aktif';
                                } else if(Request::is('utiliti/handset*')){
                                    $sub_menu = 'Handset';
                                }
                            } else if(Request::is('laporan*')){
                                $menu = 'Laporan';
                                $sub_menu = 'Laporan';
                            } else if(Request::is('pengulungan*')){
                                $menu = 'Lain Lain';
                                $sub_menu = 'Pengulungan Perbahasan';
                            } else if(Request::is('rujukan*')){
                                $menu = 'Rujukan';
                                $sub_menu = 'Rujukan';
                            }  else if(Request::is('carian*')){
                                $menu = 'Carian';
                                $sub_menu = 'Maklumat Carian';
                            }
                        @endphp
                        <li style="color:#000"><span style="color:#000"><b>e-Parlimen @if(!empty($menu))/ {{ $menu }} / {{ $sub_menu }} @endif&nbsp;</b></span></li>

                    </ol>
                </div>
            </header>

			<!-- PAPARAN MENU BAGI MAKLUMAT PERMOHONAN -->

			<div class="row" style="margin-top: -20px">
                @yield('content')
            </div>
        </section>

        <div class="bs-example">
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg static">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
