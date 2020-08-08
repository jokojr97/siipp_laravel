<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TahunAnggaran;
use App\LpseScrap;
use App\RupPenyedia;
use App\User;
use App\Progress;
use DataTables;

class ProgressController extends Controller
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
            return redirect()->route('admin.progress.tahun', $tahun);
        }else {
            return redirect()->route('admin.progress.tahun', 2020);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tahun(Request $request)
    {
        $tahun = $request->segment(3);
        $tahuns = TahunAnggaran::all();
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $progress = LpseScrap::where('tahun_ang', $tahun)->get();
        if ($request->ajax()) {
            return DataTables::of($progress)->toJson();
        }

        return view('admin.progress.index', ['user' => $user, 'progress' => $progress, 'tahun' => $tahun, 'tahuns' => $tahuns]);
        // dd($progress[0]->paket);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ocid = $request->ocid;
        $tahun = $request->tahun;
        $id_user = $request->id_user;
        $anonim = $request->anonim;
        $keterangan1 = $request->keterangan1;
        $keterangan2 = $request->keterangan2;
        $keterangan3 = $request->keterangan3;
        $keterangan4 = $request->keterangan4;
        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $tanggal3 = $request->tanggal3;
        $tanggal4 = $request->tanggal4;
        $image1 = $request->image1;
        $image2 = $request->image2;
        $image3 = $request->image3;
        $image4 = $request->image4;

        $user = User::where('id', $id_user)->first();
        $rup = RupPenyedia::where('ocid', $ocid)->where('tahun', $tahun)->first();

        if (!$image1) {
            $progres = Progress::where('ocid', $ocid)->where('persentase', 1)->first();
            if ($progres) {
                Progress::destroy($progres->id);
            }
            $new_image = $image1->getClientOriginalName().time();

            Progress::create([
                'id_user' => $id_user,
                'ocid' => $ocid,
                'kd_satker' => $rup->id_satker,
                'nama_paket' => $rup->nama_paket,
                'images' => $new_image,
                'tahun_anggaran' => $tahun,
                'persentase' => 1,
                'keterangan' => $keterangan1,
                'tanggal' => $tanggal1,
                'status' => 1,
                'uploader' => $user->roles[0]->name,
                'anonim' => $anonim
            ]);

        }
        if (!$image2) {
            $progres = Progress::where('ocid', $ocid)->where('persentase', 2)->first();
            if ($progres) {
                Progress::destroy($progres->id);
            }
            $new_image = $image2->getClientOriginalName().time();

            Progress::create([
                'id_user' => $id_user,
                'ocid' => $ocid,
                'kd_satker' => $rup->id_satker,
                'nama_paket' => $rup->nama_paket,
                'images' => $new_image,
                'tahun_anggaran' => $tahun,
                'persentase' => 2,
                'keterangan' => $keterangan2,
                'tanggal' => $tanggal2,
                'status' => 1,
                'uploader' => $user->roles[0]->name,
                'anonim' => $anonim
            ]);

        }
        if (!$image3) {
            $progres = Progress::where('ocid', $ocid)->where('persentase', 3)->first();
            if ($progres) {
                Progress::destroy($progres->id);
            }
            $new_image = $image3->getClientOriginalName().time();

            Progress::create([
                'id_user' => $id_user,
                'ocid' => $ocid,
                'kd_satker' => $rup->id_satker,
                'nama_paket' => $rup->nama_paket,
                'images' => $new_image,
                'tahun_anggaran' => $tahun,
                'persentase' => 3,
                'keterangan' => $keterangan3,
                'tanggal' => $tanggal3,
                'status' => 1,
                'uploader' => $user->roles[0]->name,
                'anonim' => $anonim
            ]);

        }
        if (!$image4) {
            $progres = Progress::where('ocid', $ocid)->where('persentase', 4)->first();
            if ($progres) {
                Progress::destroy($progres->id);
            }
            $new_image = $image4->getClientOriginalName().time();

            Progress::create([
                'id_user' => $id_user,
                'ocid' => $ocid,
                'kd_satker' => $rup->id_satker,
                'nama_paket' => $rup->nama_paket,
                'images' => $new_image,
                'tahun_anggaran' => $tahun,
                'persentase' => 4,
                'keterangan' => $keterangan4,
                'tanggal' => $tanggal4,
                'status' => 1,
                'uploader' => $user->roles[0]->name,
                'anonim' => $anonim
            ]);

        }

        return redirect()->route('admin.progress.show', ['tahun' => $tahun, 'id' => $ocid])->with('success', 'Progress berhasil ditambahkan');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $tahun = $request->segment(3);
        $ocid = $request->segment(4);

        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $progress = Progress::where('tahun_anggaran', $tahun)->where('ocid', $ocid)->get();
        $progres = Progress::where('tahun_anggaran', $tahun)->where('ocid', $ocid)->first();
        $progres1 = Progress::where('tahun_anggaran', $tahun)->where('ocid', $ocid)->where('persentase', 1)->first();
        $progres2 = Progress::where('tahun_anggaran', $tahun)->where('ocid', $ocid)->where('persentase', 2)->first();
        $progres3 = Progress::where('tahun_anggaran', $tahun)->where('ocid', $ocid)->where('persentase', 3)->first();
        $progres4 = Progress::where('tahun_anggaran', $tahun)->where('ocid', $ocid)->where('persentase', 4)->first();

        return view('admin.progress.show', ['user' => $user, 'progres1' => $progres1, 'progres2' => $progres2, 'progres3' => $progres3, 'progres4' => $progres4, 'progress' => $progress, 'tahun' => $tahun, 'progres' => $progres, 'ocid' => $ocid, 'tahun' => $tahun]);

        // dd($ocid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        //
    }
}
