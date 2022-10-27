<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBpbRequest;
use App\Http\Requests\UpdateBpbRequest;

use Illuminate\Http\Request;

use App\npp;
use App\detail_npp;
use App\bpb;
use App\Detail_bpb;


use Barryvdh\DomPDF\Facade\Pdf;

class BpbController extends Controller
{
    public function index()
    {
        $results = bpb::all();
            return view('admin.bpb.index', compact('results'));
    }

    public function create()
    {
        $detail = detail_npp::all()->pluck('nama','id');
        $npp = npp::all()->pluck('kode','id');
        return view('admin.bpb.create',compact('detail','npp'));
    }

    public function store(StoreBpbRequest $request){

        $results = npp::where("id",$request->npp_id)->first();

        $bpb = new bpb;
        $bpb->kode = $request->kode;
        $bpb->tanggal = $request->tanggal;
        $bpb->kelompok = $request->kelompok;

        $results->bpbs()->save($bpb);

        $detail = [];
        foreach ($request->detail_id as $i => $nama) {
            $detail[] = [
                "detail_id" => $request->detail_id{$i} ?? '',
                "jumlah" => $request->jumlah{$i} ?? '1',
                "satuan" => $request->satuan{$i} ?? 'pcs',
            ];
        }

        $bpb = bpb::where("kode",$request->kode)->first();

        $bpb->daftar_bpbs()->createMany($detail);
        return redirect()->route("admin.bpbs.index");
    }

    public function show() {
        $npp = npp::all();
        return view('admin.bpb.test', compact('npp'));
    }

    public function edit(bpb $bpb) {
        $detail = detail_npp::all()->pluck("nama","id");
        return view("admin.bpb.edit", compact("bpb","detail"));
    }

    public function update(UpdateBpbRequest $request, bpb $bpb) {
        $bpb->update($request->all());
        return redirect()->route("admin.bpbs.index");
    }

    public function destroy(Request $bpb, $id) {

        $result = bpb::findOrFail($id);
        $result->delete();
        return back();
    }

    public function massDestroy() {

    }

    public function Print(request $request,npp $id)
    {
        $result = bpb::where("kode",$request->bpb)->get();
        $pdf = PDF::loadView('admin.bpb.print',['result' => $result])->setPaper('a5'.'potrait');
        return $pdf->stream();
    }
}
