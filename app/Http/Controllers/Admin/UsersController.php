<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\RoleUsers;

class UsersController extends Controller
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
        $users = User::paginate(10);

        return view('admin.users.index', ['user' => $user, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $useredit = $request->segment(3);
        $usr = User::where('id', $useredit)->first();
        $roles = Role::orderBy('id', 'desc')->get();
        return view('admin.users.edit', ['user' => $user, 'useredit' => $usr, 'roles' => $roles]);
        // dd($useredit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($user);
        $request->validate([
            'email' => 'required',
            'name' => 'required'
        ]);

        User::where('id', $user->id)
        ->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        $role = RoleUsers::where('user_id', $user->id)->first();

        if ($role) {
            RoleUsers::where('user_id', $user->id)
            ->update([
                'role_id' => $request->role,
            ]);
        }else {
            RoleUsers::create([
                'role_id' => $request->role,
                'user_id' => $request->userid
            ]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Berhasil Edit User!!!');
    }

    public function create() {
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $roles = Role::orderBy('id', 'desc')->get();

        return view('admin.users.create', ['user' => $user, 'roles' => $roles]);
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'newpassword' => 'required|same:confirmpassword|min:8',
            'confirmpassword' => 'required|same:newpassword|min:8'
        ]);

        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $verify = date("Y-m-d h:i:s");
        $usr = User::where('email', $request->email)->first();

        if ($usr) {
            return redirect()->route('admin.users.create')->with('failed', 'Email Sudah digunakan!!!');
        }else {
            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => $verify,
                'password' => Hash::make($request->newpassword),
            ]);

            if (isset($request->role)) {
                $role = $request->role;
            }else {
                $role = 4;
            }

            $user = User::latest()->first();
            RoleUsers::create(['role_id' => $role, 'user_id' => $user->id]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
