<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
	protected $fillable = ['id_user', 'ocid', 'kd_satker', 'nama_paket', 'images', 'tahun_anggaran', 'persentase', 'keterangan', 'tanggal', 'status', 'uploader', 'anonim'];

    public function paket()
    {
        return $this->hasOne('App\LpseScrap', 'id_rup', 'ocid');
    }

    public function rup()
    {
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'ocid');
    }
}
