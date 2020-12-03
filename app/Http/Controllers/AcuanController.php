<?php

namespace App\Http\Controllers;

use App\Acuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use Carbon\Carbon;

class AcuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acuan = Acuan::get();
        return view('dokumen.dokumen',compact('acuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumen.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'berkas' => 'required|mimes:pdf',
            'keterangan' => 'required',
        ]);
        if($request->file('berkas')) {
            $fileBerkas = $request->file('berkas');
            $folderBerkas = 'dokumen';
            $dt = Carbon::now();
            $fileNameBerkas = $fileBerkas->getClientOriginalName();
            $pedoman = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$fileNameBerkas;
            $fileBerkas->move($folderBerkas, $pedoman);
        }

        //Insert ke table Berkas
        $acuan = new acuan;
        $acuan->keterangan = $request->keterangan;
        $acuan->berkas = $pedoman;
        $acuan->save();
        
        Alert::success('Berhasil', 'Berkas telah diupload');
        return redirect()->route('acuan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acuan  $acuan
     * @return \Illuminate\Http\Response
     */
    public function show(Acuan $acuan)
    {
        return view('dokumen.detail',['acuan' => $acuan ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acuan  $acuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Acuan $acuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acuan  $acuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acuan $acuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acuan  $acuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acuan $acuan)
    {
        Acuan::destroy($acuan->id);
        // unlink('localhost/laravel/public/dokumen/'.$acuan->berkas);
        Alert::success('Berhasil', 'Berkas telah dihapus');
        return redirect()->back();

        // $acuan = Acuan::findOrFail($acuan);
        // $path = public_path().'dokumen/'.$acuan->berkas;
        // unlink($path);
        // $acuan->delete();
        // Alert::success('Berhasil', 'Berkas telah dihapus');
        // return back();
    }
}
