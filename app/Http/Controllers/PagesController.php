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
use App\RupPenyedia;
use App\Satker;
use App\TahunAnggaran;
use App\MetodeLelang;
use App\SumberDana;
use App\JenisPekerjaan;

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
        $dt = $this->get_url();
        $tahun = $dt['tahun'];
        $rup = RupPenyedia::where('tahun', $tahun)->get();
        $satker = Satker::all();
        $data = array();
        $no = 0;
        foreach ($rup as $result) {
            $data[$no]['id_rup'] = $result->kode_rup;
            if ($result->isi) {
                $data[$no]['proses'] = $result->isi->ada;
            }else {
                $data[$no]['proses'] = 0;
            }
            $data[$no]['nama_paket'] = $result->nama_paket;
            $data[$no]['nama_satker'] = $result->satkers->nama;
            $data[$no]['pagu_rup'] = $result->pagu_rup;
            $data[$no]['sumber_dana'] = $result->sumber_dana;
            $data[$no]['metode_pemilihan'] = $result->metode_pemilihan;
            $data[$no]['tahun'] = $result->tahun;
            $no++;
        }
        return view('pages.proyek', ['rup' => $rup, 'datatable' => $data]); 
        // dd($data);
    }

    public function perencanaan(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $tahap = 1;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 1)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.perencanaan', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap]);
    }

    public function pengumuman(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $tahap = 2;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 2)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.pengumuman', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap]);
    }

    public function kontrak(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $tahap = 3;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 3)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.kontrak', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap]);
               
    }

    public function implementasi(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $tahap = 4;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 4)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.implementasi', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap]);
               
    }



    private function get_url(){        
        if (isset($_GET['tahun'])) {
            $dt['tahun'] = $_GET['tahun'];
        }else {
            $dt['tahun'] = 2020;
        }

        if (isset($_GET['id'])) {
            $dt['id'] = $_GET['id'];
        }else {
            $dt['id'] = 0;
        }

        return $dt;
    }
}
