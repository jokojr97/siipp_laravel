<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\LpseScrap;
use App\RupPenyedia;
use App\RoleUsers;

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

        $users = RoleUsers::where('role_id', 4)->get();
        $rup = RupPenyedia::where('tahun', 2020)->where('status_aktif', 'ya')->where('status_umumkan', 'sudah')->count();
        $tender = LpseScrap::where('tahun_ang', 2020)->count();
        return view('admin.dashboard', ['user' => $user, 'users' => $users, 'rup' => $rup, 'tender' => $tender]);
        // dd($users[1]->roles);
    }
}
