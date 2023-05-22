<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $guarded = [];

    public function bpbs() {
        return $this->hasMany("App\bpb");
    }
}
