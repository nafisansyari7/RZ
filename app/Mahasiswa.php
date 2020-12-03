<?php

namespace App;
use App\User;
use App\TugasAkhir;
use App\Berkas;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['user_id', 'nim' , 'nama' , 'angkatan' , 'status'];

    /**
     * Method One To One 
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function berkas()
    {
        return $this->hasOne(Berkas::class);
    }

    public function isBerkas($id)
    {
        $mahasiswa = $this->with('berkas')->whereId($id)->first();
        if($mahasiswa->berkas === null){
            return false;
        }
        if($mahasiswa->berkas->verifikasi === "Sudah"){
            return true;
        } 
        return false;
    }
    public function isSudah($id)
    {
        $mahasiswa = $this->with('berkas')->whereId($id)->first();
        if($mahasiswa->berkas === null){
            return true;
        }
        return false;
    }
    public function isAktif($id)
    {
        $mahasiswa = $this;
        if($mahasiswa->status === "Aktif"){
            return true;
        } 
        return false;
    }

    /**
     * Method One To Many 
     */
    public function tugasakhir()
    {
    	return $this->hasMany(TugasAkhir::class);
    }
}
