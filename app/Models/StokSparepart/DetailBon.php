<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;
use App\Models\StokSparepart\StockSparepart;
use App\Models\StokSparepart\BonKeluar;
class DetailBon extends Model
{
    public function bon()
    {
        return $this->belongsTo(BonKeluar::class);
    }

    public function stock() {
        return $this->morphOne(StockSparepart::class,'stockable');
    }

}
