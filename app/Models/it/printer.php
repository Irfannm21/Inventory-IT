<?php

namespace App\Models\it;

use Illuminate\Database\Eloquent\Model;
use App\Models\it\perbaikan;

class printer extends Model
{
    protected $guarded = [];

    public function perbaikans()
    {
        return $this->morphMany(Perbaikan::class, 'hardwareable');
    }

    public function klien()
    {
        return $this->hasOne('App\Models\it\klien');
    }

}
