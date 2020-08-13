<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PotensiKorupsi;
use Illuminate\Http\Request;

class PraController extends Controller
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
        $tahun = $request->segment(3);

        return view('admin.pra.index', ['tahun', $tahun])
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
