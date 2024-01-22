<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StokSparepart\StockSparepart;
use App\Models\StokSparepart\DaftarBarang;
use App\Models\StokSparepart\bpb;
use App\Models\StokSparepart\detail_npp;
use App\Models\StokSparepart\BonKeluar;
use App\Models\StokSparepart\DetailBon;

class StockSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result = StockSparepart::with('barang')->where('barang_id',1)->get();
        // dd($result);

        $stockData = StockSparepart::with('barang','stockable')->where('barang_id',1)->OrderBy('tanggal',"DESC")->get();

        // dd($stockData);
        foreach($stockData as $item) {
            // echo $item->stockable_type;
            switch($item->stockable_type) {
                case "App\Models\StokSparepart\Detail_bpb" :
                    echo $item->stockable->bpb->kode;
                    echo " - " . $item->jumlah;
                    echo " - " . $item->satuan;
                    echo "<br>";
                    break;
                case "App\Models\StokSparepart\DetailBon" :
                    echo $item->stockable->bon->kode;
                    echo " - " . $item->jumlah;
                    echo " - " . $item->satuan;
                    echo "<br>";
                    break;
                default :
                    echo "Data Tidak ditemukan";
            }
        }

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
        //     count}
        // })
    }

    public function cariNamaBarang(Request $request) {
        return DaftarBarang::where("id",$request->nama)->get();

    }

    public function cariDataStock(Request $request) {
        return StockSparepart::with('barang','stockable.bpb','stockable.bon')->where('barang_id',$request->id)->OrderBy('tanggal',"DESC")->get();
    }
}
