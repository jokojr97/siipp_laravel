<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotensiKorupsi extends Model
{
    protected $fillable = ['id_tender', 'ocid', 'tahun', 'nkt', 'p', 's', 'q', 'w', 'total'];

    public function detail(){
    	return $this->hasOne('App\LpseScrap', 'id', 'id_tender');
    }

    public function rup(){
    	return $this->hasOne('App\RupPenyedia', 'kode_rup', 'ocid');
    }
}
