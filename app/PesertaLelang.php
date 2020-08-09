<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaLelang extends Model
{
    protected $fillable = [
    	'kd_lelang', 'penawaran', 'npwp', 'peserta', 'ocid', 'harga_terkoreksi', 'tahun'
    ];

    public function paket()
    {
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'ocid');
    }

    public function tender()
    {
        return $this->hasOne('App\LpseScrap', 'id_rup', 'ocid');
    }

    public function nontender()
    {
        return $this->hasOne('App\LpseScrap', 'ocid', 'ocid');
    }
}
