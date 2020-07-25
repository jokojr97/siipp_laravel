<?php

namespace App\Imports;

use App\RupPenyedia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RupsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RupPenyedia([
            'mak' => $row['mak'],
            'kdli' => $row['kdli'],
            'tkdn' => $row['tkdn'],
            'umkm' => $row['umkm'],
            'jenis' => $row['jenis'],
            'volume' => $row['volume'],
            'lokasi' => $row['lokasi'],
            'program' => $row['program'],
            'pradipa' => $row['pradipa'],
            'nip_ppk' => $row['nip_ppk'],
            'nip_kpa' => $row['nip_kpa'],
            'kode_rup' => $row['kode_rup'],
            'kegiatan' => $row['kegiatan'],
            'pagu_rup' => $row['pagu_rup'],
            'nama_kpa' => $row['nama_kpa'],
            'nama_ppk' => $row['nama_ppk'],
            'kode_kdli' => $row['kode_kdli'],
            'id_satker' => $row['id_satker'],
            'id_client' => $row['id_client'],
            'deskripsi' => $row['deskripsi'],
            'nama_paket' => $row['nama_paket'],
            'nama_satker' => $row['nama_satker'],
            'sumber_dana' => $row['sumber_dana'],
            'spesifikasi' => $row['spesifikasi'],
            'id_swakelola' => $row['id_swakelola'],
            'status_aktif' => $row['status_aktif'],
            'detail_lokasi' => $row['detail_lokasi'],
            'awal_pengadaan' => $row['awal_pengadaan'],
            'awal_pekerjaan' => $row['awal_pekerjaan'],
            'status_umumkan' => $row['status_umumkan'],
            'jenis_pengadaan' => $row['jenis_pengadaan'],
            'akhir_pengadaan' => $row['akhir_pengadaan'],
            'akhir_pekerjaan' => $row['akhir_pekerjaan'],
            'kode_satker_asli' => $row['kode_satker_asli'],
            'metode_pemilihan' => $row['metode_pemilihan'],
            'tanggal_kebutuhan' => $row['tanggal_kebutuhan'],
            'kode_string_program' => $row['kode_string_program'],
            'kode_string_kegiatan' => $row['kode_string_kegiatan'],
            'pagu_perjenis_pengadaan' => $row['pagu_perjenis_pengadaan'],
            'tanggal_terakhir_update' => $row['tanggal_terakhir_update'],
            'penyedia_didalam_swakelola' => $row['penyedia_didalam_swakelola'],
            'tahun' => $row['tahun']
        ]);
    }
}
