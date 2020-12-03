<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Auth;

use App\User;
use App\Dosen;
use App\Topik;
use App\TugasAkhir;

use App\Imports\DosenImport;
use App\Exports\DosenExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $dosen = Dosen::all();
            return view('dosen.dosen',['dosen' => $dosen]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Admin') {
            return view('dosen.tambah');
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
            'nidn' => 'required',
            'nama' => 'required',
        ]);
        
        //Insert ke table User
        $user = new User;
        $user->role = 'Dosen';
        $user->name = $request->nama;
        $user->username = $request->nidn;
        $user->email = $request->email;
        $user->password = bcrypt ($request->nidn);
        $user->remember_token = str_random(60);
        $user->save();

        // Insert ke table Dosen
        $request->request->add(['user_id' => $user->id]); 
        $dosen = Dosen::create($request->all());

        Alert::success('Berhasil', 'Data telah ditambahkan');
        return redirect()->route('dosen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        if(Auth::user()->role == 'Admin') {
                return view('dosen.detail',['dosen' => $dosen ]);
            }
            Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
            return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        if(Auth::user()->role == 'Admin') {
                return view('dosen.edit' , ['dosen' => $dosen]);
            }
            Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
            return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $dosen->user->name = $request->nama; 
        $dosen->user->email = $request->email;

        $dosen->nama = $request->nama;
        $dosen->nip = $request->nip;
        $dosen->kuota = $request->kuota;
        $dosen->push();

        Alert::success('Berhasil', 'Data telah dirubah');
        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        if(Auth::user()->role == 'Admin') {
            Dosen::destroy($dosen->id);
            alert()->success('Berhasil','Data telah dihapus');
            return redirect()->route('dosen.index');
        }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }

    public function exportExcel()
        {
            return Excel::download(new DosenExport, 'dosen.xlsx');
        }

        public function importExcel(Request $request)
        {
            // validasi
            // $this->validate($request, [
            //     'file' => 'required|mimes:csv,xls,xlsx'
            // ]);

            Excel::import(new DosenImport,$request->file('importDosen'));

            alert()->success('Berhasil','Data telah diimport');
            return back();
        }
}