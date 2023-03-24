<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TableBarangJaringan extends Model
{
    protected $guarded = [];

    public function perbaikans()
    {
        return $this->morphMany('App\Perbaikan', 'hardwareable');
    }
}
