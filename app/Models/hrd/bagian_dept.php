<?php

namespace App\Models\hrd;

use Illuminate\Database\Eloquent\Model;

class bagian_dept extends Model
{
    protected $guarded = [];

    public function departemen()
    {
        return $this->belongsTo('App\Models\hrd\departemen');
    }

    public function npps()
    {
        return $this->hasMany('App\Models\StokSparepart\StockSparepart','bagian_id');
    }
}
