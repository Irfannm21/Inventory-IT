<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StokSparepart\BonKeluar;
use App\Models\StokSparepart\DetailBon;
use App\Models\StokSparepart\DaftarBarang;
use App\Models\hrd\bagian_dept;
use App\Models\hrd\departemen;
use Illuminate\Http\Request;

class BonKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = BonKeluar::all();
        return view('admin.bon.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $bagian = bagian_dept::select('id','nama')->get();
        $dept = departemen::select('id','nama')->get();
        $barang = DaftarBarang::has('stocks')->select('id','nama')->get();
        return view('admin.bon.create',compact('bagian','dept','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            "kode" => "required|unique:bon_keluars,id",
            "tanggal" => "required",
            "bagian_id" => "required",
            "penerima" => "required",
        ]);
        $bon = BonKeluar::create($validate);

        foreach($request->barang as $i => $value) {
            $detail[] = [
                'barang_id' => $request->barang[$i] ?? '',
                'jumlah' => $request->jumlah[$i] ?? '',
                'satuan' => $request->satuan[$i] ?? '',
                'keterangan' => $request->keeterangan[$i] ?? '',
            ];
        }

        $data = $bon->detail_bons()->createMany($detail);

        foreach($data as $item) {
            $item->stock()->create([
                "barang_id" => $item->barang_id,
                "tanggal"   => $item->bon->tanggal,
                "jumlah"    => $item->jumlah,
                "satuan"    => $item->satuan,
            ]);
        }

        return redirect()->route('admin.bons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BonKeluar  $BonKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BonKeluar $BonKeluar)
    {
        dd($BonKeluar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BonKeluar  $BonKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(BonKeluar $BonKeluar, $id)
    {
        $result = $BonKeluar::find($id);
        $bagian = bagian_dept::select('id','nama')->get();
        $dept = departemen::select('id','nama')->get();
        $barang = DaftarBarang::has('stocks')->select('id','nama')->get();

        return view('admin.bon.edit',compact('result','bagian','dept','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BonKeluar  $BonKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            "kode" => "required|unique:bon_keluars,id",
            "tanggal" => "required",
            "bagian_id" => "required",
            "penerima" => "required",
        ]);
       $result =  BonKeluar::UpdateOrCreate(
            ['id' => $id],$validate
        );

        foreach($request->barang_id as $i => $item) {
            $detail_bon[] = [
                [
                    "id" => $item
                ],
                [
                    "barang_id" => $request->barang[$i],
                    "jumlah" => $request->jumlah[$i],
                    "satuan" => $request->barang[$i],
                    "keterangan" => $request->keterangan[$i],
                ],
                [
                        "barang_id" => $request->barang[$i],
                        "jumlah" => $request->jumlah[$i],
                        "satuan" => $request->satuan    [$i],
                        "tanggal" => $request->tanggal,
                ]
                ];
        }

        foreach($detail_bon as $item) {
            $id = $item[0]["id"];
            $value = $item[1];
            $stok = $item[2];
            $d_bon = $result->detail_bons()->updateOrCreate(["id" => $id],$value);
            $d_bon->stock()->updateOrCreate(["id" => $d_bon->stock->id],$stok);
        }
        return redirect()->route('admin.bons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BonKeluar  $BonKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(BonKeluar $BonKeluar)
    {
        //
    }

    public function detail()
    {
        $results = DetailBon::all();
        return view('admin.bon.detail',compact('results'));
    }
}
