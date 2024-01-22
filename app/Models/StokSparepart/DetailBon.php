<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;
use App\Models\StokSparepart\StockSparepart;
use App\Models\StokSparepart\BonKeluar;
use App\Models\StokSparepart\DaftarBarang;
use App\Models\StokSparepart\bpb;
class DetailBon extends Model
{

    protected $guarded = [];
    public function bon()
    {
        return $this->belongsTo(BonKeluar::class,'bon_id');
    }

    public function bpb()
    {
        return $this->belongsTo(bpb::class,'bpb_id');
    }

    public function barang()
    {
        return $this->belongsTo(DaftarBarang::class);
    }

    public function stock() {
        return $this->morphOne(StockSparepart::class,'stockable');
    }

}
