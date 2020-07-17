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
Route::get('/proyek/tender', 'PagesController@tender');
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
});

Route::namespace('adminsuper')->prefix('adminsuper')->name('adminsuper.')->middleware('auth', 'can:role-admin_super')->group(function(){
	Route::get('/dashboard', 'AdminSuperController@index')->name('dashboard.index');
});

