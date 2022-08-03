<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_karyawans extends Model
{
    public function klien()
    {
        return $this->hasOne('App\klien');
    }
}
