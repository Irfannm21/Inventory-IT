<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $guarded = [];

    public function bpb()
    {
        return $this->belongsTo('App\bpb');
    }
}
