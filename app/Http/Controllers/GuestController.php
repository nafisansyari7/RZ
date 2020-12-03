<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Dosen;
use App\Mahasiswa;
use App\Topik;
use App\Berkas;
use App\TugasAkhir;
use App\Pembimbing;
use App\Acuan;
use App\Agenda;

class GuestController extends Controller
{
    public function index()
    {
        $tugasakhir = TugasAkhir::get();
        $mahasiswa = Mahasiswa::get();
        $berkas = Berkas::get();
        return view('index', compact('tugasakhir','mahasiswa','berkas'));
    }

    public function download()
    {
        $acuan = Acuan::get();
        return view('guest.download', compact('acuan'));
    }

    public function downloadFile()
    {
        $acuan = Acuan::find($acuan);
        return Storage::download($acuan->berkas, $acuan->keterangan);
    }

    public function topik()
    {
        $topik = Topik::get();
        return view('guest.topik', compact('topik'));
    }
    
    public function showTopik($topik)
    {
        $topik = Topik::find($id);
        return response()->json($topik);
    }

    public function pencarian()
    {
        $tugasakhir = TugasAkhir::get();
        return view('guest.pencarian',compact('tugasakhir'));
    }

    public function seminar()
    {
        $agenda = Agenda::where('status','Seminar Proposal')->get();
        return view('guest.seminar',compact('agenda'));
    }

    public function sidang()
    {
        $agenda = Agenda::where('status','Sidang Tugas Akhir')->get();
        return view('guest.sidang',compact('agenda'));
    }
}
