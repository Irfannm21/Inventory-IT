<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePembayaranRequest;
use Illuminate\Http\Request;
use App\Models\StokSparepart\pembayaran;
use App\Models\StokSparepart\bpb;
use App\Models\StokSparepart\npp;
use App\Models\StokSparepart\detail_npp;
use App\Http\Requests\StoreTransaksiRequest;


class PembayaranController extends Controller
{

    public function index()
    {
        $results = pembayaran::all();
        return view('admin.transaksi.index',compact("results"));
        // foreach($result as $item) {
        //     echo $item->bpb->tanggal . " | " . $item->bpb->kode . " | " . $item->bpb->npp->kode . " | " . $item->bpb->supplier . " | " . $item->bpb->detail->nama . " | " . $item->bpb->jumlah . " " . $item->bpb->satuan . " | " . $item->harga_satuan . " | " . $item->jenis_pembayaran . " | " . $item->lama_kredit;
        // }

    }

    public function create()
    {
        $bpb = bpb::get()->unique("kode")->pluck("kode","id");
        return view('admin.transaksi.create', compact("bpb"));
    }


    public function store(StoreTransaksiRequest $request)
    {
        // dd($request->all());
        foreach($request->bpb_id as $i => $item) {
            $result = bpb::find($request->bpb_id[$i]);
            $harga = $request->harga_satuan[$i];
            $ppn    = $request->ppn[$i];
            $total = $harga + $ppn;

            $transaksi = new pembayaran;
            $transaksi->bpb_id = $request->bpb_id[$i];
            $transaksi->harga_satuan = $request->harga_satuan[$i];
            $transaksi->ppn = $request->ppn[$i];
            $transaksi->total_harga = $total;
            $transaksi->jenis_pembayaran = $request->jenis_pembayaran[$i];
            $transaksi->lama_kredit = $request->lama_kredit[$i];

            $result->pembayaran()->save($transaksi);
        }

        return redirect()->route('admin.pembayarans.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $result = pembayaran::with('bpb')->find($id);
        $bpb = bpb::select("id","detail_id")->where("kode",$result->bpb->kode)->get();
        return view("admin.transaksi.edit",compact("result","bpb"));
    }

    public function update(UpdatePembayaranRequest $request,pembayaran $pembayaran)
    {
        $pembayaran->update($request->all());
        return redirect()->route('admin.pembayarans.index');
    }


    public function destroy(Request $request, $id)
    {
        $pem = pembayaran::findOrFail($id);
        $pem->delete();

        return back();
    }

    public function options(Request $request)
    {
        return bpb::with("detail_bpbs.detail_npp")->where("kode","$request->kode")->first();

        // return $request->kode;

    }
}
