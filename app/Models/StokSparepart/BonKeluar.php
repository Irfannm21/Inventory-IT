<?php

namespace App\Models\StokSparepart;
use  App\Models\StokSparepart\DetailBon;
use Illuminate\Database\Eloquent\Model;

class BonKeluar extends Model
{
    protected $guarded = [];


    public function detail_bons() {
        return $this->hasMany(DetailBon::class,'bon_id');
    }

    public function bon() {
        return $this->belongsTo('App\Models\StokSparepart\DetailBpb');
      }

      public function bagian() {
        return $this->belongsTo('App\Models\hrd\bagian_dept');
      }
}
