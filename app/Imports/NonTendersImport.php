<?php

namespace App\Imports;

use App\NonTenderScrap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NonTendersImport implements ToModel, WithHeadingRow
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
            'tahap_tender' => $row['tahap_tender'],
            'instansi' => $row['instansi'],
            'satker' => $row['satker'],
            'jenis_pekerjaan' => $row['jenis_pekerjaan'],
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
            'hasil_negosiasi_pemenang' => $row['hasil_negosiasi_pemenang'],
            'nama_kontraktor' => $row['nama_kontraktor'],
            'alamat_kontraktor' => $row['alamat_kontraktor'],
            'npwp_kontraktor' => $row['npwp_kontraktor'],
            'penawaran_kontraktor' => $row['penawaran_kontraktor'],
            'negosiasi_kontraktor'=> $row['negosiasi_kontraktor']
        ]);
    }
}
