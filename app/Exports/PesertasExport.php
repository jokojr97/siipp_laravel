<?php

namespace App\Exports;

use App\PesertaLelang;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertasExport implements FromQuery, WithHeadings
{

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return PesertaLelang::where('tahun', $this->year);
    }

    public function headings(): array
    {
        return [
     		'id', 'kd_lelang', 'penawaran', 'npwp', 'peserta', 'ocid', 'harga_terkoreksi', 'tahun'
        ];
    }    
}
