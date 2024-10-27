<?php

namespace App\Http\Controllers;

use App\Models\Tdl;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function keluarkan()
    {
        $tdls = Tdl::get();
        $data = [
            'title' => 'This Is Your TDL Data List',
            'tdls' => $tdls,
        ];
        $pdf = Pdf::loadView('fileoverview', $data);
        return $pdf->download('tdlist.pdf');
    }
}
