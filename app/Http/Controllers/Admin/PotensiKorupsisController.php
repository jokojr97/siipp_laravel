<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PesertaLelang;
use App\PotensiKorupsi;
use App\TahunAnggaran;
use App\User;
use App\RupPenyedia;
use App\LpseScrap;
use DataTables;

class PotensiKorupsisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('admin/pra/2019');
    }

    public function tahun(Request $request) {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $tahun = $request->segment(3);
        $tahuns = TahunAnggaran::all();
        $tender = LpseScrap::where('tahun_ang', $tahun)->get();
        return view('admin.pra.index', ['tahun' => $tahun, 'tahuns' => $tahuns, 'user' => $user, 'tenders' => $tender]);
        // dd($tahun);
    }

    public function sync(Request $request){
        $tahun = $request->segment(5);

        $lpse = LpseScrap::where('tahun_ang', $tahun)->get();
        $q4 = date('Y-m-d', strtotime("10/1/".$tahun));

        foreach ($lpse as $result) {
            // menghitung skor waktu
            if ($result->tanggal_pembuatan > $q4) {
                $q = 1;
            }else {
                $q = 0;
            }
            // end menghitung skor waktu

            // menghitung skor nilai kontrak
            if ($result->hasil_negosiasi) {
                $nego = $result->hasil_negosiasi;
            }else {
                $nego = 1;          
            }

            if ($nego <= 200000000) {
                $nkt = 1;
            }else if ($nego > 200000000 && $nego <= 500000000){
                $nkt = 2;
            }else if ($nego > 500000000 && $nego <= 1000000000) {
                $nkt = 3;
            }else if ($nego > 1000000000 && $nego <= 5000000000) {
                $nkt = 4;
            }else if ($nego > 5000000000) {
                $nkt = 5;
            }
            // end menghitung skor nilai kontrak

            // menghitung skor peserta melakukan penawaran
            $jmlpeserta = PesertaLelang::where('kd_lelang', $result->kode_lelang)->where('tahun', $tahun)->get();
            $menawar = 0;
            foreach ($jmlpeserta as $hsl) {
                if ($hsl->penawaran) {
                    $menawar++;
                }                
            }

            if ($menawar < 3) {
                $p = 5;
            }else if ($menawar == 3) {
                $p = 4;
            }else if ($menawar == 4) {
                $p = 3;
            }else if ($menawar == 5) {
                $p = 2;
            }else if ($menawar > 5) {
                $p = 1;
            }
            // end menghitung skor peserta melakukan penawaran

            // menghitung skor saving
            if ($result->hps) {
                $hps = $result->hps;
            }else {
                $hps = 1;
            }

            $saving = $nego/$hps;

            if ($saving > 0.95) {
                $s = 5;
            }else if ($saving >= 0.90 && $saving < 0.95) {
                $s = 4;
            }else if ($saving >= 0.85 && $saving < 0.90) {
                $s = 3;
            }else if ($saving >= 0.80 && $saving < 0.85) {
                $s = 2;
            }else if ($saving < 0.80 ) {
                $s = 1;
            }else {
                $s = 0;
            }

            $winner = LpseScrap::where('npwp_pemenang', $result->npwp_pemenang)->where('tahun_ang', $tahun)->count();
            if ($result->npwp_pemenang) {
                if ($winner == 2) {
                    $w = 1;
                }else if ($winner == 3) {
                    $w = 2;
                }else if ($winner == 4) {
                    $w = 3;
                }else if ($winner == 5) {
                    $w = 4;
                }else if ($winner > 5) {
                    $w = 5;
                }
            }else {
                $w = 0;
            }
            // end menghitung skor saving

            // total nilai
            $total = $nkt+$p+$s+$q+$w;

            // cek potensi korupsi di database
            $pot = PotensiKorupsi::where('id_tender', $result->kode_lelang)->where('tahun', $tahun)->first();
            // jika ada
            if ($pot) {
                // echo "";
                PotensiKorupsi::where('id', $pot->id)
                ->update([
                    'id_tender' => $result->kode_lelang,
                    'ocid' => $result->id_rup,
                    'tahun' => $result->tahun_ang,
                    'nkt' => $nkt,
                    'p' => $p,
                    's' => $s,
                    'q' => $q,
                    'w' => $w,
                    'total' => $total
                ]);
            }else { //jika tidak ada
                PotensiKorupsi::create([
                    'id_tender' => $result->kode_lelang,
                    'ocid' => $result->id_rup,
                    'tahun' => $result->tahun_ang,
                    'nkt' => $nkt,
                    'p' => $p,
                    's' => $s,
                    'q' => $q,
                    'w' => $w,
                    'total' => $total
                ]);
            }

        }
            return redirect()->back()->with('success', 'berhasil menghitung potensi korupsi!!!');
        // dd($q4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PotensiKorupsi  $potensiKorupsi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {        
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $tahun = $request->segment(3);
        $kd_lelang = $request->segment(4);

        $paket = LpseScrap::where('kode_lelang', $kd_lelang)->first();
        $ocid = $paket->id_rup;
        $potensi = PotensiKorupsi::where('ocid', $ocid)->first();

        if ($paket->npwp_pemenang) {
            $winner = LpseScrap::where('npwp_pemenang', $paket->npwp_pemenang)->where('tahun_ang', $tahun)->count();
        }else {
            $winner = 0;
        }

        if ($paket->hps) {
            $hps = $paket->hps;
        }else {
            $hps = 1;
        }

        if ($paket->hasil_negosiasi) {
            $nego = $paket->hasil_negosiasi;
        }else {
            $nego = 1;          
        }

        $saving = $nego/$hps;
        $saving = number_format((float)$saving, 3, '.', '');

        if ($paket->npwp_pemenang) {
            $jmlpeserta = PesertaLelang::where('kd_lelang', $paket->kode_lelang)->where('tahun', $tahun)->get();
            $menawar = 0;
            foreach ($jmlpeserta as $hsl) {
                if ($hsl->penawaran) {
                    $menawar++;
                }                
            }
        }else {
            $menawar = 0;
        }
        $tgl = $paket->tanggal_pembuatan;
        if($tgl >= $tahun."-01-01" && $tgl <= $tahun."-03-31"){
            $triwulan = 1;
        }else if($tgl >= $tahun."-04-01" && $tgl <= $tahun."-06-31"){
            $triwulan = 2;
        }else if($tgl >= $tahun."-07-01" && $tgl <= $tahun."-09-31"){
            $triwulan = 3;
        }else if($tgl >= $tahun."-10-01" && $tgl <= $tahun."-12-31"){
            $triwulan = 4;
        }else {
            $triwulan = 0;
        }

        return view('admin.pra.show', ['user' => $user, 'paket' => $paket, 'tahun' => $tahun, 'potensi' => $potensi, 'jmlmenang' => $winner, 'saving' => $saving, 'menawar' => $menawar, 'triwulan' => $triwulan]);
        // dd($paket);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PotensiKorupsi  $potensiKorupsi
     * @return \Illuminate\Http\Response
     */
    public function edit(PotensiKorupsi $potensiKorupsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PotensiKorupsi  $potensiKorupsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PotensiKorupsi $potensiKorupsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PotensiKorupsi  $potensiKorupsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PotensiKorupsi $potensiKorupsi)
    {
        //
    }
}
