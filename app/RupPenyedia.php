<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RupPenyedia extends Model
{
    protected $fillable = [
        'mak', 'kdli', 'tkdn', 'umkm', 'jenis', 'volume', 'lokasi', 'program', 'pradipa', 'nip_ppk', 'nip_kpa', 'kode_rup', 'kegiatan', 'pagu_rup', 'nama_kpa', 'nama_ppk', 'kode_kdli', 'id_satker', 'id_client', 'deskripsi', 'nama_paket', 'nama_satker', 'sumber_dana', 'spesifikasi', 'id_swakelola', 'status_aktif', 'detail_lokasi', 'awal_pengadaan', 'awal_pekerjaan', 'status_umumkan', 'jenis_pengadaan', 'akhir_pengadaan', 'akhir_pekerjaan', 'kode_satker_asli', 'metode_pemilihan', 'tanggal_kebutuhan', 'kode_string_program', 'kode_string_kegiatan', 'pagu_perjenis_pengadaan', 'tanggal_terakhir_update', 'penyedia_didalam_swakelola', 'tahun' ];

    public function satkers()
    {
        return $this->hasOne('App\Satker', 'kd_satker_sirup', 'id_satker');
    }

    public function isi()
    {
        return $this->hasOne('App\RupIsi', 'ocid', 'kode_rup');
    }

    public function tenders(){
        return $this->hasOne('App\LpseScrap', 'id_rup', 'kode_rup');	
    }

    public function nontenders(){
        return $this->hasOne('App\NonTenderScrap', 'ocid', 'kode_rup');	
    }

}
