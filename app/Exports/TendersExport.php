<?php

namespace App\Exports;

use App\LpseScrap;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TendersExport implements FromQuery, WithHeadings
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
        return LpseScrap::where('tahun_ang', $this->year);
    }

    public function headings(): array
    {
        return [
     		'id', 'kode_lelang', 'nama_paket', 'id_rup', 'nama_rup', 'sumber_dana', 'tanggal_pembuatan', 'lingkup_pekerjaan', 'keterangan', 'tahap_tender', 'instansi', 'satker', 'kategori', 'sistem_pengadaan', 'tahun_anggaran', 'tahun_ang', 'cara_pembayaran', 'lokasi', 'kualifikasi_usaha', 'peserta', 'nama_pemenang', 'alamat_pemenang', 'npwp_pemenang',' harga_penawaran', 'harga_terkoreksi', 'hasil_negosiasi', 'pagu', 'hps', 'nama_kontraktor', 'alamat_kontraktor', 'npwp_kontraktor', 'penawaran_kontraktor', 'negosiasi_kontraktor'
        ];
    }
}
