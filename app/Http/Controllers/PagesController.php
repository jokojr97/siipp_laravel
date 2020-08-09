<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Aspirasi;
use App\AspirasiLike;
use App\LpseMetode;
use App\LpseScrap;
use App\NonTenderScrap;
use App\PesertaLelang;
use App\Progress;
use App\Rup;
use App\RupPenyedia;
use App\TahapTender;
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

    public function proyekindex(){
        return redirect('proyek/2020/1/1/1/1');
    }

    public function tenderindex(){
        return redirect('proyek/tender/2020/1/1/1/1');
    }

    public function pengaduan(){
        $menu = "pengaduan";
    	$aspirasi = Aspirasi::where('aktif', 0)->orderBy('id', 'desc')->paginate(20);
    	return view('pages.pengaduan', ['aspirasi' => $aspirasi, 'menu' => $menu]);
    	// dd($aspirasi[7]->jumlah_komen(11));
    }

    public function statistik(){
        return view('pages.statistik'); 
    }

    public function proyek(Request $request){
        $tahun = $request->segment(2);
        $satker = $request->segment(3);
        $sumber = $request->segment(4);
        $jenis = $request->segment(5);
        $metode = $request->segment(6);

        $menu = "proyek";
        $satkers = Satker::all();
        $tahun_angs = TahunAnggaran::all();
        $metode_lelangs = MetodeLelang::all();
        $sumber_danas = SumberDana::all();
        $jenis_pekerjaans = JenisPekerjaan::all();

        $rup = RupPenyedia::where('tahun', $tahun)->where('status_aktif', 'ya')->where('status_umumkan', 'sudah')->orderBy('tanggal_terakhir_update', 'desc');

        if ($satker != 1) {
            $st = Satker::where('kd_satker_sirup', $satker)->first();
            if (!$st) {
                return redirect('/notfound');
            }
            $satker = $st;
            $satkerid = $satker->kd_satker_sirup;
            $rup = $rup->where('id_satker', $satker->kd_satker_sirup);
        }else {
            $satker = '';
            $satkerid = 1;
            $rup = $rup->where('id_satker', 'like', '%'.$satker.'%');
        }
        if ($jenis != 1) {
            $st = JenisPekerjaan::where('slug', $jenis)->first();
            if (!$st) {
                return redirect('/notfound');
            }
            $jenis = $st;
            $jenisslug = $jenis->slug;
            $rup = $rup->where('jenis_pengadaan', 'like',  $jenis->nama.'%');
        }else {
            $jenis = '';
            $jenisslug = 1;
            $rup = $rup->where('jenis_pengadaan', 'like', '%'.$jenis.'%');
        }
        if ($metode != 1) {
            $st = MetodeLelang::where('slug', $metode)->first();
            if (!$st) {
                return redirect('/notfound');
            }
            $metode = $st;
            $metodeslug = $metode->slug;
            $rup = $rup->where('metode_pemilihan', $metode->nama);
        }else {
            $metode = '';
            $metodeslug = 1;
            $rup = $rup->where('metode_pemilihan', 'like', '%'.$metode.'%');
        }
        if ($sumber != 1) {
            $rup = $rup->where('sumber_dana', 'like', $sumber.'%');
            $sumberid = $sumber;
        }else {
            $sumber = '';
            $sumberid = 1;
            $rup = $rup->where('sumber_dana', 'like', '%'.$sumber.'%');
        }

        $rup = $rup->limit(1000)->get();
        $rupsum = $rup->sum('pagu_rup');
        $rupcount = $rup->count();
        $ajax = $request->ajax();
        if ($request->ajax()) {
            $rupp = RupPenyedia::with('tenders');

            $aj = DataTables::of($rup)->editColumn('kdli', function($rupp){
                if ($rupp->isi) {
                    return 1;
                }else {
                    return 0;
                }
            })->toJson();

            return $aj;
        }else {
            $aj = '';
        }

        return view('pages.proyek', ['rup' => $rup, 'satkers' => $satkers,'satker' => $satker, 'sumber_danas' => $sumber_danas, 'jenis_pekerjaans' => $jenis_pekerjaans, 'tahun_angs' => $tahun_angs, 'metode_lelangs' => $metode_lelangs, 'tahun' => $tahun, 'sumber' => $sumber, 'jenis' => $jenis, 'metode' => $metode, 'rupsum' => $rupsum, 'rupcount' => $rupcount, 'satkerid' => $satkerid, 'jenisslug' => $jenisslug, 'metodeslug' => $metodeslug, 'sumberid' => $sumberid, 'ajax' => $ajax, 'aj' => $aj, 'menu' => $menu]); 
        // dd($rupcount);
    }


    public function cari(Request $request){
        $tahun = $request->tahun;
        $opd = $request->opd;
        $sumber = $request->sumber;
        $metode = $request->metode;
        $jenispengadaan = $request->jenispengadaan;

        return redirect('/proyek/'.$tahun.'/'.$opd.'/'.$sumber.'/'.$metode.'/'.$jenispengadaan.'');
    }

    public function caritender(Request $request){
        $tahun = $request->tahun;
        $opd = $request->opd;
        $sumber = $request->sumber;
        $tahap = $request->tahap;
        $jenispengadaan = $request->jenispengadaan;

        return redirect('/proyek/tender?tahun='.$tahun.'&satker='.$opd.'&sumber='.$sumber.'&tahap='.$tahap.'&jenispengadaan='.$jenispengadaan.'');
        // dd($request);
    }

    public function tender(Request $request){
        $tahun = $request->segment(3);
        $satker = $request->segment(4);
        $sumber = $request->segment(5);
        $jenis = $request->segment(6);
        $tahap = $request->segment(7);

        $menu = "tender";

        $satkers = Satker::all();
        $tahun_angs = TahunAnggaran::all();
        $tahap_tenders = TahapTender::all();
        $sumber_danas = SumberDana::all();
        $jenis_pekerjaans = JenisPekerjaan::all();

        $scrap = LpseScrap::where('tahun_ang', $tahun);

        if ($satker != 1) {
            $st = Satker::where('kd_satker_sirup', $satker)->first();
            if (!$st) {
                return redirect('/notfound');
            }
            $satker = $st;
            $satkerid = $satker->kd_satker_sirup;
            $scrap = $scrap->where('satker', $satker->nama);
        }else {
            $satker = '';
            $satkerid = 1;
            $scrap = $scrap->where('satker', 'like', '%'.$satker.'%');
        }if ($sumber != 1) {
            $scrap = $scrap->where('sumber_dana', 'like', $sumber.'%');
            $sumberid = $sumber;
        }else {
            $sumber = '';
            $scrap = $scrap->where('sumber_dana', 'like', '%'.$sumber.'%');
            $sumberid = 1;
        }if ($jenis != 1) {
            $st = JenisPekerjaan::where('slug', $jenis)->first();
            if (!$st) {
                return redirect('/notfound');
            }
            $jenis = $st;
            $jenisslug = $jenis->slug;
            $scrap = $scrap->where('kategori', $jenis->nama_lpse);
        }else {
            $jenis = '';
            $jenisslug = 1;
            $scrap = $scrap->where('kategori', 'like', '%'.$jenis.'%');
        }if ($tahap != 1) {
            $st = TahapTender::where('slug', $tahap)->first();
            if (!$st) {
                return redirect('/notfound');
            }
            $tahap = $st;
            $tahapslug = $tahap->slug;
            $scrap = $scrap->where('tahap_tender', $tahap->nama);
        }else {
            $tahap = '';
            $tahapslug = 1;
            $scrap = $scrap->where('tahap_tender', 'like', '%'.$tahap.'%');
        }

        $scrap = $scrap->get();
        $scrapcount = $scrap->count();
        $scrapsum = $scrap->sum('pagu');

        // $tenders = LpseScrap::where('tahun_ang', $tahun)->get();
        if ($request->ajax()) {
            $rupp = LpseScrap::with('rups');

            return DataTables::of($scrap)->addColumn('skor', function($rupp){
                if ($rupp->rups) {
                    return 1;
                }else {
                    return 0;
                }
            })->toJson();
        }
        // dd($sumber);
        return view('pages.tender', ['scrap' => $scrap, 'satkers' => $satkers,'satker' => $satker, 'sumber_danas' => $sumber_danas, 'jenis_pekerjaans' => $jenis_pekerjaans, 'tahun_angs' => $tahun_angs, 'tahap_tenders' => $tahap_tenders, 'tahun' => $tahun, 'sumber' => $sumber, 'jenis' => $jenis, 'tahap' => $tahap, 'scrapsum' => $scrapsum, 'scrapcount' => $scrapcount, 'satkerid' => $satkerid, 'jenisslug' => $jenisslug, 'tahapslug' => $tahapslug, 'sumberid' => $sumberid, 'menu' => $menu]); 
        // dd($data);
    }

    public function perencanaan(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $menu = "proyek";
        $tahap = 1;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 1)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.perencanaan', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap, 'menu' => $menu]);
    }

    public function pengumuman(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $menu = "proyek";
        $tahap = 2;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 2)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.pengumuman', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap, 'menu' => $menu]);
    }

    public function kontrak(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $menu = "proyek";
        $tahap = 3;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 3)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.kontrak', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap, 'menu' => $menu]);
               
    }

    public function implementasi(Request $request){
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);
        $menu = "proyek";
        $tahap = 4;
        $aspirasi = Aspirasi::where('aktif', 0)->where('ocid', $ocid)->where('tahap', 4)->where('id_sub', 0)->orderBy('id', 'desc')->get();
        $paket = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('pages.implementasi', ['paket' => $paket, 'aspirasi' => $aspirasi, 'tahap' => $tahap, 'menu' => $menu]);
               
    }

    public function aspirasi(Request $request){

        $request->validate([
            'nama' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'aspirasi' => 'required',
        ]);

        $keterangan = $request->keterangan;
        $id_sub = $request->id_sub;
        $status = $request->status;
        $kd_satker = $request->kd_satker;
        $thn = $request->thn;
        $tahap = $request->tahap;
        $aktif = $request->aktif;
        $ocid = $request->ocid;
        $nama = $request->nama;
        $anonim = $request->anonim;
        $telpon = $request->telpon;
        $jk = $request->jk;
        $alamat = $request->alamat;
        $isi = $request->aspirasi;
        $image = $request->image;
        $tanggal = $request->tanggal;
        if ($image) {
            $new_image = time().$image->getClientOriginalName();
            $aspirasi = Aspirasi::create([
                'id_sub' => $id_sub,
                'tahap' => $tahap,
                'ocid' => $ocid,
                'kd_satker' => $kd_satker,
                'pengirim' => $nama,
                'no_hp' => $telpon,
                'alamat' => $alamat,
                'isi' => $isi,
                'foto' => $new_image,
                'jenis_kelamin' => $jk,
                'tanggal' => $tanggal,
                'tahun_anggaran' => $thn,
                'status' => $status,
                'keterangan' => $keterangan,
                'aktif' => $aktif,
                'anonim' => $anonim,
            ]);

            $image->move('/Assets/proyek/images/komentar/', $new_image);
        }else {
            $new_image = '';
            $aspirasi = Aspirasi::create([
                'id_sub' => $id_sub,
                'tahap' => $tahap,
                'ocid' => $ocid,
                'kd_satker' => $kd_satker,
                'pengirim' => $nama,
                'no_hp' => $telpon,
                'alamat' => $alamat,
                'isi' => $isi,
                'foto' => $new_image,
                'jenis_kelamin' => $jk,
                'tanggal' => $tanggal,
                'tahun_anggaran' => $thn,
                'status' => $status,
                'keterangan' => $keterangan,
                'aktif' => $aktif,
                'anonim' => $anonim,
            ]);


        }
        return redirect()->back();

        // dd($request);
    }

    public function penyediaindex(Request $request){
        return redirect('/proyek/penyedia/2019');
    }

    public function penyedia(Request $request){
        $tahun = $request->segment(3);
        $tahun_angs = TahunAnggaran::all();
        $menu = "penyedia";

        // $penyedia = PesertaLelang::where('tahun', $tahun)->groupBy('npwp')->get();
        $penyedia = PesertaLelang::where('tahun', $tahun)->groupBy('npwp')->limit(300)->get();

        if ($request->ajax()) {
            return DataTables::of($penyedia)->addColumn('ikutlelang', function($penyedias){
                return $jmlikut = PesertaLelang::where('npwp', $penyedias->npwp)->where('tahun', $penyedias->tahun)->count();
            })->addColumn('menang', function($penyedias){
                $menangtender = LpseScrap::where('npwp_pemenang', $penyedias->npwp)->where('tahun_ang', $penyedias->tahun)->count();
                $menangnontender = NonTenderScrap::where('npwp_peserta', $penyedias->npwp)->where('tahun_ang', $penyedias->tahun)->count();

                return $menang = $menangtender+$menangnontender;
            })->addColumn('kontrak', function($penyedias){
                $kontraktender = LpseScrap::where('npwp_kontraktor', $penyedias->npwp)->where('tahun_ang', $penyedias->tahun)->count();
                $kontraknontender = NonTenderScrap::where('npwp_kontraktor', $penyedias->npwp)->where('tahun_ang', $penyedias->tahun)->count();

                return $kontrak = $kontraktender+$kontraknontender;
            })->addColumn('nilaikontrak', function($penyedias){
                $kontraktender = LpseScrap::where('npwp_kontraktor', $penyedias->npwp)->where('tahun_ang', $penyedias->tahun)->sum('negosiasi_kontraktor');
                $kontraknontender = NonTenderScrap::where('npwp_kontraktor', $penyedias->npwp)->where('tahun_ang', $penyedias->tahun)->sum('negosiasi_kontraktor');

                return $kontrak = $kontraktender+$kontraknontender;
            })->addColumn('alamat', function($penyedias){
                $alamat = LpseScrap::where('npwp_pemenang', $penyedias->npwp)->first();
                if ($alamat) {
                    return $alamat->alamat_pemenang;
                }else {
                    $alamat = NonTenderScrap::where('npwp_kontraktor', $penyedias->npwp)->first();
                    if ($alamat) {
                        return $alamat->alamat_kontraktor;
                    }else {
                        return "";
                    }
                }
            })->editColumn('npwp', function($penyedias){
                if (!$penyedias->npwp) {
                    return '';
                }else {
                    return $penyedias->npwp;
                }
            })->editColumn('peserta', function($penyedias){
                if (!$penyedias->peserta) {
                    return '';
                }else {
                    return $penyedias->peserta;
                }
            })->toJson();
        }

        return view('pages.penyedia', ['tahun' => $tahun, 'tahuns' => $tahun_angs, 'menu' => $menu]);
        // dd($penyedia);
        // dd($tahun);
    }

    public function ikutlelang(Request $request){
        $tahun = $request->segment(4);
        $npwp = $request->segment(5);
        $menu = "penyedia";

        $ikuts = PesertaLelang::where('npwp', $npwp)->where('tahun', $tahun)->get();

        return view('pages.ikutlelang', ['tahun' => $tahun, 'npwp' => $npwp, 'ikuts' => $ikuts, 'menu' => $menu]);
    }

    public function menang(Request $request){
        $tahun = $request->segment(4);
        $npwp = $request->segment(5);
        $menu = "penyedia";

        $peserta = PesertaLelang::where('npwp', $npwp)->where('tahun', $tahun)->first();
        $menangtender = LpseScrap::where('npwp_pemenang', $npwp)->where('tahun_ang', $tahun)->get();
        $menangnontender = NonTenderScrap::where('npwp_peserta', $npwp)->where('tahun_ang', $tahun)->get();

        return view('pages.menang', ['tahun' => $tahun, 'npwp' => $npwp, 'menangtender' => $menangtender, 'menangnontender' => $menangnontender, 'menu' => $menu, 'peserta' => $peserta]);
    }

    public function kontrakpenyedia(Request $request){
        $tahun = $request->segment(4);
        $npwp = $request->segment(5);
        $menu = "penyedia";

        $peserta = PesertaLelang::where('npwp', $npwp)->where('tahun', $tahun)->first();
        $kontraktender = LpseScrap::where('npwp_kontraktor', $npwp)->where('tahun_ang', $tahun)->get();
        $kontraknontender = NonTenderScrap::where('npwp_kontraktor', $npwp)->where('tahun_ang', $tahun)->get();

        return view('pages.kontrakpenyedia', ['tahun' => $tahun, 'npwp' => $npwp, 'kontraktender' => $kontraktender, 'kontraknontender' => $kontraknontender, 'menu' => $menu, 'peserta' => $peserta]);

    }

    public function notfound(){
        return view('pages.notfound');
    }
}
