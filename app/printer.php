<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class printer extends Model
{
    protected $guarded = [];

    public function perbaikans()
    {
        return $this->morphMany('App\Perbaikan', 'hardwareable');
    }

    public function klien()
    {
        return $this->hasOne('App\klien');
    }

}
