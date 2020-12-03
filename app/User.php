<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username' , 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mahasiswa()
    {
       return $this->hasOne(Mahasiswa::class);
    }

    public function dosen()
    {
       return $this->hasOne(Dosen::class);
    }
    public function isBerkas()
    {
        $id = Auth::user()->mahasiswa->id;
        return $this->mahasiswa->isBerkas($id);
    }
    public function isSudah()
    {
        $id = Auth::user()->mahasiswa->id;
        return $this->mahasiswa->isSudah($id);
    }
    public function isTugasAkhir()
    {
        $tugas = new TugasAkhir;
        $id = Auth::user()->mahasiswa->id;
        return $tugas->isTugasAkhir($id);
    }
    public function isAktif()
    {
        $id = Auth::user()->mahasiswa->id;
        return $this->mahasiswa->isAktif($id);
    }
}