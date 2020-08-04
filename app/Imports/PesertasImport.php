<?php

namespace App\Imports;

use App\PesertaLelang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PesertasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PesertaLelang([
            'kd_lelang' => $row['kd_lelang'],
            'penawaran' => $row['penawaran'],
            'npwp' => $row['npwp'],
            'peserta' => $row['peserta'],
            'ocid' => $row['ocid'],
            'harga_terkoreksi' => $row['harga_terkoreksi'],
            'tahun' => $row['tahun']
        ]);
    }
}
