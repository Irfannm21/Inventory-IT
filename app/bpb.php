<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bpb extends Model
{
    protected $guarded = [];

    public function npp()
    {
        return $this->belongsTo('App\npp');
    }

   public function supplier() {
        return $this->belongsTo("App\supplier");
   }

   public function detail_bpbs()
   {
       return $this->hasMany('App\Detail_bpb');
   }

   public function perbaikans()
   {
       return $this->hasMany('App\Models\it\perbaikan');
   }


   public function pembayaran()
   {
    return $this->hasOne('App\pembayaran','bpb_id');
   }

}
