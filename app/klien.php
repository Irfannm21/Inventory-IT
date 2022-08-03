<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class klien extends Model
{
    protected $guarded = [];

    public function printer()
    {
        return $this->belongsTo('App\printer');
    }

    public function karyawan()
    {
        return $this->belongsTo('App\master_karyawans');
    }

    public function komputer()
    {
        return $this->belongsTo('App\komputer');
    }

}
