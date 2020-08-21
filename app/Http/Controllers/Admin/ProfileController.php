<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        return view('admin.profile.index', ['user' => $user]);        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required'
        ]);

        if ($request->newpassword || $request->confirmpassword) {
            // jika ada password baru
            if ($request->oldpassword) {
                // password lama diisi
                $user = User::where('id', $request->userid)->first();
                if ($user->password == Hash::make($request->oldpassword)) {
                    // jika password lama sama
                    if ($request->newpassword == $request->confirmpassword) {
                        User::where('id', $request->userid)
                        ->update([
                            'email' => $request->email,
                            'name' => $request->name,
                            'password' => Hash::make($request->newpassword),
                        ]);
                        return redirect()->route('admin.profile.edit')->with('success', 'Berhasil update profile!!!');  
                    }else {
                        // password tidak sama
                        return redirect()->route('admin.profile.edit')->with('failed', 'Konfirmasi password tidak sesuai!!!');
                    }
                }else {
                    // jika password lama tidak sama
                    return redirect()->route('admin.profile.edit')->with('failed', 'Password lama tidak sesuai!!!');
                }
            }else {
                //password lama kosong
                return redirect()->route('admin.profile.edit')->with('failed', 'Password lama tidak sesuai!!!');
            }
        }else if($request->oldpassword && !$request->newpassword){
            return redirect()->route('admin.profile.edit')->with('failed', 'Password baru kosong!!!');
        }else {
            // edit nama dan email saja
            User::where('id', $request->userid)
            ->update([
                'email' => $request->email,
                'name' => $request->name,
            ]);

            return redirect()->route('admin.profile.edit')->with('success', 'Berhasil update profile!!!');  
        }
    }

}
