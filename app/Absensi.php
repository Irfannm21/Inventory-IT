<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $guarded = [];

    public function karyawan(){
        return $this->belongsTo('App\Karyawan');
    }
}
