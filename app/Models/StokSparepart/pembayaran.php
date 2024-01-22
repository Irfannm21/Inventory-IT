<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $guarded = [];

    public function Detail_bpb()
    {
        return $this->belongsTo('App\Models\StokSparepart\Detail_bpb',"detail_id");
    }
}
