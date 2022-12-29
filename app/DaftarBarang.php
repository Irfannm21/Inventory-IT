<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarBarang extends Model
{
    protected $guarded = [];
    public function stocks() {
        return $this->hasMany('App\StockSparepart','barang_id');
    }


}
