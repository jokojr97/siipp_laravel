<?php

namespace App\Exports;

use App\RupPenyedia;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RupsExport implements FromQuery, WithHeadings
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
        return RupPenyedia::where('tahun', $this->year);
    }

    public function headings(): array
    {
        return [
            'id', 'mak', 'kdli', 'tkdn', 'umkm', 'jenis', 'volume', 'lokasi', 'program', 'pradipa', 'nip_ppk', 'nip_kpa', 'kode_rup', 'kegiatan', 'pagu_rup', 'nama_kpa', 'nama_ppk', 'kode_kdli', 'id_satker', 'id_client', 'deskripsi', 'nama_paket', 'nama_satker', 'sumber_dana', 'spesifikasi', 'id_swakelola', 'status_aktif', 'detail_lokasi', 'awal_pengadaan', 'awal_pekerjaan', 'status_umumkan', 'jenis_pengadaan', 'akhir_pengadaan', 'akhir_pekerjaan', 'kode_satker_asli', 'metode_pemilihan', 'tanggal_kebutuhan', 'kode_string_program', 'kode_string_kegiatan', 'pagu_perjenis_pengadaan', 'tanggal_terakhir_update', 'penyedia_didalam_swakelola', 'tahun', 'create_at', 'update_at'
        ];
    }

}
