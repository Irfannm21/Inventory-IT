<?php

namespace App\Models\it;

use App\Models\StokSparepart\DetailBon;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $guarded = [];

    public function hardwareable(){
        return $this->morphTo();
    }

    public function detail_bon() {
        return $this->belongsTo(DetailBon::class, 'detail_id');
    }


}
