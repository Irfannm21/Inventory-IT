<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StokSparepart\bpb;
use App\Models\StokSparepart\Detail_bpb;
use App\Models\StokSparepart\detail_npp;
use App\Models\StokSparepart\DaftarBarang;

use App\Http\Requests\UpdateDetailBpbRequest;

class DetailBpbController extends Controller
{
    public function index()
    {
        $results = Detail_bpb::has('bpb')->get();
        return view('admin.detail_bpb.index', compact('results'));
    }

    public function edit(Request $request, $id)
    {

     $result = Detail_bpb::find($id);
        $barang = DaftarBarang::all()->pluck('nama','id');
        $npp = $result->bpb->npp->id;
        $bpb = detail_npp::where("npp_id",$npp)->get()->pluck('nama','id');
        return view('admin.detail_bpb.edit', compact('result','bpb','barang'));
    }

    public function update(UpdateDetailBpbRequest $request, Detail_bpb $detail_bpb)
    {
        $bpb = bpb::where("kode","$request->bpb_id")->first();
        $bpb->detail_bpbs()->update([
            "detail_id" => $request->detail_id,
        ]);

        $detail = Detail_bpb::find(1);

        $detail_bpb->stock()->update([
            "jumlah" => $request->jumlah,
            "satuan" => $request->satuan,
        ]);
        return redirect()->route('admin.detail_bpbs.index');
    }

    public function destroy(Request $request, $id)
    {
        $res = Detail_bpb::findOrFail($id);
        $res->delete();

        return back();
    }
}
