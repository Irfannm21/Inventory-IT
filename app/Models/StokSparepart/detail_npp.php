<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;

class detail_npp extends Model
{

    protected $guarded = [];

    public function npp()
    {
        return $this->belongsTo('App\Models\StokSparepart\npp','npp_id');
    }

   public function bpbs()
   {
    return $this->hasMany('App\Models\StokSparepart\bpb','detail_id');
   }

   public function detail_bpbs(){
    return $this->hasMany("App\Models\StokSparepart\Detail_bpb", 'detail_id');
   }
}
