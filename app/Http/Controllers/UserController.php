<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Mahasiswa;
use App\Dosen;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('user.user', ['users' => $users]);
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Admin') {
            return view('user.tambah');
        }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert([
			'name' => $request->name,
			'username' => $request->username,
			'role' => $request->role,
			'email' => $request->email,
			'password' => $request->password
		]);
		
		return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }
    
    public function resetPassword(Request $request, User $user)
    {
        $user->update([
            'password' =>  bcrypt('tekniksipil')
        ]);
        Alert::success('Berhasil', 'Password telah direset');
        return back();
    }
    public function updateEmail(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required'
        ]);
        User::find(auth()->user()->id)->update(['email'=>$request->email]);
        Alert::success('Berhasil', 'Email telah diganti');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
