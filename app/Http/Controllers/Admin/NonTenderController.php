<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NonTendersExport;
use App\Imports\NonTendersImport;
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
use App\NonTenderScrap;
use DataTables;

class NonTenderController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->segment(3);
        if ($tahun) {
            return redirect()->route('admin.nontender.tahun', $tahun);
        }else {
            return redirect()->route('admin.nontender.tahun', 2020);
        }
    }

    public function tahun(Request $request){
        $tahun = $request->segment(3);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tenders = NonTenderScrap::where('tahun_ang', $tahun)->get();
        if ($request->ajax()) {
            return DataTables::of($tenders)->toJson();
        }

        return view('admin.nontender.index', ['user' => $user, 'tenders' => $tenders, 'tahun' => $tahun, 'tahuns' => $tahuns]);
        // dd($tenders);
    }


    public function export(Request $request) 
    {
        $tahun = $request->segment(4);   
        $nama = 'Non Tender '.$tahun.' '.date("d-m-Y").'.xlsx';
        return Excel::download(new NonTendersExport($tahun), $nama);
        // return $tahun;
    }


    public function import(Request $request) 
     {
        $tahun = $request->segment(4);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tenders = NonTenderScrap::latest()->paginate(25);

        return view('admin.nontender.import', ['user' => $user, 'tenders' => $tenders, 'tahun' => $tahun, 'tahuns' => $tahuns]);
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
        $nama_file = 'nontender '.$tahun.'.xlsx';
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('import/nontender/', $nama_file);
        
        // import data
        Excel::import(new NonTendersImport, public_path('/import/nontender/'.$nama_file));

        // alihkan halaman kembali
        return redirect('/admin/nontender/import/'.$tahun)->with('success', 'Successfull Import Data Non Tender!');;

        // return $tahun;
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
     * @param  \App\NonTenderScrap  $nonTenderScrap
     * @return \Illuminate\Http\Response
     */
    public function show(NonTenderScrap $nonTenderScrap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NonTenderScrap  $nonTenderScrap
     * @return \Illuminate\Http\Response
     */
    public function edit(NonTenderScrap $nonTenderScrap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NonTenderScrap  $nonTenderScrap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NonTenderScrap $nonTenderScrap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NonTenderScrap  $nonTenderScrap
     * @return \Illuminate\Http\Response
     */
    public function destroy(NonTenderScrap $nonTenderScrap)
    {
        //
    }
}
