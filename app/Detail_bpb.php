<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_bpb extends Model
{
    protected $guarded = [];

    public function bpb() {
        return $this->belongsTo('App\bpb');
    }

    public function detail_npp() {
        return $this->belongsTo('App\detail_npp','detail_id');
    }

    public function stock() {
        return $this->morphOne('App\StockSparepart','stockable');
    }

    public function barang() {
      return $this->belongsTo('App\DaftarBarang');
    }
}
