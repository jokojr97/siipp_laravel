<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

        return view('admin.pra.index', ['tahun' => $tahun, 'tahuns' => $tahuns, 'user' => $user]);
        // dd($tahun);
    }

    public function sync(Request $request){
        
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
    public function show(PotensiKorupsi $potensiKorupsi)
    {
        //
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
