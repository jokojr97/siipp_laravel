<?php

namespace App\Exports;

use App\NonTenderScrap;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NonTendersExport implements FromQuery, WithHeadings
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
        return NonTenderScrap::where('tahun_ang', $this->year);
    }

    public function headings(): array
    {
        return [
     		'id', 'kd_lelang', 'nama_paket', 'ocid', 'tanggal_pembuatan', 'keterangan', 'id_tahap', 'instansi', 'kd_satker', 'satker', 'jenis_pekerjaan', 'jenis_pekerjaan_str', 'metode_pengadaan', 'sumber_dana', 'tahun_ang', 'pagu', 'hps', 'lokasi', 'kualifikasi', 'peserta', 'npwp_peserta', 'harga_penawaran', 'harga_terkoreksi', 'hasil_negosiasi', 'pagu1', 'hps1', 'pemenang', 'paket1', 'alamat_pemenang', 'npwp_pemenang', 'hasil_negosiasi_pemenang','nama_kontraktor', 'alamat_kontraktor', 'npwp_kontraktor', 'penawaran_kontraktor', 'negosiasi_kontraktor'
        ];
    }
}
