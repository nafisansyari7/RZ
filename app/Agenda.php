<?php

namespace App;
use App\TugasAkhir;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['waktu', 'tanggal' , 'status' , 'ruang' , 'tugasakhir_id'];

    public function tugasakhir()
    {
    	return $this->belongsTo(TugasAkhir::class);
    }
}
