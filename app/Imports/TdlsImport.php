<?php

namespace App\Imports;

use App\Models\Tdl;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class TdlsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tdl([
            'day'     => $row[1],
            'goal'    => $row[2],
            'time' => $row[3],
            'status' => $row[4],
        ]);
    }
}


