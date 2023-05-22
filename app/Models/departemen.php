<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{

    protected $guarded = [];

    public function bagians()
    {
        return $this->hasMany('App\Models\bagian_dept');
    }

    public function npps()
    {
        return $this->hasMany('App\StokSparepart\npp');
    }


}
