<?php

namespace App;
use App\Mahasiswa;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';
    protected $fillable = ['mahasiswa_id', 'transkrip', 'surat_pengajuan' , 'surat_pembimbing','verifikasi'];
    
    /**
     * Method One To One 
     */
    public function mahasiswa()
    {
    	return $this->belongsTo(Mahasiswa::class);
    }
}
