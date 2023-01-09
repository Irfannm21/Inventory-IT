<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarBarang extends Model
{
    protected $guarded = [];
    public function stocks() {
        return $this->hasMany('App\StockSparepart','barang_id');
    }

    public function detail_bpbs(){
        return $this->hasMany('App\Detail_bpb');
    }

}
