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

Route::get('/', 'PagesController@index');
Route::get('/pengaduan', 'PagesController@pengaduan');
Route::get('/statistik', 'PagesController@statistik');
Route::get('/proyek', 'PagesController@proyek');
Route::post('/proyek', 'PagesController@cari');
Route::get('/proyek/tender', 'PagesController@tender');
Route::post('/proyek/tender', 'PagesController@caritender');
Route::post('/proyek/aspirasi', 'PagesController@aspirasi');
// Route::get('/penyedia', 'PagesController@penyedia');

Route::get('/proyek/perencanaan/{tahun}/{ocid}', 'PagesController@perencanaan');
Route::get('/proyek/pengumuman/{tahun}/{ocid}', 'PagesController@pengumuman');
Route::get('/proyek/kontrak/{tahun}/{ocid}', 'PagesController@kontrak');
Route::get('/proyek/implementasi/{tahun}/{ocid}', 'PagesController@implementasi');

Auth::routes(['verify' => true]);
Route::get('/logout', 'HomeController@logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::namespace('admin')->prefix('admin')->name('admin.')->middleware('auth', 'can:role-admin')->group(function(){
	Route::get('/dashboard', 'AdminController@index')->name('dashboard.index');
	Route::get('/progress', 'ProgressController@index')->name('progress');
	Route::resource('/rup', 'RupController', ['except' => ['show', 'edit', 'create']]);
	Route::get('/rup/{tahun}', 'RupController@tahun')->name('rup.tahun');
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
});

Route::namespace('adminsuper')->prefix('adminsuper')->name('adminsuper.')->middleware('auth', 'can:role-admin_super')->group(function(){
	Route::get('/dashboard', 'AdminSuperController@index')->name('dashboard.index');
});

