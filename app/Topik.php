<?php

namespace App;
use App\Dosen;

use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    protected $table = 'topik';
    protected $fillable = ['dosen_id', 'judul' , 'bidang' , 'deskripsi' , 'status'];

    /**
     * Method One To One 
     */
    public function dosen()
    {
    	return $this->belongsTo(Dosen::class);
    }
}
