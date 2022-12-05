<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StockSparepart;
use App\DaftarBarang;
use App\bpb;
use App\detail_npp;

class StockSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockSparepart  $stockSparepart
     * @return \Illuminate\Http\Response
     */
    public function show(StockSparepart $stockSparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockSparepart  $stockSparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(StockSparepart $stockSparepart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockSparepart  $stockSparepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockSparepart $stockSparepart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockSparepart  $stockSparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockSparepart $stockSparepart)
    {
        // $.ajax({
        //     method: "GET",
        //     url: '{{ url('admin/stock_spareparts/cariNamaBarangs') }}',
        //     data: {
        //         nama: $(this).val()
        //     },
        //     success: function(response) {
        //         console.log(204, response);
        //         for (let item of response) {
        //             $("#kode").val(item.kode);
        //             $("#nama").val(item.nama);
        //             $("#nomor_part").val(item.nomor_part);
        //             $("#no_kartu").val(item.no_kartu);
        //             $("#jenis").val(item.jenis);
        //             $("#kelompok").val(item.kelompok);
        //         }
        //     }
        // })
    }

    public function cariNamaBarang(Request $request) {
        $data = DaftarBarang::where("nama","LIKE","%$reques->nama%")->get();
        return response()->json($data);
    }

    public function cariDataStock(Request $request) {
        return  StockSparepart::with('barang','stockable.bpb')->where('barang_id',"$request->id")->get();
    }
}
