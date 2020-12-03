<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Auth;

use App\User;
use App\Mahasiswa;
use App\TugasAkhir;

use App\Imports\MahasiswaImport;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'Admin') {
            $mahasiswa = Mahasiswa::all();
            return view('mahasiswa.mahasiswa',['mahasiswa' => $mahasiswa]);
        }
        if(Auth::user()->role == 'Koordinator') {
            $mahasiswa = Mahasiswa::all();
            return view('mahasiswa.mahasiswa',['mahasiswa' => $mahasiswa]);
        }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Admin') {
            return view('mahasiswa.tambah');
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
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            ]);
            
            //Insert ke table User
            $user = new User;
            $user->role = 'Mahasiswa';
            $user->name = $request->nama;
            $user->username = $request->nim;
            $user->email = $request->email;
            $user->password = bcrypt ($request->nim);
            $user->remember_token = str_random(60);
            $user->save();
            
            // Insert ke table Mahasiswa
            $request->request->add(['user_id' => $user->id]); 
            $mahasiswa = Mahasiswa::create($request->all());
            
            Alert::success('Berhasil', 'Data telah ditambahkan');
            return redirect()->route('mahasiswa.index');
        }
        
        /**
         * Display the specified resource.
         *
         * @param  \App\Mahasiswa  $mahasiswa
         * @return \Illuminate\Http\Response
         */
        public function show(Mahasiswa $mahasiswa)
        {
            if(Auth::user()->role == 'Admin') {
                return view('mahasiswa.detail',['mahasiswa' => $mahasiswa ]);
            }
            Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
            return back();
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Mahasiswa  $mahasiswa
         * @return \Illuminate\Http\Response
         */
        public function edit(Mahasiswa $mahasiswa)
        {
            if(Auth::user()->role == 'Admin') {
                return view('mahasiswa.edit' , ['mahasiswa' => $mahasiswa]);
            }
            Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
            return back();
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Mahasiswa  $mahasiswa
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Mahasiswa $mahasiswa)
        {
            $mahasiswa->user->name = $request->nama; 
            $mahasiswa->user->email = $request->email;
            
            $mahasiswa->nama = $request->nama;
            $mahasiswa->angkatan = $request->angkatan;
            $mahasiswa->status = $request->status;
            $mahasiswa->push();
            
            Alert::success('Berhasil', 'Data telah dirubah');
            return redirect()->route('mahasiswa.index');
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Mahasiswa  $mahasiswa
         * @return \Illuminate\Http\Response
         */
        public function destroy(Mahasiswa $mahasiswa)
        {
            //
        }

        public function exportExcel()
        {
            return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
        }

        public function importExcel(Request $request)
        {
            // validasi
            // $this->validate($request, [
            //     'file' => 'required|mimes:csv,xls,xlsx'
            // ]);

            Excel::import(new MahasiswaImport,$request->file('importMahasiswa'));

            alert()->success('Berhasil','Data telah diimport');
            return back();
        }
}