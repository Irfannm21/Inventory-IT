<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNppRequest;
use App\Http\Requests\UpdateNppRequest;
use App\npp;
use App\detail_npp;
use App\bpb;
use App\perbaikan;
use App\departemen;
use App\bagian_dept;
use Barryvdh\DomPDF\Facade\Pdf;


class NppController extends Controller
{
    public function index()
    {
        $results = npp::all();
        return view('admin.npp.index', compact('results'));

    }

    public function create()
    {
        $dept = departemen::all()->pluck('nama','id');
        $bagian = bagian_dept::all()->pluck('nama','id');
        return view('admin.npp.create',compact('dept','bagian'));
    }

    public function store(StoreNppRequest $request)
    {
        abort_unless(\Gate::allows('npp_create'), 403);
        // dd($request);
        $npp = new NPP;
        $npp->kode = $request->kode;
        $npp->tanggal = $request->tanggal;
        $npp->bagian_id = $request->bagian;
        $npp->save();

        $detail = [];
        foreach($request->nama as $i => $nama){
            $detail[] = [
                'nama'  =>$nama ?? '',
                'jumlah'=>$request->jumlah[$i]?? 1,
                'satuan'=>$request->satuan[$i]?? '',
                'stok'  =>$request->stok[$i]?? 0,
                'keterangan'=>$request->keterangan[$i]??'',
            ];
        }
        $npp->details()->createMany($detail);
        $npp->load('details');

        return redirect()->route('admin.npps.index');
    }

    public function edit(npp $npp)
    {
        $dept = departemen::all()->pluck('nama','id');
        $bagian = bagian_dept::all()->pluck('nama','id');
        return view('admin.npp.edit-npp',compact('npp','dept','bagian'));
    }

    public function update(UpdateNppRequest $request, npp $npp)
    {

        $npp->update([
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'bagian_id' => $request->bagian
        ]);
        return redirect()->route('admin.npps.index');
    }

    public function destroy(npp $npp)
    {
        $npp->details()->delete();
        $npp->delete();
        return redirect()->route('admin.npps.index');
    }

    public function Detail(){
        $results = detail_npp::all();
        return view('admin.npp.detail-npp', compact('results'));
    }

    public function diProses(){
        $results = detail_npp::with('detail_bpbs')->get();
        return view('admin.npp.npp-diProses', compact('results'));
    }


    public function Print(request $request)
    {
        // dd($request->npp);
        $result = npp::with('bagian')->where('id',$request->npp)->first();
        // dd($result);
        $pdf = PDF::loadView('admin.npp.print-npp',['result' => $result])->setPaper('a5'.'potrait');
        return $pdf->stream();
    }
}
