<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterKaryawansController extends Controller
{
    public function klien()
    {
        return $this->belongsTo('App\klien');
    }
}
