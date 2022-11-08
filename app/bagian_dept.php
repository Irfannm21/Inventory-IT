<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bagian_dept extends Model
{
    protected $guarded = [];

    public function departemen()
    {
        return $this->belongsTo('App\departemen');
    }

    public function npps()
    {
        return $this->hasMany('App\npp','bagian_id');
    }
}
