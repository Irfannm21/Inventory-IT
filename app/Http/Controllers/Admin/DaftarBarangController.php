<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\bpb;
use App\printer;
use App\detail_npp;
use App\DaftarBarang;
use App\StockSparepart;

use Barryvdh\DomPDF\Facade\Pdf;

class DaftarBarangController extends Controller
{
    public function index() {
        $results = DaftarBarang::all();
        return view('admin.daftar_barang.index', compact('results'));
    }

    public function create(){
        return view('admin.daftar_barangn.create');
    }

    public function store(StoreBarangRequest $request){
        DaftarBarang::create($request->all());
        return view('admin.inventori_sparepart.index');
    }

    public function show(Request $request, DaftarBarang $barang){
        // dd($request->all());
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('barang_edit'), 403);
        $barang = DaftarBarang::findOrFail($id);

        return view('admin.daftar_barang.edit', compact('barang'));
    }

    public function update(UpdateBarangRequest $request, $id)
    {
        $barang = DaftarBarang::FindOrFail($id);
        $barang->update($request->all());
        return redirect()->route('admin.daftar_barangs.index');
    }

    public function destroy($id)
    {
        $barang = DaftarBarang::findOrFail($id);
        $barang->delete();
        return back();
    }

    public function flow(){
        $results = DaftarBarang::limit(10)->pluck('nama','id');
        $stocks = StockSparepart::all();
        return view('admin.daftar_barang.flow',compact('results','stocks'));
    }

    public function laporan(){
        //  $masuk = $item->stocks()->where('stockable_type', 'App\Detail_bpb')->sum('jumlah');
        //      $keluar = $item->stocks()->where('stockable_type', 'App\BonPengambilan')->sum('jumlah');
        //     $total = $masuk - $keluar;
            $results = DaftarBarang::with('stocks')->where('barang_id',35)->get();
        dd($results);
            return view('admin.daftar_barang.laporan');
    }

    public function print (Request $request) {
        $from = $request->dari;
        $to = $request->sampai;

        $results = DaftarBarang::with('stocks')->whereBetween('id',[5,7])->get();
        dd($results);
        $pdf = PDF::loadView('admin.daftar_barang.print',['result' => $results])->setPaper('a4'.'potrait');
        return $pdf->stream();
    }
}
