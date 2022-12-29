<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBarangRequest;
use App\DaftarBarang;
use App\StockSparepart;
use App\bpb;
use App\detail_npp;


class DaftarBarangController extends Controller
{
    public function index() {
        $results = DaftarBarang::all();
        return view('admin.inventori_sparepart.index', compact('results'));
    }

    public function create(){
        return view('admin.inventori_sparepart.create');
    }

    public function store(StoreBarangRequest $request){
        DaftarBarang::create($request->all());
        return view('admin.inventori_sparepart.index');
    }

    public function edit()
    {
        return "EDITDEIT";
    }

    public function destroy()
    {
        return "DELDEL";
    }


    public function flow(){
        $results = DaftarBarang::limit(10)->pluck('nama','id');
        $stocks = StockSparepart::all();
        return view('admin.inventori_sparepart.flow',compact('results','stocks'));
    }

}
