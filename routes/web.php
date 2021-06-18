<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Index View
Route::get('/', 'LoginController@index')->name('index');
Route::post('/auth', 'LoginController@auth');

//User Menu
Route::get('/profile', 'UserController@profile');
Route::get('/password', 'UserController@password');
Route::post('/user_store', 'UserController@store');

//Dashboard View
Route::get('/dashboard', 'DashboardController@index')->name('home');
Route::get('/logout', 'DashboardController@logout');

//Soalan & Jawapan
Route::group(['prefix' => 'soalan'], function () {
    //Daftar Dewan
    Route::get('/daftar_form_dr', 'Soalan\DewanController@rakyat')->name('soalan/daftar_form_dr');
    Route::get('/daftar_form_dn', 'Soalan\DewanController@negara')->name('soalan/daftar_form_dn');
    Route::get('/daftar_form/{id}', 'Soalan\DewanController@search');
    Route::post('/daftar_form/store', 'Soalan\DewanController@store');
    Route::post('/daftar_form/delete/{id}', 'Soalan\DewanController@delete');

    //Daftar Perbahasan
    Route::get('/daftar_form_bhs', 'Soalan\PerbahasanController@index')->name('soalan/daftar_form_bhs');
    Route::get('/daftar_form_bhs/sidang/{id}', 'Soalan\PerbahasanController@lookup');
    Route::get('/daftar_form_bhs/{id}', 'Soalan\PerbahasanController@search');
    Route::post('/daftar_form_bhs/store', 'Soalan\PerbahasanController@store');
    Route::post('/daftar_form_bhs/delete/{id}', 'Soalan\PerbahasanController@delete');

    //Senarai Soalan
    Route::get('/daftar', "Soalan\SenaraiController@index")->name('soalan/daftar');
    Route::get('/daftar/edit/{id}{dewan}', "Soalan\SenaraiController@edit")->name('soalan/daftar');
    Route::post('/daftar/agih/{id}', "Soalan\SenaraiController@agih");
    Route::get('/daftar/cetak/{id}', "Soalan\SenaraiController@cetak");

    //Backlog
    Route::get('/daftar_backlog', 'Soalan\BacklogController@index')->name('soalan/daftar_backlog');
    Route::get('/daftar_backlog/form', 'Soalan\BacklogController@form')->name('soalan/daftar_backlog');
    Route::get('/daftar_backlog/search', 'Soalan\BacklogController@search');
    Route::get('/daftar_backlog/lookup', 'Soalan\BacklogController@lookup');
    Route::post('/daftar_backlog/store', 'Soalan\BacklogController@store');

    // Kemasukkan Jawapan
    Route::get('/jawapan', 'Jawapan\JawapanController@index')->name('jawapan/jawapan');
    Route::post('/jawapan/serah/{id}', 'Jawapan\JawapanController@serah');
    Route::get('/jawapan/cetak/{id}', 'Jawapan\JawapanController@cetak');
    Route::get('/jawapan/form/{id}', 'Jawapan\JawapanController@form')->name('jawapan/jawapan');
    Route::get('/jawapan/list', 'Jawapan\JawapanController@list');
    Route::post('/jawapan/list_store', 'Jawapan\JawapanController@list_store');
    Route::post('/jawapan/email', 'Jawapan\JawapanController@input_email');
    Route::post('/jawapan/form/store', 'Jawapan\JawapanController@store');
    Route::post('/jawapan/form/serah', 'Jawapan\JawapanController@serahform');
    Route::get('/jawapan/doc/{id}', 'Jawapan\JawapanController@doc');
    Route::post('/jawapan/upload/{id}/{tajuk}', 'Jawapan\JawapanController@upload');
    Route::post('/jawapan/delete/{id}', 'Jawapan\JawapanController@delete');
    Route::get('/jawapan/view/{file}', 'Jawapan\JawapanController@view');

    //Senarai Jawapan
    Route::get('/jawapan_senarai', 'Jawapan\SenaraiController@index')->name('jawapan/jawapan_senarai');
    Route::get('/jawapan_senarai/cetak/{id}', 'Jawapan\SenaraiController@cetak');
    Route::get('/jawapan_senarai/edit/{id}', 'Jawapan\SenaraiController@edit')->name('jawapan/jawapan_senarai');
    Route::post('/jawapan_senarai/store/{type}', 'Jawapan\SenaraiController@store');

    //Jawapan Input
    Route::get('/jawapan_input', 'Jawapan\InputController@index')->name('jawapan/jawapan_input');
    Route::get('/jawapan_input/form/{id}', 'Jawapan\InputController@form')->name('jawapan/jawapan_input');
    Route::post('/jawapan_input/form/store', 'Jawapan\InputController@store');
    Route::post('/jawapan_input/form/serah', 'Jawapan\InputController@serah');

    //Semakan Jawapan
    Route::get('/jawapan_semakan', 'Jawapan\SemakanController@index')->name('jawapan/jawapan_semakan');
    Route::get('/jawapan_semakan/cetak/{id}', 'Jawapan\SemakanController@cetak');
    Route::get('/jawapan_semakan/edit/{id}', 'Jawapan\SemakanController@edit')->name('jawapan/jawapan_semakan');
    Route::post('/jawapan_semakan/store/{type}', 'Jawapan\SemakanController@store');

    //Pengesahan Jawapan
    Route::get('/jawapan_kelulusan', 'Jawapan\PengesahanController@index')->name('jawapan/jawapan_kelulusan');
    Route::get('/jawapan_kelulusan/cetak/{id}', 'Jawapan\PengesahanController@cetak');
    Route::get('/jawapan_kelulusan/edit/{id}', 'Jawapan\PengesahanController@edit')->name('jawapan/jawapan_kelulusan');
    Route::post('/jawapan_kelulusan/store/{type}', 'Jawapan\PengesahanController@store');
});

Route::group(['prefix' => 'peg_bertugas'], function () {
    //Daftar Pegawai Bertugas
    Route::get('/cal_view', 'Pegawai\PegawaiController@index')->name('peg_bertugas/cal_view');
    Route::get('/cal_view/add_pegawai/{id}', 'Pegawai\PegawaiController@add');
    Route::get('/cal_view/add_pegawai_form/{id}', 'Pegawai\PegawaiController@add_form')->name('peg_bertugas/cal_view');
    Route::get('/cal_view/cari/{id}', 'Pegawai\PegawaiController@cari');
    Route::get('/cal_view/carian', 'Pegawai\PegawaiController@carian');
    Route::get('/cal_view/pilihan', 'Pegawai\PegawaiController@pilihan');
    Route::get('/cal_view/info', 'Pegawai\PegawaiController@info');
    Route::post('/cal_view/info/update', 'Pegawai\PegawaiController@info_update');
    Route::post('/cal_view/update', 'Pegawai\PegawaiController@update');
    Route::post('/cal_view/email', 'Pegawai\PegawaiController@email');

    //Laporan Pegawai Bertugas
    Route::get('/laporan', 'Pegawai\LaporanController@index')->name('peg_bertugas/laporan');
    Route::get('/laporan/create/{id}', 'Pegawai\LaporanController@create')->name('peg_bertugas/laporan');
    Route::post('/laporan/update', 'Pegawai\LaporanController@update');
    Route::get('/laporan/lampiran1', 'Pegawai\LaporanController@lampiran1');
    Route::get('/laporan/lampiran2', 'Pegawai\LaporanController@lampiran2');
    Route::post('/laporan/lampiran_update', 'Pegawai\LaporanController@lampiran_update');
    Route::post('/laporan/lampiran_delete', 'Pegawai\LaporanController@lampiran_delete');

    //Senarai Laporan Bertugas
    Route::get('/senarai_laporan_peg', 'Pegawai\LaporanController@list')->name('peg_bertugas/senarai_laporan_peg');
    Route::get('/senarai_laporan_peg/view/{id}', 'Pegawai\LaporanController@view')->name('peg_bertugas/senarai_laporan_peg');

    Route::get('/cetak/{id}', 'Pegawai\LaporanController@cetak');

    //Senarai Pegawai Bertugas
    Route::get('/senarai', 'Pegawai\PegawaiController@list')->name('peg_bertugas/senarai');
    Route::get('/senarai/view/{id}', 'Pegawai\PegawaiController@view')->name('peg_bertugas/senarai');

    //Cetak Jadual Pegawai Bertugas
    Route::get('/cetak_peg', 'Pegawai\CetakanController@index')->name('peg_bertugas/cetak_peg');
    Route::get('/cetak_peg/view', 'Pegawai\CetakanController@view');
});

//Utiliti
Route::group(['prefix' => 'utiliti'], function () {
    // Dokumen Rujukan
    Route::get('/doc_rujukan', 'Utiliti\DokumenController@index')->name('utiliti/doc_rujukan');
    Route::get('/doc_rujukan/create', 'Utiliti\DokumenController@create')->name('utiliti/doc_rujukan');
    Route::post('/doc_rujukan', 'Utiliti\DokumenController@store');
    Route::get('/doc_rujukan/edit/{id}', 'Utiliti\DokumenController@edit')->name('utiliti/doc_rujukan');
    Route::post('/doc_rujukan/upload/{id}/{title}', 'Utiliti\DokumenController@upload');
    Route::get('/doc_rujukan/download/{file}', 'Utiliti\DokumenController@download');
    Route::post('/doc_rujukan/delete/{id}', 'Utiliti\DokumenController@delete');

    // Handset
    Route::get('/handset', 'Utiliti\HandsetController@index')->name('utiliti/handset');
    Route::get('/handset/create', 'Utiliti\HandsetController@create')->name('utiliti/handset');
    Route::post('/handset', 'Utiliti\HandsetController@store');
    Route::get('/handset/edit/{id}', 'Utiliti\HandsetController@edit')->name('utiliti/handset');
    Route::get('/handset/download/{file}', 'Utiliti\HandsetController@download');
    Route::post('/handset/delete/{id}', 'Utiliti\HandsetController@delete');

    //Daftar kakitangan
    Route::get('/kakitangan', 'Utiliti\KakitanganController@index')->name('utiliti/kakitangan');
    Route::get('/kakitangan/form', 'Utiliti\KakitanganController@form');
    Route::post('/kakitangan/store', 'Utiliti\KakitanganController@store');
    Route::get('/kakitangan/menus', 'Utiliti\KakitanganController@menus');
    Route::post('/kakitangan/menu_store', 'Utiliti\KakitanganController@menu_store');
    Route::post('/kakitangan/reset/{id}', 'Utiliti\KakitanganController@reset');
    Route::post('/kakitangan/delete/{id}', 'Utiliti\KakitanganController@delete');
    // Senarai Kakitangan Tidak Aktif
    Route::get('/kakitangan_ta', 'Utiliti\KakitanganController@unactive')->name('utiliti/kakitangan_ta');

    //Daftar Ahli Dewan
    Route::get('/ap', 'Utiliti\AhliParlimenController@rakyat')->name('utiliti/ap');
    Route::get('/adewan', 'Utiliti\AhliParlimenController@negara')->name('utiliti/adewan');
    Route::get('/ahli/form', 'Utiliti\AhliParlimenController@form');
    Route::post('/ahli', 'Utiliti\AhliParlimenController@store');
    Route::post('/ahli/delete/{id}', 'Utiliti\AhliParlimenController@delete');
    //Senarai Ahli Dewan Tidak Aktif
    Route::get('/ap_ta', 'Utiliti\AhliParlimenController@unactive')->name('utiliti/ap_ta');

    // Senarai Kategori
    Route::get('/kategori', 'Utiliti\KategoriController@index')->name('utiliti/kategori');
    Route::get('/sub_kategori', 'Utiliti\KategoriController@subindex')->name('utiliti/sub_kategori');
    Route::get('/kategori/form', 'Utiliti\KategoriController@form');
    Route::post('/kategori', 'Utiliti\KategoriController@store');

    // Senarai Bahagian
    Route::get('/bahagian', 'Utiliti\BahagianController@index')->name('utiliti/bahagian');
    Route::get('/bahagian/form', 'Utiliti\BahagianController@form');
    Route::post('/bahagian', 'Utiliti\BahagianController@store');

    //Daftar Maklumat Persidangan
    Route::get('/sidang', 'Utiliti\SidangController@index')->name('utiliti/sidang');
    Route::get('/sidang/form', 'Utiliti\SidangController@form');
    Route::post('/sidang/store', 'Utiliti\SidangController@store');
    Route::post('/sidang/delete/{id}', 'Utiliti\SidangController@delete');
});

//Laporan
Route::group(['prefix' => 'laporan'], function () {
    //Laporan
    Route::get('laporan_pertanyaan', 'Laporan\LaporanController@index')->name('laporan/laporan_pertanyaan');
    Route::get('laporan_pertanyaan/{mula}/{tamat}/{dewan}/{sidang}', 'Laporan\LaporanController@view');
});

//Lain Lain
Route::group(['prefix' => 'pengulungan'], function () {
    //Pengulungan
    Route::get('/pg_senarai', 'Pengulungan\PengulunganController@index')->name('pengulungan/pg_senarai');
    Route::get('/pg_senarai/create', 'Pengulungan\PengulunganController@create')->name('pengulungan/pg_senarai');
    Route::get('/pg_senarai/edit/{id}', 'Pengulungan\PengulunganController@edit')->name('pengulungan/pg_senarai');
    Route::post('/pg_senarai/store', 'Pengulungan\PengulunganController@store');
    Route::post('/pg_senarai/delete/{id}', 'Pengulungan\PengulunganController@delete');
    Route::get('/pg_senarai/doc/{file}', 'Pengulungan\PengulunganController@doc');
});

//Rujukan
Route::get('/rujukan', 'RujukanController@index')->name('rujukan');
Route::get('/rujukan/view/{id}', 'RujukanController@view')->name('rujukan');
Route::get('/rujukan/cetak/{id}', 'RujukanController@cetak');
Route::get('/rujukan/{file}', 'RujukanController@download');

//Carian
Route::get('/carian', 'CarianController@index')->name('carian');
Route::get('/carian/view/{id}', 'CarianController@view');
