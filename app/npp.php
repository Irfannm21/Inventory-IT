<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class npp extends Model
{

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany('App\detail_npp');
    }

    public function departemen()
    {
        return $this->belongsTo('App\departemen');
    }

    public function bagian()
    {
        return $this->belongsTo('App\bagian_dept');
    }

    public function bpbs()
    {
        return $this->hasMany('App\bpb');
    }

}
