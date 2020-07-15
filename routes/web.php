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
Route::get('/tender', 'PagesController@tender');
// Route::get('/penyedia', 'PagesController@penyedia');

Route::get('/proyek/perencanaan/{tahun}/{ocid}', 'PagesController@perencanaan');
Route::get('/proyek/pengumuman/{tahun}/{ocid}', 'PagesController@pengumuman');
Route::get('/proyek/kontrak/{tahun}/{ocid}', 'PagesController@kontrak');
Route::get('/proyek/implementasi/{tahun}/{ocid}', 'PagesController@implementasi');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
