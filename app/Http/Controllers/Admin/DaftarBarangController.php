<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DaftarBarang;
use App\StockSparepart;
use App\bpb;
use App\detail_npp;


class DaftarBarangController extends Controller
{
    public function index() {
        $results = DaftarBarang::limit(10)->pluck('nama','id');
        $stocks = StockSparepart::all();
        return view('admin.inventori_sparepart.index',compact('results','stocks'));
    }

}
