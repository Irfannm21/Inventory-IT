<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_npp extends Model
{

    protected $guarded = [];

    public function npp()
    {
        return $this->belongsTo('App\npp');
    }

   public function bpbs()
   {
    return $this->hasMany('App\bpb','detail_id');
   }

   public function daftar_bpbs(){
    return $this->hasMany("App\Detail_bpb");
   }
}
