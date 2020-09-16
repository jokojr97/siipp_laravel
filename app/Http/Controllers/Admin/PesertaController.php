<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PesertasExport;
use App\Imports\PesertasImport;
use Illuminate\Http\Request;
use App\PesertaLelang;
use App\TahunAnggaran;
use App\User;
use DataTables;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->segment(3);
        if ($tahun) {
            return redirect()->route('admin.peserta.tahun', $tahun);
        }else {
            return redirect()->route('admin.peserta.tahun', 2020);
        }
    }

    public function tahun(Request $request){
        $tahun = $request->segment(3);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tenders = PesertaLelang::where('tahun', $tahun);
        if ($request->ajax()) {
            $rupp = PesertaLelang::with('tenders');
            return DataTables::of($tenders)->addColumn('nama_paket', function($rupp){
                if ($rupp->tender) {
                    return $rupp->tender->nama_paket;
                }else {
                    return '';
                }
            })->make(true);
        }

        return view('admin.peserta.index', ['user' => $user, 'tenders' => $tenders, 'tahun' => $tahun, 'tahuns' => $tahuns]);
        // dd($tenders);
    }


    public function export(Request $request) 
    {
        $tahun = $request->segment(4);   
        $nama = 'Peserta Lelang '.$tahun.' '.date("d-m-Y").'.xlsx';
        return Excel::download(new pesertasExport($tahun), $nama);
        // return $tahun;
    }


    public function import(Request $request) 
     {
        $tahun = $request->segment(4);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $tenders = PesertaLelang::where('tahun', $tahun)->latest()->paginate(25);

        return view('admin.peserta.import', ['user' => $user, 'tenders' => $tenders, 'tahun' => $tahun, 'tahuns' => $tahuns]);
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
        $nama_file = 'peserta '.$tahun.'.xlsx';
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('import/peserta/', $nama_file);
        
        // import data
        Excel::import(new PesertasImport, public_path('/import/peserta/'.$nama_file));

        // alihkan halaman kembali
        return redirect('/admin/peserta/import/'.$tahun)->with('success', 'Successfull Import Data Non Tender!');;

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
     * @param  \App\PesertaLelang  $pesertaLelang
     * @return \Illuminate\Http\Response
     */
    public function show(PesertaLelang $pesertaLelang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PesertaLelang  $pesertaLelang
     * @return \Illuminate\Http\Response
     */
    public function edit(PesertaLelang $pesertaLelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PesertaLelang  $pesertaLelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesertaLelang $pesertaLelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PesertaLelang  $pesertaLelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesertaLelang $pesertaLelang)
    {
        //
    }
}
