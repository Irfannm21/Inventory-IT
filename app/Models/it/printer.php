<?php

namespace App\Models\it;

use App\Models\it\Perbaikan;
use App\Models\it\gudangIT;
use Illuminate\Database\Eloquent\Model;

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

    public function gudangitable()
    {
        return $this->morphOne('App\Models\it\gudangIT','gudangitable');
    }
}
