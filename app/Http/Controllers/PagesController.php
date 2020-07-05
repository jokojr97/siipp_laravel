<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Aspirasi;
use App\AspirasiLike;
use App\LpseMetode;
use App\LpseScrap;
use App\NonTenderScrap;
use App\PesertaLelang;
use App\Progress;
use App\Rup;
use App\Satker;


class PagesController extends Controller
{
    public function index(){
    	return view('pages.home');
    }
    public function pengaduan(){
    	$aspirasi = Aspirasi::where('aktif', 0)->orderBy('id', 'desc')->paginate(20);
    	return view('pages.pengaduan', ['aspirasi' => $aspirasi]);
    	// dd($aspirasi[7]->jumlah_komen(11));
    }
    public function statistik(){
        return view('pages.statistik'); 
    }
    public function proyek(){
        if (isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        }else {
            $tahun = 2020;
        }

        $rup = Rup::where('tahun', $tahun)->get();
        $data = array();
        $no = 0;
        foreach ($rup as $result) {
            $data[$no]['id_rup'] = $result->id_rup;
            $data[$no]['nama_paket'] = $result->nama_paket;
            $data[$no]['nama_satker'] = $result->satkers->nama;
            $data[$no]['total_pagu'] = $result->total_pagu;
            $data[$no]['sumber_dana_str'] = $result->sumber_dana_str;
            $data[$no]['metode_str'] = $result->metode_str;
            $no++;
        }
        return view('pages.proyek', ['rup' => $rup, 'datatable' => $data]); 
        // dd($data);
    }
}
