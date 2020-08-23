<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\LpseScrap;
use App\RupPenyedia;
use App\RoleUsers;
use App\NonTenderScrap;
use App\PesertaLelang;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
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

        return view('user.dashboard', ['user' => $user, 'users' => $users, 'rup' => $rup, 'tender' => $tender, 'nontender' => $nontender, 'peserta' => $p]);
    }

}
