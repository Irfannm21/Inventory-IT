<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonPengambilan extends Model
{
    protected $guarded = [];

    public function bon(){
        return $this->morphOne('App\StockSparepart','stockable');
    }

    public function bpb() {
        return $this->belongsTo('App\bpb');
    }
}
