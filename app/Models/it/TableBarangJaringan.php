<?php

namespace App\Models\it;

use Illuminate\Database\Eloquent\Model;

class TableBarangJaringan extends Model
{
    protected $guarded = [];

    public function perbaikans()
    {
        return $this->morphMany('App\Perbaikan', 'hardwareable');
    }
}
