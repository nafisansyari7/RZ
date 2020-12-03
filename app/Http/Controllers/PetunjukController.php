<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetunjukController extends Controller
{
    public function manual()
    {
        return view('user.petunjuk');
        
    }
}
