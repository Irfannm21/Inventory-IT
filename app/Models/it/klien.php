<?php

namespace App\Models\it;

use Illuminate\Database\Eloquent\Model;

class klien extends Model
{
    protected $guarded = [];

    public function printer()
    {
        return $this->belongsTo('App\Models\it\printer');
    }

    public function karyawan()
    {
        return $this->belongsTo('App\master_karyawans');
    }

    public function komputer()
    {
        return $this->belongsTo('App\Models\it\komputer');
    }

}
