<?php

namespace App\Exports;

use App\TugasAkhir;
use Maatwebsite\Excel\Concerns\FromCollection;

class TugasAkhirExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TugasAkhir::all();
    }
}
