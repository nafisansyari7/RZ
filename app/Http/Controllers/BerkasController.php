<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Response;
use Auth;
use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\TugasAkhir;
use App\Berkas;
use App\Pembimbing;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkas = Berkas::get();
        return view('berkas.berkas' , ['berkas'=>$berkas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Berkas $berkas)
    {
        // $data = Berkas::findOrFail($berkas);
        // if((Auth::user()->role == 'Mahasiswa') && (Auth::user()->mahasiswa->id != $data->mahasiswa_id)){
        //     return view('berkas.tambah');
        // }
        return view('berkas.tambah');
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
            'transkrip' => 'required|mimes:pdf',
            'surat_pengajuan' => 'required|mimes:pdf',
            'surat_pembimbing' => 'required|mimes:pdf',
        ]);
        if($request->file('transkrip')) {
            $fileTranskrip = $request->file('transkrip');
            $folderTranskrip = 'pendaftaran/transkrip';
            $fileNameTranskrip = $fileTranskrip->getClientOriginalName();
            $fileTranskrip->move($folderTranskrip,$fileNameTranskrip);
        }
        if($request->file('surat_pengajuan')) {
            $filePengajuan = $request->file('surat_pengajuan');
            $folderPengajuan = 'pendaftaran/surat_pengajuan';
            $fileNamePengajuan = $filePengajuan->getClientOriginalName();
            $filePengajuan->move($folderPengajuan,$fileNamePengajuan);
        }
        if($request->file('surat_pembimbing')) {
            $filePembimbing = $request->file('surat_pembimbing');
            $folderPembimbing = 'pendaftaran/surat_pembimbing';
            $fileNamePembimbing = $filePembimbing->getClientOriginalName();
            $filePembimbing->move($folderPembimbing,$fileNamePembimbing);
        }

        //Insert ke table Berkas
        $berkas = new Berkas;
        $berkas->mahasiswa_id = $request->mahasiswa_id;
        $berkas->transkrip = $fileNameTranskrip;
        $berkas->surat_pengajuan = $fileNamePengajuan;
        $berkas->surat_pembimbing = $fileNamePembimbing;
        $berkas->verifikasi = 'Belum';
        $berkas->save();
        
        Alert::success('Berhasil', 'Berkas telah diupload');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Berkas $berkas
     * @return \Illuminate\Http\Response
     */
    public function show(Berkas $berkas)
    {
        if(Auth::user()->role == 'Admin') {
            return view('berkas.detail',['berkas' => $berkas ]);
        }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Berkas $berkas
     * @return \Illuminate\Http\Response
     */
    public function edit(Berkas $berkas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Berkas $berkas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berkas $berkas)
    {
        $berkas->update([
            'verifikasi' => 'Sudah'
        ]);
        Alert::success('Berhasil', 'Verifikasi selesai');
        return back();
    }
    public function salah(Request $request, Berkas $berkas)
    {
        $berkas->update([
            'verifikasi' => 'Salah'
        ]);
        Alert::success('Berhasil', 'Verifikasi selesai');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Berkas $berkas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berkas $berkas)
    {
        if(Auth::user()->role == 'Admin') {
            Berkas::destroy($berkas->id);
            alert()->success('Berhasil','Data telah dihapus');
            return back();
        }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }
}
