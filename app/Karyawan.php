<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $guarded = [];

    public function absensis(){
        return $this->hasMany('App\Absensi');
    }

    public function klien()
    {
        return $this->hasOne('App\klien');
    }
}
