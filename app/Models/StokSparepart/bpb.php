<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;

class bpb extends Model
{
    protected $guarded = [];

    public function npp()
    {
        return $this->belongsTo('App\Models\StokSparepart\npp');
    }

   public function supplier() {
        return $this->belongsTo("App\Models\StokSparepart\supplier");
   }

   public function detail_bpbs()
   {
       return $this->hasMany('App\Models\StokSparepart\Detail_bpb');
   }

   public function perbaikans()
   {
       return $this->hasMany('App\Models\StokSparepart\Models\it\perbaikan');
   }


   public function pembayaran()
   {
    return $this->hasOne('App\Models\StokSparepart\pembayaran','bpb_id');
   }

}
