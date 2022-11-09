<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Detail_bpb;


class DetailBpbController extends Controller
{
    public function index()
    {
        $detail_bpb = detail_bpb::has('bpb')->get();
    }
}
