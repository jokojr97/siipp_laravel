<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\RupsImport;
use App\Exports\RupsExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\User;
use App\TahapTender;
use App\Satker;
use App\TahunAnggaran;
use App\MetodeLelang;
use App\SumberDana;
use App\JenisPekerjaan;
use App\RupPenyedia;
use App\LpseScrap;
use App\RupIsi;

class RupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function import(Request $request) 
    {
        $tahun = $request->segment(4);
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $rups = RupPenyedia::where('tahun', $tahun)->where('status_aktif', 'ya')->where('status_umumkan', 'sudah')->orderBy('tanggal_terakhir_update', 'desc')->paginate(20);

        return view('admin.rup.import', ['user' => $user, 'rups' => $rups, 'tahun' => $tahun]);
    }

    public function importdata(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $tahun = $request->tahun;

        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = 'rup '.$tahun.'.xlsx';
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('import/rup/', $nama_file);
        
        // import data
        Excel::import(new RupsImport, public_path('/import/rup/'.$nama_file));


        // alihkan halaman kembali
        return redirect('/admin/rup/import/'.$tahun)->with('success', 'Successfull Import RUP!');;

        // return $tahun;
    }    

    public function export(Request $request) 
    {
        $tahun = $request->segment(4);   
        $nama = 'Rup '.$tahun.' '.date("d-m-Y").'.xlsx';
        return Excel::download(new RupsExport($tahun), $nama);
        // return $tahun;
    }

    public function index(Request $request)
    {
        $tahun = $request->segment(3);
        if ($tahun) {
            return redirect()->route('admin.rup.tahun', $tahun);
        }else {
            return redirect()->route('admin.rup.tahun', 2020);
        }
    }

    public function tahun(Request $request){
        $tahun = $request->segment(3);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $rups = RupPenyedia::where('tahun', $tahun)->where('status_aktif', 'ya')->where('status_umumkan', 'sudah')->orderBy('tanggal_terakhir_update', 'desc')->get();
        if ($request->ajax()) {
            $rupp = RupPenyedia::with('tenders');

            return DataTables::of($rups)->editColumn('kdli', function($rupp){
                if ($rupp->isi) {
                    return 1;
                }else {
                    return 0;
                }
            })->editColumn('nama_satker', function($rupp){
                $satker = $rupp->satkers->nama;
                $satker = strtolower($satker);
                $satker = ucfirst($satker);
                return $satker;
            })->toJson();
        }        

        return view('admin.rup.index', ['user' => $user, 'rups' => $rups, 'tahun' => $tahun, 'tahuns' => $tahuns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tahun = $request->segment(3);
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $satkers = Satker::all();
        $tahun_angs = TahunAnggaran::all();
        $metode_lelangs = MetodeLelang::all();
        $sumber_danas = SumberDana::all();
        $jenis_pekerjaans = JenisPekerjaan::all();

        // $rup = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('admin.rup.create', ['user' => $user, 'tahun' => $tahun, 'satkers' => $satkers, 'tahun_angs' => $tahun_angs, 'jenis_pekerjaans' => $jenis_pekerjaans, 'sumber_danas' => $sumber_danas, 'metode_lelangs' => $metode_lelangs]);
        // dd($tahun);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $tahun = $request->segment(3);
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tahun = $request->segment(3);
        $ocid = $request->segment(4);

        $paket = RupPenyedia::where('kode_rup', $ocid)->where('tahun', $tahun)->first();
        return view('admin.rup.show', ['user' => $user, 'paket' => $paket]);

        // dd($paket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $tahun = $request->segment(3);
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tahun = $request->segment(3);
        $ocid = $request->segment(4);

        $satkers = Satker::all();
        $tahun_angs = TahunAnggaran::all();
        $metode_lelangs = MetodeLelang::all();
        $sumber_danas = SumberDana::all();
        $jenis_pekerjaans = JenisPekerjaan::all();

        $rup = RupPenyedia::where('tahun', $tahun)->where('kode_rup', $ocid)->first();

        return view('admin.rup.edit', ['user' => $user, 'tahun' => $tahun, 'satkers' => $satkers, 'tahun_angs' => $tahun_angs, 'jenis_pekerjaans' => $jenis_pekerjaans, 'sumber_danas' => $sumber_danas, 'rup' => $rup, 'metode_lelangs' => $metode_lelangs]);
        // dd($tahun);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        RupPenyedia::where('id', $id)
        ->update([
            'mak' => $request->mak,
            'kdli' => $request->kdli,
            'tkdn' => $request->tkdn,
            'umkm' => $request->umkm,
            'jenis' => $request->jenis,
            'volume' => $request->volume,
            'lokasi' => $request->lokasi,
            'program' => $request->program,
            'pradipa' => $request->pradipa,
            'nip_ppk' => $request->nip_ppk,
            'nip_kpa' => $request->nip_kpa,
            'kode_rup' => $request->kode_rup,
            'kegiatan' => $request->kegiatan,
            'pagu_rup' => $request->pagu_rup,
            'nama_kpa' => $request->nama_kpa,
            'nama_ppk' => $request->nama_ppk,
            'kode_kdli' => $request->kode_kdli,
            'id_satker' => $request->id_satker,
            'id_client' => $request->id_client,
            'deskripsi' => $request->deskripsi,
            'nama_paket' => $request->nama_paket,
            'nama_satker' => $request->nama_satker,
            'sumber_dana' => $request->sumber_dana,
            'spesifikasi' => $request->spesifikasi,
            'id_swakelola' => $request->id_swakelola,
            'status_aktif' => $request->status_aktif,
            'detail_lokasi' => $request->detail_lokasi,
            'awal_pengadaan' => $request->awal_pengadaan,
            'awal_pekerjaan' => $request->awal_pekerjaan,
            'status_umumkan' => $request->status_umumkan,
            'jenis_pengadaan' => $request->jenis_pengadaan,
            'akhir_pengadaan' => $request->akhir_pengadaan,
            'akhir_pekerjaan' => $request->akhir_pekerjaan,
            'kode_satker_asli' => $request->kode_satker_asli,
            'metode_pemilihan' => $request->metode_pemilihan,
            'tanggal_kebutuhan' => $request->tanggal_kebutuhan,
            'kode_string_program' => $request->kode_string_program,
            'kode_string_kegiatan' => $request->kode_string_kegiatan,
            'pagu_perjenis_pengadaan' => $request->pagu_perjenis_pengadaan,
            'tanggal_terakhir_update' => $request->tanggal_terakhir_update,
            'penyedia_didalam_swakelola' => $request->penyedia_didalam_swakelola,
            'tahun' => $request->tahun
        ]);

        return redirect('/admin/rup/'.$request->tahun)->with('success', 'Successfull Edit RUP!');        
    }

    public function proses(Request $request){
        $tahun = $request->segment(4);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        // $rups = RupPenyedia::where('tahun', $tahun)->where('status_aktif', 'ya')->where('status_umumkan', 'sudah')->orderBy('tanggal_terakhir_update', 'desc')->limit(300)->get();

        $rups = RupIsi::where('tahun', $tahun)->get();

        $rupp = RupIsi::with('detail');

        if ($request->ajax()) {
            return DataTables::of($rups)->addColumn('kdli', function($rupp){
                if ($rupp->detail) {
                    return 1;
                }else {
                    return 0;
                }
            })->addColumn('nama_paket', function($rupp){
                return $rupp->detail->nama_paket;
            })->addColumn('pagu_rup', function($rupp){
                return $rupp->detail->pagu_rup;
            })->addColumn('nama_satker', function($rupp){
                return $rupp->detail->nama_satker;
            })->addColumn('jenis_pengadaan', function($rupp){
                return $rupp->detail->jenis_pengadaan;
            })->toJson();
        }        

        // dd($rups);
        return view('admin.rup.proses', ['user' => $user, 'rups' => $rups, 'tahun' => $tahun, 'tahuns' => $tahuns]);
    }

    public function prosesrup(Request $request){
        $tahun = $request->tahun;

        $lpse = LpseScrap::where('tahun_ang', $tahun)->get();
        foreach ($lpse as $result) {
            $ada = RupPenyedia::where('kode_rup', $result->id_rup)->where('tahun', $tahun)->first();
            if ($ada) {
                $adaisi = RupIsi::where('tahun', $tahun)->where('ocid', $ada->kode_rup)->first();
                if ($adaisi) {
                    if ($adaisi->isi != 1) {
                        RupIsi::where('id', $adaisi->id)
                        ->update([
                            'ada' => 1,
                        ]);
                    }
                }else {
                    RupIsi::create([
                        'ocid' => $ada->kode_rup,
                        'tahun' => $tahun,
                        'ada' => 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.rup.proses', $tahun);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
