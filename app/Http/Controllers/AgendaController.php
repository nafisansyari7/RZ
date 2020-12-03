<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\TugasAkhir;
use App\Pembimbing;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::get();
        return view('agenda.agenda',compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugasakhir = TugasAkhir::get();
        return view('agenda.tambah',compact('tugasakhir'));
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
            'tugasakhir_id' => 'required',
            'waktu' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'ruang' => 'required',
        ]);

        $agenda = Agenda::create([
            'tugasakhir_id' => $request->get('tugasakhir_id'),
            'waktu' => $request->get('waktu'),
            'tanggal' => $request->get('tanggal'),
            'ruang' => $request->get('ruang'),
            'status' => $request->get('status'),
        ]);
        $agenda->save();
        
        Alert::success('Berhasil', 'Agenda telah ditambahkan');
        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $tugasakhir = TugasAkhir::get();
        return view('agenda.edit' ,compact('tugasakhir','agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $agenda->waktu = $request->waktu;
        $agenda->tanggal = $request->tanggal;
        $agenda->status = $request->status;
        $agenda->ruang = $request->ruang;
        $agenda->push();
        
        Alert::success('Berhasil', 'Agenda telah dirubah');
        return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->id);
        alert()->success('Berhasil','Agenda telah dihapus');
        return redirect()->route('agenda.index');
    }
}
