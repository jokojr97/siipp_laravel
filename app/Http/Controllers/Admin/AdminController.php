<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\LpseScrap;
use App\RupPenyedia;
use App\RoleUsers;
use App\NonTenderScrap;
use App\PesertaLelang;

class AdminController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $tahun = 2019;

        $users = RoleUsers::where('role_id', 4)->get();
        $rup = RupPenyedia::where('tahun', $tahun)->where('status_aktif', 'ya')->where('status_umumkan', 'sudah')->count();
        $tender = LpseScrap::where('tahun_ang', $tahun)->count();
        $nontender = NonTenderScrap::where('tahun_ang', $tahun)->count();
        $peserta = PesertaLelang::where('tahun', $tahun)->groupBy('npwp')->get();
        $p = 0;
        
        foreach ($peserta as $result) {
          $p++;
        }

        return view('admin.dashboard', ['user' => $user, 'users' => $users, 'rup' => $rup, 'tender' => $tender, 'nontender' => $nontender, 'peserta' => $p]);
        // dd($users[1]->roles);
    }
}
