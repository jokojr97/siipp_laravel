<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\TendersImport;
use App\Exports\TendersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\TahapTender;
use App\Satker;
use App\TahunAnggaran;
use App\MetodeLelang;
use App\SumberDana;
use App\JenisPekerjaan;
use App\RupPenyedia;
use App\LpseScrap;
use App\LpseMetode;
use App\MetodeLpse;

class TenderController extends Controller
{

    public function import(Request $request) 
    {
        $tahun = $request->segment(4);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tenders = LpseScrap::latest()->paginate(25);

        return view('admin.tender.import', ['user' => $user, 'tenders' => $tenders, 'tahun' => $tahun, 'tahuns' => $tahuns]);
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
        $nama_file = 'tender '.$tahun.'.xlsx';
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('import/tender/', $nama_file);
        
        // import data
        Excel::import(new TendersImport, public_path('/import/tender/'.$nama_file));

        $metode = MetodeLpse::all();
        foreach ($metode as $result) {
            $lpse = LpseScrap::where('tahun_ang', $tahun)->where('sistem_pengadaan', 'like', $result->nama.' -%')->get();
            foreach ($lpse as $hasil) {
                $metodelpse = LpseMetode::where('kd_lpse', $hasil->kode_lelang)->first();
                if ($metodelpse) {
                    $nama_file = 'joko';
                }else {
                    LpseMetode::create([
                        'kd_lpse' => $hasil->kode_lelang, 
                        'ocid' => $hasil->id_rup, 
                        'id_metode' => $result->id
                    ]);
                }
            }
        }

        // alihkan halaman kembali
        return redirect('/admin/tender/import/'.$tahun)->with('success', 'Successfull Import Data Tender!');;

        // return $tahun;
    }    

    public function synctender(Request $request){        
        $tahun = $request->segment(4);
        $metode = MetodeLpse::all();
        foreach ($metode as $result) {
            $lpse = LpseScrap::where('tahun_ang', $tahun)->where('sistem_pengadaan', 'like', $result->nama.' -%')->get();
            foreach ($lpse as $hasil) {
                $metodelpse = LpseMetode::where('kd_lpse', $hasil->kode_lelang)->first();
                if ($metodelpse) {
                    $nama_file = 'joko';
                }else {
                    LpseMetode::create([
                        'kd_lpse' => $hasil->kode_lelang, 
                        'ocid' => $hasil->id_rup, 
                        'id_metode' => $result->id
                    ]);
                }
            }
        }

        return redirect('/admin/tender/'.$tahun)->with('success', 'Successfull Sync Data!');
        // dd($tahun);

    }

    public function export(Request $request) 
    {
        $tahun = $request->segment(4);   
        $nama = 'Tender '.$tahun.' '.date("d-m-Y").'.xlsx';
        return Excel::download(new TendersExport($tahun), $nama);
        // return $tahun;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahun = $request->segment(3);
        if ($tahun) {
            return redirect()->route('admin.tender.tahun', $tahun);
        }else {
            return redirect()->route('admin.tender.tahun', 2020);
        }
    }

    public function tahun(Request $request){
        $tahun = $request->segment(3);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tenders = LpseScrap::where('tahun_ang', $tahun)->paginate(25);

        return view('admin.tender.index', ['user' => $user, 'tenders' => $tenders, 'tahun' => $tahun, 'tahuns' => $tahuns]);
        // dd($tahun);
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
     * @param  \App\LpseScrap  $lpseScrap
     * @return \Illuminate\Http\Response
     */
    public function show(LpseScrap $lpseScrap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LpseScrap  $lpseScrap
     * @return \Illuminate\Http\Response
     */
    public function edit(LpseScrap $lpseScrap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LpseScrap  $lpseScrap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LpseScrap $lpseScrap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LpseScrap  $lpseScrap
     * @return \Illuminate\Http\Response
     */
    public function destroy(LpseScrap $lpseScrap)
    {
        //
    }
}
