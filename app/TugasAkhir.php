<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mahasiswa;
use App\Dosen;
use App\Agenda;
use App\Pembimbing;

class TugasAkhir extends Model
{
    protected $table = 'tugasakhir';
    protected $fillable = ['judul', 'mahasiswa_id' , 'bidang' , 'status', 'no_hp' ];
    // public function getRouteKeyName()
    // {
    //     return 'judul';
    // }
    public function mahasiswa()
    {
    	return $this->belongsTo(Mahasiswa::class);
    }
    public function isTugasAkhir($id)
    {
        $mahasiswa = $this->whereMahasiswaId($id)->first();
        if($mahasiswa === null){
            return true;
        }
        return false;
    }
    

    public function agenda()
    {
        return $this->hasOne(Agenda::class);
    }
    public function pembimbing(){return $this->hasMany(Pembimbing::class);}
    public function dosen(){return $this->belongsTo(Dosen::class);}

}
