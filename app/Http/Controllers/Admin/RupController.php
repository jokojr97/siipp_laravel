<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\TahapTender;
use App\Satker;
use App\TahunAnggaran;
use App\MetodeLelang;
use App\SumberDana;
use App\JenisPekerjaan;
use App\RupPenyedia;

class RupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $rups = RupPenyedia::where('tahun', $tahun)->where('status_aktif', 'ya')->where('status_umumkan', 'sudah')->orderBy('tanggal_terakhir_update', 'desc')->paginate(20);

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

        return view('admin.rup.create', ['user' => $user, 'tahun' => $tahun, 'satkers' => $satkers, 'tahun_angs' => $tahun_angs, 'jenis_pekerjaans' => $jenis_pekerjaans, 'sumber_danas' => $sumber_danas]);
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
        $ocid = $request->segment(4);

        dd($ocid);
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
        $ocid = $request->segment(4);
        dd($tahun);
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
        //
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
