<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bagian_dept extends Model
{
    protected $guarded = [];

    public function departemen()
    {
        return $this->belongsTo('App\Models\departemen');
    }

    public function npps()
    {
        return $this->hasMany('App\StokSparepart','bagian_id');
    }
}
