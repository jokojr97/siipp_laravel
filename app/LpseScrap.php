<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LpseScrap extends Model
{
	protected $fillable = ['id', 'kode_lelang', 'nama_paket', 'id_rup', 'nama_rup', 'sumber_dana', 'tanggal_pembuatan', 'lingkup_pekerjaan', 'keterangan', 'tahap_tender', 'instansi', 'satker', 'kategori', 'sistem_pengadaan', 'tahun_anggaran', 'tahun_ang', 'cara_pembayaran', 'lokasi', 'kualifikasi_usaha', 'peserta', 'nama_pemenang', 'alamat_pemenang', 'npwp_pemenang',' harga_penawaran', 'harga_terkoreksi', 'hasil_negosiasi', 'pagu', 'hps', 'nama_kontraktor', 'alamat_kontraktor', 'npwp_kontraktor', 'penawaran_kontraktor', 'negosiasi_kontraktor'];
	
    public function rups(){
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'id_rup');	
    }
}
