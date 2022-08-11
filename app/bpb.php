<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bpb extends Model
{
    protected $guarded = [];

    public function detail()
    {
        return $this->belongsTo('App\detail_npp');
    }

    public function npp()
    {
        return $this->belongsTo('App\npp');
    }

    public function perbaikans()
    {
        return $this->hasMany('App\Perbaikan','bpb_id');
    }

}
