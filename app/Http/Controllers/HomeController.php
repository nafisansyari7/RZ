<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\Topik;
use App\TugasAkhir;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tugasakhir = TugasAkhir::all();
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        return view('admin.dashboard', compact('tugasakhir','mahasiswa','dosen'));
        
    }

    public function profil()
    {
        return view('auth.profil');
    }
}
