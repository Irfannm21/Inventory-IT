<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $guarded = [];

    public function hardwareable(){
        return $this->morphTo();
    }

    public function bpb()
    {
        return $this->belongsTo('App\bpb','bpb_id');
    }
}
