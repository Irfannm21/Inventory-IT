<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_bpb extends Model
{
    protected $guarded = [];

    public function bpb() {
        return $this->belongsTo('App\bpb');
    }

    public function detail() {
        return $this->belongsTo('App\detail_npp');
    }
}
