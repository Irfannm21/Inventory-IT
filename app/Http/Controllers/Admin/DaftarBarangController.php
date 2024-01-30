<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\StokSparepart\bpb;
use App\Models\StokSparepart\printer;
use App\Models\StokSparepart\detail_npp;
use App\Models\StokSparepart\DaftarBarang;
use App\Models\StokSparepart\StockSparepart;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonInterval;


class DaftarBarangController extends Controller
{
    public function index() {
        $results = DaftarBarang::all();
        return view('admin.daftar_barang.index', compact('results'));
    }

    public function create(){
        return view('admin.daftar_barang.create');
    }

    public function store(StoreBarangRequest $request){
        DaftarBarang::create($request->all());
        return redirect()->route('admin.daftar_barangs.index');;
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
        //      $keluar = $item->stocks()->where('stockable_type', 'App\BonKeluar')->sum('jumlah');
        //     $total = $masuk - $keluar;

            return view('admin.daftar_barang.laporan');
    }

public function print (Request $request) {
        $from = $request->dari;
        $to = $request->sampai;

        $before_month = Carbon::create($from)->sub('1 month');
        $before_from = $before_month->startOfMonth()->format('Y-m-d');
        $before_to = $before_month->endOfMonth()->format('Y-m-d');;


        $result = DaftarBarang::with(['stocks' => function ($q) {
            $q->whereBetween('tanggal', ['2023-01-01','2023-01-01']);
        }])->OrderBy('nama',"ASC")->get();


        $pdf = PDF::loadView('admin.daftar_barang.print',compact('result','from','to','before_from','before_to'))->setPaper('a4'.'potrait');
        return $pdf->stream();
    }
}
