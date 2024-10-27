<?php

namespace App\Exports;

use App\Models\Tdl;
use Maatwebsite\Excel\Concerns\FromCollection;

class TdlsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tdl::all();
    }
}
