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
Route::get('/notfound', 'PagesController@notfound');

Route::get('/', 'PagesController@index')->name('home');
Route::get('/pengaduan', 'PagesController@pengaduan')->name('pengaduan');
Route::get('/statistik', 'PagesController@statistik')->name('statistik');
Route::get('/proyek', 'PagesController@proyekindex')->name('proyek.index');
Route::get('/proyek/{tahun}/{satker}/{sumber}/{jenispengadaan}/{metode}', 'PagesController@proyek')->name('proyek.rup');

Route::get('/proyek/tender', 'PagesController@tenderindex')->name('proyek.tender.index');
Route::get('/proyek/tender/{tahun}/{satker}/{sumber}/{jenispengadaan}/{tahap}', 'PagesController@tender')->name('proyek.tender');
Route::post('/proyek', 'PagesController@cari')->name('proyek.rup.cari');
Route::post('/proyek/tender', 'PagesController@caritender')->name('proyek.tender.cari');
Route::post('/proyek/aspirasi', 'PagesController@aspirasi')->name('aspirasi');
// Route::get('/penyedia', 'PagesController@penyedia');

Route::get('/proyek/perencanaan/{tahun}/{ocid}', 'PagesController@perencanaan')->name('proyek.perencanaan');
Route::get('/proyek/pengumuman/{tahun}/{ocid}', 'PagesController@pengumuman')->name('proyek.pengumuman');
Route::get('/proyek/kontrak/{tahun}/{ocid}', 'PagesController@kontrak')->name('proyek.kontrak');
Route::get('/proyek/implementasi/{tahun}/{ocid}', 'PagesController@implementasi')->name('proyek.implementasi');
Route::get('/proyek/analisis/{tahun}/{ocid}', 'PagesController@analisis')->name('proyek.implementasi');

Route::get('/proyek/penyedia', 'PagesController@penyediaindex')->name('proyek.penyedia.redirect');
Route::get('/proyek/penyedia/{tahun}', 'PagesController@penyedia')->name('proyek.penyedia.index');
Route::get('/proyek/penyedia/ikutlelang/{tahun}/{npwp}', 'PagesController@ikutlelang')->name('proyek.penyedia.ikutlelang');
Route::get('/proyek/penyedia/menang/{tahun}/{npwp}', 'PagesController@menang')->name('proyek.penyedia.menang');
Route::get('/proyek/penyedia/kontrak/{tahun}/{npwp}', 'PagesController@kontrakpenyedia')->name('proyek.penyedia.kontrak');


Auth::routes(['verify' => true]);
Route::get('/logout', 'HomeController@logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::namespace('admin')->prefix('admin')->name('admin.')->middleware('auth', 'can:role-admin')->group(function(){
	Route::get('/dashboard', 'AdminController@index')->name('dashboard.index');
	
	Route::resource('/rup', 'RupController', ['except' => ['show', 'edit', 'create']]);
	Route::get('/rup/{tahun}', 'RupController@tahun')->name('rup.tahun');
	Route::get('/rup/proses/{tahun}', 'RupController@proses')->name('rup.proses');
	Route::post('/rup/proses/{tahun}', 'RupController@prosesrup')->name('rup.prosesrup');
	Route::get('/rup/import/{tahun}', 'RupController@import')->name('rup.import');
	Route::post('/rup/import', 'RupController@importdata')->name('rup.importdata');
	Route::get('/rup/export/{tahun}', 'RupController@export')->name('rup.export');
	Route::get('/rup/{tahun}/create', 'RupController@create')->name('rup.create');
	Route::get('/rup/{tahun}/{id}', 'RupController@show')->name('rup.show');
	Route::get('/rup/{tahun}/{id}/edit', 'RupController@edit')->name('rup.edit');
	
	Route::resource('/tender', 'TenderController', ['except' => ['show', 'edit', 'create']]);
	Route::get('/tender/{tahun}', 'TenderController@tahun')->name('tender.tahun');
	Route::get('/tender/import/{tahun}', 'TenderController@import')->name('tender.import');
	Route::post('/tender/import', 'TenderController@importdata')->name('tender.importdata');
	Route::get('/tender/export/{tahun}', 'TenderController@export')->name('tender.export');
	Route::get('/tender/sync/{tahun}', 'TenderController@synctender')->name('tender.sync');
	Route::get('/tender/{tahun}/create', 'TenderController@create')->name('tender.create');
	Route::get('/tender/{tahun}/{id}', 'TenderController@show')->name('tender.show');
	Route::get('/tender/{tahun}/{id}/edit', 'TenderController@edit')->name('tender.edit');

	Route::resource('/nontender', 'NonTenderController', ['except' => ['show', 'edit', 'create']]);
	Route::get('/nontender/{tahun}', 'NonTenderController@tahun')->name('nontender.tahun');
	Route::get('/nontender/import/{tahun}', 'NonTenderController@import')->name('nontender.import');
	Route::post('/nontender/import', 'NonTenderController@importdata')->name('nontender.importdata');
	Route::get('/nontender/export/{tahun}', 'NonTenderController@export')->name('nontender.export');
	Route::get('/nontender/sync/{tahun}', 'NonTenderController@synctender')->name('nontender.sync');

	Route::resource('/peserta', 'PesertaController', ['except' => ['show', 'edit', 'create']]);
	Route::get('/peserta/{tahun}', 'PesertaController@tahun')->name('peserta.tahun');
	Route::get('/peserta/import/{tahun}', 'PesertaController@import')->name('peserta.import');
	Route::post('/peserta/import', 'PesertaController@importdata')->name('peserta.importdata');
	Route::get('/peserta/export/{tahun}', 'PesertaController@export')->name('peserta.export');
	Route::get('/peserta/sync/{tahun}', 'PesertaController@synctender')->name('peserta.sync');

	Route::resource('/progress', 'ProgressController', ['except' => ['store', 'create', 'show', 'edit', 'update']]);
	Route::get('/progress/{tahun}', 'ProgressController@tahun')->name('progress.tahun');
	Route::get('/progress/{tahun}/{id}', 'ProgressController@show')->name('progress.show');
	Route::post('/progress', 'ProgressController@store')->name('progress.store');

	Route::resource('/aspirasi', 'AspirasiController');

	Route::resource('/pra', 'PotensiKorupsisController', ['except' => ['store', 'create', 'show', 'edit', 'update']]);
	Route::get('/pra/{tahun}', 'PotensiKorupsisController@tahun')->name('pra.tahun');
	Route::get('/pra/{tahun}/{id}', 'PotensiKorupsisController@show')->name('pra.show');
	Route::post('/pra', 'PotensiKorupsisController@store')->name('pra.store');
	Route::get('/pra/sync/data/{tahun}', 'PotensiKorupsisController@sync')->name('pra.sync');

	Route::get('/profile/edit', 'ProfileController@index')->name('profile.edit');
	Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

	Route::resource('/users', 'UsersController');
});

Route::namespace('adminsuper')->prefix('adminsuper')->name('adminsuper.')->middleware('auth', 'can:role-adminsuper')->group(function(){
	Route::get('/dashboard', 'AdminSuperController@index')->name('dashboard.index');
});

Route::namespace('user')->prefix('user')->name('user.')->middleware('auth', 'can:role-user')->group(function(){
	Route::get('/dashboard', 'UserController@index')->name('dashboard.index');
});

Route::namespace('relawan')->prefix('relawan')->name('relawan.')->middleware('auth', 'can:role-relawan')->group(function(){
	Route::get('/dashboard', 'RelawanController@index')->name('dashboard.index');
});


