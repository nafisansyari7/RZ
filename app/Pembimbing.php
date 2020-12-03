<?php

namespace App;
use App\Dosen;
use App\Mahasiswa;
use App\TugasAkhir;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    protected $table = 'dosen_tugasakhir';
    protected $fillable = ['dosen_id', 'tugas_akhir_id' , 'status'];

    /**
     * Method One To One 
     */
    public function dosen()
    {
    	return $this->belongsTo(Dosen::class);
    }
    public function tugasakhir()
    {
    	return $this->belongsTo(TugasAkhir::class);
    }
}
