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
}
