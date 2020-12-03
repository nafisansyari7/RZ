<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\TugasAkhir;
use App\Berkas;
use App\Pembimbing;

use App\Exports\TugasAkhirExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mahasiswaTA()
    {
        if(Auth::user()->role == 'Mahasiswa'){
            $tugasakhir = TugasAkhir::where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        }
        return view('tugasakhir.mahasiswata' , ['tugasakhir'=> $tugasakhir]);
    }
    public function index()
    {
        if(Auth::user()->role !== 'Mahasiswa') {
            $tugasakhir = TugasAkhir::with(['pembimbing' => function($pembimbing){
                $pembimbing->with('dosen');
            }])->get();
            return view('tugasakhir.tugasakhir' , compact('tugasakhir'));
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
        $dosen = Dosen::where('kuota', '>', 0)->get();
        $mahasiswa = Mahasiswa::get();
        return view('tugasakhir.tambah', compact('dosen', 'mahasiswa'));
    }

    public function tambah()
    {
        if(Auth::user()->role == 'Admin') {
            $dosen = Dosen::where('kuota', '>', 0)->get();
            $mahasiswa = Mahasiswa::get();
            return view('tugasakhir.tambahta', compact('dosen', 'mahasiswa'));
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
        $this->validate($request, [
            'pembimbing' => 'required',
            'judul' => 'required',
            'bidang' => 'required',
            'no_hp' => 'required',
        ]);

        $tugasakhir = TugasAkhir::create([
            'mahasiswa_id' => $request->get('mahasiswa_id'),
            'judul' => $request->get('judul'),
            'bidang' => $request->get('bidang'),
            'no_hp' => $request->get('no_hp'),
            'status' => 'Proposal'
        ]);
        $tugasakhir->save();

        $pembimbing = new Pembimbing([
            'status' => $request->status1,
            'tugas_akhir_id' => $tugasakhir->id,
            'dosen_id' => $request->pembimbing,
        ]);
        $pembimbing->save();

        $co_pembimbing = new Pembimbing([
            'status' => $request->status2,
            'tugas_akhir_id' => $tugasakhir->id,
            'dosen_id' => $request->co_pembimbing,
        ]);
        $co_pembimbing->save();

        $dosen = Dosen::find($request->pembimbing);
        $dosen->kuota = $dosen->kuota - 1 ;
        $dosen->save();

        Alert::success('Berhasil', 'Data telah ditambahkan');
        return back();
    }

    public function upload(Request $request)
    {
        
        $this->validate($request, [
            'pembimbing' => 'required',
            'judul' => 'required',
            'bidang' => 'required',
            'no_hp' => 'required',
        ]);

        $tugasakhir = TugasAkhir::create([
            'mahasiswa_id' => $request->get('mahasiswa_id'),
            'judul' => $request->get('judul'),
            'bidang' => $request->get('bidang'),
            'no_hp' => $request->get('no_hp'),
            'status' => $request->get('status'),
            'tanggal_sempro' => $request->get('tanggal_sempro'),
            'tanggal_sidang' => $request->get('tanggal_sidang'),
            'pengumpulan_revisi' => $request->get('pengumpulan_revisi')
        ]);
        $tugasakhir->save();

        $pembimbing = new Pembimbing([
            'status' => $request->status1,
            'tugas_akhir_id' => $tugasakhir->id,
            'dosen_id' => $request->pembimbing,
        ]);
        $pembimbing->save();

        $co_pembimbing = new Pembimbing([
            'status' => $request->status2,
            'tugas_akhir_id' => $tugasakhir->id,
            'dosen_id' => $request->co_pembimbing,
        ]);
        $co_pembimbing->save();

        $dosen = Dosen::find($request->pembimbing);
        $dosen->kuota = $dosen->kuota - 1 ;
        $dosen->save();

        Alert::success('Berhasil', 'Data telah ditambahkan');
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TugasAkhir $tugasakhir)
    {
        return view('tugasakhir.detail',['tugasakhir' => $tugasakhir ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TugasAkhir $tugasakhir)
    {
        if(Auth::user()->role == 'Admin') {
            return view('tugasakhir.edit', ['tugasakhir' => $tugasakhir]);
        }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TugasAkhir $tugasakhir)
    {
        $tugasakhir->judul = $request->judul;
        $tugasakhir->bidang = $request->bidang;
        $tugasakhir->status = $request->status;
        $tugasakhir->catatan = $request->catatan;
        $tugasakhir->no_hp = $request->no_hp;
        $tugasakhir->tanggal_sempro = $request->tanggal_sempro;
        $tugasakhir->tanggal_sidang = $request->tanggal_sidang;
        $tugasakhir->pengumpulan_revisi = $request->pengumpulan_revisi;
        $tugasakhir->push();

        // $pembimbing = Pembimbing::findOrFail(dosen_id);
        // $dosen = Dosen::findOrFail(dosen_id)->find($tugasakhir->status('Selesai'));
        // $dosen->kuota = $dosen->kuota + 1 ;
        // $dosen->save();

        $pembimbing = Pembimbing::whereTugasAkhirId($request->id)->first();
        if($request->status==='Selesai'){
            $dosen = Dosen::findOrFail($pembimbing->dosen_id);
            if($dosen->kuota<4) {
            $dosen->kuota = $dosen->kuota + 1;
            $dosen->save();
            }

            $mahasiswa = Mahasiswa::find($tugasakhir->mahasiswa_id);
            $mahasiswa->status = 'Lulus';
            $mahasiswa->save();
        }

        Alert::success('Berhasil', 'Data telah dirubah');
        return redirect()->route('tugasakhir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TugasAkhir $tugasakhir)
    {
        //
    }

    public function pendaftaran(TugasAkhir $tugasakhir)
    {
        $tugasakhir = TugasAkhir::where('status', 'mendaftar')->get();
        return view('tugasakhir.pendaftaran' , ['tugasakhir'=>$tugasakhir]);
    }

    public function uploadBerkas(TugasAkhir $tugasakhir)
    {
        $tugasakhir = TugasAkhir::where('status', 'mendaftar')->get();
        return view('tugasakhir.berkas' , ['tugasakhir'=>$tugasakhir]);
    }

    public function storeBerkas(Request $request, TugasAkhir $tugasakhir)
    {
        $this->validate($request, [
			'transkrip' => 'required',
			'surat_pengajuan' => 'required',
			'surat_pembimbing' => 'required',
		]);

        if($request->file('transkrip')) {
            $file = $request->file('transkrip');
            $folder = 'images/pendaftaran/transkrip';
            $file->move($folder,$file->getClientOriginalName());
        }
        if($request->file('surat_pengajuan')) {
            $file = $request->file('surat_pengajuan');
            $folder = 'images/pendaftaran/surat_pengajuan';
            $file->move($folder,$file->getClientOriginalName());
        }
        if($request->file('surat_pembimbing')) {
            $file = $request->file('surat_pembimbing');
            $folder = 'images/pendaftaran/surat_pembimbing';
            $file->move($folder,$file->getClientOriginalName());
        }

        //Insert ke table Berkas
        $berkas = new Berkas;
        $berkas->transkrip = $request->transkrip;
        $berkas->surat_pengajuan = $request->surat_pengajuan;
        $berkas->surat_pembimbing = $request->surat_pembimbing;
        $berkas->save();

        // Insert ke table Tugas Akhir
        $request->request->add(['berkas_id' => $berkas->id]);
        $tugasakhir = TugasAkhir::create($request->all());
        
        Alert::success('Berhasil', 'Berkas telah diupload');
        return redirect()->route('tugasakhir.create');
    }

    public function exportExcel()
    {
        $nama_file = 'rekap_tugasakhir_'.date('D, d-M-Y').'.xlsx';
        return Excel::download(new TugasAkhirExport, $nama_file);
    }
}
