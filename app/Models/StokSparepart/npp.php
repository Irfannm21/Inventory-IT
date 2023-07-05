<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;

class npp extends Model
{

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany('App\Models\StokSparepart\detail_npp',"npp_id");
    }

    public function departemen()
    {
        return $this->belongsTo('App\Models\hrd\departemen');
    }

    public function bagian()
    {
        return $this->belongsTo('App\Models\hrd\bagian_dept','bagian_id');
    }

    public function bpbs()
    {
        return $this->hasMany('App\Models\StokSparepart\bpb');
    }

}
