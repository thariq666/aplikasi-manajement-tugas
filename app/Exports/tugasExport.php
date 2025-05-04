<?php

namespace App\Exports;

use App\Models\Tugas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class tugasExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'tugas'  =>  Tugas::with('user')->get(),
            'tanggal'  =>  now()->format('d-m-Y'),
            'jam'  =>  now()->format('H:i:s'),
        );
        return view('admin/tugas/excel', $data);
    }
}
