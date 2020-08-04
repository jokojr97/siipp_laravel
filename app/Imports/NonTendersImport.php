<?php

namespace App\Imports;

use App\NonTenderScrap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NonTendersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NonTenderScrap([
            'kd_lelang' => $row['kd_lelang'],
            'nama_paket' => $row['nama_paket'],
            'ocid' => $row['ocid'],
            'tanggal_pembuatan' => $row['tanggal_pembuatan'],
            'keterangan' => $row['keterangan'],
            'id_tahap' => $row['id_tahap'],
            'instansi' => $row['instansi'],
            'kd_satker' => $row['kd_satker'],
            'satker' => $row['satker'],
            'jenis_pekerjaan' => $row['jenis_pekerjaan'],
            'jenis_pekerjaan_str' => $row['jenis_pekerjaan_str'],
            'metode_pengadaan' => $row['metode_pengadaan'],
            'sumber_dana' => $row['sumber_dana'],
            'tahun_ang' => $row['tahun_ang'],
            'pagu' => $row['pagu'],
            'hps' => $row['hps'],
            'lokasi' => $row['lokasi'],
            'kualifikasi' => $row['kualifikasi'],
            'peserta' => $row['peserta'],
            'npwp_peserta' => $row['npwp_peserta'],
            'harga_penawaran' => $row['harga_penawaran'],
            'harga_terkoreksi' => $row['harga_terkoreksi'],
            'hasil_negosiasi' => $row['hasil_negosiasi'],
            'pagu1' => $row['pagu1'],
            'hps1' => $row['hps1'],
            'pemenang' => $row['pemenang'],
            'paket1' => $row['paket1'],
            'alamat_pemenang' => $row['alamat_pemenang'],
            'npwp_pemenang' => $row['npwp_pemenang'],
            'hasil_negosiasi_pemenang' => $row['hasil_negosiasi_pemenang']
        ]);
    }
}
