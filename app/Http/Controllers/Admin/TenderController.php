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

class TenderController extends Controller
{

    public function import(Request $request) 
    {
        $tahun = $request->segment(4);
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tenders = LpseScrap::where('tahun_ang', $tahun)->paginate(25);

        return view('admin.tender.index', ['user' => $user, 'tenders' => $tenders, 'tahun' => $tahun]);
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
        $nama_file = 'tender '.$tahun;
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('import/tender/', $nama_file);
        
        // import data
        Excel::import(new TendersImport, public_path('/import/tender/'.$nama_file));


        // alihkan halaman kembali
        return redirect('/admin/tender/import/'.$tahun)->with('success', 'Successfull Import RUP!');;

        // return $tahun;
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
