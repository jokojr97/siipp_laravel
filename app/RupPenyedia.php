<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RupPenyedia extends Model
{
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
