<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aspirasi extends Model
{
    public function satkers()
    {
        return $this->hasOne('App\Satker', 'kd_satker_sirup', 'kd_satker');
    }

    public function pakets()
    {
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'ocid');
    }

    public function rups()
    {
        return $this->hasOne('App\RupPenyedia', 'kode_rup', 'ocid');
    }

    public function likes(){
        return $this->hasMany('App\AspirasiLike', 'id_aspirasi', 'id');
    }

    public function jumlah_komen($id){
        return DB::table('aspirasis')->where('id_sub', $id)->get();
    }

    public function sub_komens($id){
        return DB::table('aspirasis')->where('id_sub', $id)->get();
    }
}
