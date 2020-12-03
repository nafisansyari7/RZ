<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuan extends Model
{
    protected $table = 'dokumen';
    protected $fillable = ['berkas', 'keterangan'];
    
}
