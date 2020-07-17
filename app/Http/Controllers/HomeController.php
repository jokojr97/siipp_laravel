<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        if (Gate::allows('role-adminsuper')) {
            return redirect(route('adminsuper.dashboard.index'));
        }
        else if (Gate::allows('role-admin')) {
            return redirect(route('admin.dashboard.index'));
        }
        else if (Gate::allows('role-relawan')) {
            return redirect(route('relawan.dashboard.index'));
        }
        else if (Gate::allows('role-user')) {
            return redirect(route('user.dashboard.index'));
        }
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }
}
