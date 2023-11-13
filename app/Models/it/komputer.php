<?php

namespace App\Models\it;

// use App\Models\it\guadangIT;
use Illuminate\Database\Eloquent\Model;

class komputer extends Model
{
    protected $guarded = [];

    public function perbaikans()
    {
        return $this->morphMany('App\Models\it\Perbaikan', 'hardwareable');
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
