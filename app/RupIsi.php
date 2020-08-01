<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RupIsi extends Model
{
    protected $fillable = ['ocid', 'tahun', 'ada'];

    public function detail()
    {
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'ocid');
    }

    
}
