<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;

class DaftarBarang extends Model
{
    protected $guarded = [];
    public function stocks() {
        return $this->hasMany('App\Models\StokSparepart\StockSparepart','barang_id');
    }

    public function detail_bpbs(){
        return $this->hasMany('App\Models\StokSparepart\Detail_bpb');
    }


    public function detail_bons(){
        return $this->hasMany('App\Models\StokSparepart\DetailBon');
    }

}
