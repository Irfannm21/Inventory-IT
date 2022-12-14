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
        $results = StockSparepart::with('barang','stockable.bpb')->get();
        echo "<table>";
        echo "<thead>";
        echo "<th>Kode</th>";
        echo "<th>Kelompok</th>";
        echo "<th>Nama</th>";
        echo "<th>Stok</th>";
        echo "<th>Masuk</th>";
        echo "<th>Keluar</th>";
        echo "<th>Saldo Akhir</th>";
        echo "<th>S O P</th>";
        echo "<th>Selisih</th>";
        echo "<th>Satuan</th>";
        echo "</thead>";
        echo "<tbody>";
        foreach($results as $item) {
            echo "<tr>";
            echo "<td>" . $item->barang->kode . "</td>";
            echo "<td>" . $item->barang->kelompok . "</td>";
            echo "<td>" . $item->barang->nama . "</td>";
            echo "<td>" . 0 . "</td>";
            echo "<td>" . 0 . "</td>";
            echo "<td>" . 0 . "</td>";
            echo "<td>" . 0 . "</td>";
            echo "<td>" . 0 . "</td>";
            echo "<td>" . 0 . "</td>";
            echo "<td>" . 0 . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    public function print (Request $request) {
        $results = bpb::whereBetween('tanggal',["",])->get();
        dd($results);
    }
}
