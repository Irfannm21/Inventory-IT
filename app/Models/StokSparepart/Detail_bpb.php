<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;

class Detail_bpb extends Model
{
    protected $guarded = [];

    public function bpb() {
        return $this->belongsTo('App\Models\StokSparepart\bpb');
    }

    public function detail_npp() {
        return $this->belongsTo('App\Models\StokSparepart\detail_npp','detail_id');
    }

    public function stock() {
        return $this->morphOne('App\Models\StokSparepart\StockSparepart','stockable');
    }

    public function barang() {
      return $this->belongsTo('App\Models\StokSparepart\DaftarBarang');
    }
}


