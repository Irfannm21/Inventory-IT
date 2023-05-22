<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockSparepart extends Model
{
    protected $guarded = [];

    public function stockable()
    {
        return $this->morphTo();
    }

    public function barang() {
        return $this->belongsTo('App\DaftarBarang', 'barang_id');
    }
}
