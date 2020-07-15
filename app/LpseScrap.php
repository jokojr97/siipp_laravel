<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LpseScrap extends Model
{
    public function rups(){
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'id_rup');	
    }

    
}
