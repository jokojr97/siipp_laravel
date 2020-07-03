<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	return view('pages.home');
    }
    public function pengaduan(){
    	return view('pages.pengaduan');	
    }
    public function statistik(){
    	return view('pages.statistik');	
    }
}
