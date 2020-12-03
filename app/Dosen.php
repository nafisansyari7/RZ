<?php

namespace App;
use App\Topik;
use App\User;
use App\Pembimbing;
use App\TugasAkhir;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $fillable = ['user_id', 'nama' , 'nidn' , 'nip' , 'kuota'];

    /**
     * Method One To One 
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Method One To Many 
     */

    public function topik()
    {
        return $this->hasOne(Topik::class);
    }

    public function pembimbing(){return $this->hasMany(Pembimbing::class);}
    public function tugasakhir(){return $this->belongsTo(TugasAkhir::class);}
    
    // public function tugasakhir(){return $this->belongsToMany(TugasAkhir::class)->withPivot('status');}
}
