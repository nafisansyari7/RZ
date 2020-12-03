<?php

namespace App\Exports;

use App\Topik;
use Maatwebsite\Excel\Concerns\FromCollection;

class TopikExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Topik::all();
    }
}
