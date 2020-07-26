<?php

namespace App\Imports;

use App\LpseScrap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TendersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LpseScrap([
            'kode_lelang' => $row['kode_lelang'],
            'nama_paket' => $row['nama_paket'],
            'id_rup' => $row['id_rup'],
            'nama_rup' => $row['nama_rup'],
            'sumber_dana' => $row['sumber_dana'],
            'tanggal_pembuatan' => $row['tanggal_pembuatan'],
            'lingkup_pekerjaan' => $row['lingkup_pekerjaan'],
            'keterangan' => $row['keterangan'],
            'tahap_tender' => $row['tahap_tender'],
            'instansi' => $row['instansi'],
            'satker' => $row['satker'],
            'kategori' => $row['kategori'],
            'sistem_pengadaan' => $row['sistem_pengadaan'],
            'tahun_anggaran' => $row['tahun_anggaran'],
            'tahun_ang' => $row['tahun_ang'],
            'cara_pembayaran' => $row['cara_pembayaran'],
            'lokasi' => $row['lokasi'],
            'kualifikasi_usaha' => $row['kualifikasi_usaha'],
            'peserta' => $row['peserta'],
            'nama_pemenang' => $row['nama_pemenang'],
            'alamat_pemenang' => $row['alamat_pemenang'],
            'npwp_pemenang' => $row['npwp_pemenang'],
            'harga_penawaran' => $row['harga_penawaran'],
            'harga_terkoreksi' => $row['harga_terkoreksi'],
            'hasil_negosiasi' => $row['hasil_negosiasi'],
            'pagu' => $row['pagu'],
            'hps' => $row['hps'],
            'nama_kontraktor' => $row['nama_kontraktor'],
            'alamat_kontraktor' => $row['alamat_kontraktor'],
            'npwp_kontraktor' => $row['npwp_kontraktor'],
            'penawaran_kontraktor' => $row['penawaran_kontraktor'],
            'negosiasi_kontraktor' => $row['negosiasi_kontraktor'],
        ]);
    }
}
