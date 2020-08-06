<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonTenderScrap extends Model
{
    protected $fillable = [
    	'kd_lelang', 'nama_paket', 'ocid', 'tanggal_pembuatan', 'keterangan', 'tahap_tender', 'instansi', 'satker', 'jenis_pekerjaan', 'metode_pengadaan', 'sumber_dana', 'tahun_ang', 'pagu', 'hps', 'lokasi', 'kualifikasi', 'peserta', 'npwp_peserta', 'harga_penawaran', 'harga_terkoreksi', 'hasil_negosiasi', 'pagu1', 'hps1', 'pemenang', 'paket1', 'alamat_pemenang', 'npwp_pemenang', 'hasil_negosiasi_pemenang', 'nama_kontraktor', 'alamat_kontraktor', 'npwp_kontraktor', 'penawaran_kontraktor', 'negosiasi_kontraktor'
    ];

    public function detail()
    {
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'ocid');
    }
}
