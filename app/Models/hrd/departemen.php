<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{

    protected $guarded = [];

    public function bagians()
    {
        return $this->hasMany('App\Models\hrd\bagian_dept');
    }

    public function npps()
    {
        return $this->hasMany('App\StokSparepart\npp');
    }


}
