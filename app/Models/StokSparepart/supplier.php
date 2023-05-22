<?php

namespace App\Models\StokSparepart;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $guarded = [];

    public function bpbs() {
        return $this->hasMany("App\Models\StokSparepart\bpb");
    }
}
