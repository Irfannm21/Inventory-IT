<?php

namespace App\Models\StokSparepart;
use  App\Models\StokSparepart\DetailBon;
use Illuminate\Database\Eloquent\Model;

class BonKeluar extends Model
{
    protected $guarded = [];

    public function stock() {
        return $this->morphOne('App\Models\StokSparepart\StockSparepart','stockable');
    }

    public function detail_bons() {
        return $this->hasMany(DetailBon::class,'bon_id');
    }


}
