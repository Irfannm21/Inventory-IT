<?php

namespace App\Models\it;

use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $guarded = [];

    public function hardwareable(){
        return $this->morphTo();
    }


}
