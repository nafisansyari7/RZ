<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Auth;
use App\Topik;
use App\Dosen;

use App\Exports\TopikExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'Dosen'){
            $topik = Topik::where('dosen_id', Auth::user()->dosen->id)->get();
        } 
        elseif(Auth::user()->role == 'Mahasiswa'){
            Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
            return back();
        }
        else{
            $topik = Topik::get();
        }
        return view('topik.topik', compact('topik'));
        
        // $topik = Topik::orderBy('created_at', 'desc')->get();
        // return view('dosen.topik',['topik' => $topik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Dosen') {
            return view('topik.tambah');
            }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }
    
    public function tambahtopik()
    {
        if(Auth::user()->role == 'Admin') {
            $dosen = Dosen::get();
            return view('topik.tambahtopik', compact('dosen'));
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
            'dosen_id' => 'required',
            'judul' => 'required',
            'bidang' => 'required',
        ]);

        $topik = Topik::create([
            'dosen_id' => $request->get('dosen_id'),
            'judul' => $request->get('judul'),
            'bidang' => $request->get('bidang'),
            'status' => 'Belum Diambil',
            'deskripsi' => $request->get('deskripsi'),
        ]);
    
        Alert::success('Berhasil', 'Data telah ditambahkan');
        return redirect()->route('topik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topik $topik)
    {
        if(Auth::user()->role !== 'Mahasiswa') {
                return view('topik.detail',['topik' => $topik ]);
            }
            Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
            return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topik $topik)
    {
        if(Auth::user()->role !== 'Mahasiswa') {
            return view('topik.edit' , ['topik' => $topik]);
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
    public function update(Request $request, Topik $topik)
    {
        $topik->judul = $request->judul;
        $topik->bidang = $request->bidang;
        $topik->status = $request->status;
        $topik->deskripsi = $request->deskripsi;
        $topik->push();
        
        Alert::success('Berhasil', 'Data telah dirubah');
        return redirect()->route('topik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topik $topik)
    {
        if(Auth::user()->role == 'Dosen') {
            Topik::destroy($topik->id);
            alert()->success('Berhasil','Data telah dihapus');
            return redirect()->route('topik.index');
            }
        Alert::warning('Warning', 'Anda dilarang masuk ke area ini.');
        return back();
    }
    
    public function exportExcel()
    {
        $nama_file = 'rekap_topik_'.date('D, d-M-Y').'.xlsx';
        return Excel::download(new TopikExport, $nama_file);
    }
}
