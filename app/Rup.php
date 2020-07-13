<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rup extends Model
{
    public function satkers()
    {
        return $this->hasOne('App\Satker', 'kd_satker_sirup', 'id_satker');
    }
    public function isi()
    {
        return $this->hasOne('App\RupIsi', 'ocid', 'id_rup');
    }

}
