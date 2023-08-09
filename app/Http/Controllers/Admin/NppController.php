<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNppRequest;
use App\Http\Requests\UpdateNppRequest;
use App\Models\StokSparepart\npp;
use App\Models\StokSparepart\detail_npp;
// use App\Models\StokSparepart\bpb;
use App\Models\StokSparepart\Detail_bpb;
// use App\Models\StokSparepart\perbaikan;
use App\Models\hrd\departemen;
use App\Models\hrd\bagian_dept;
use Barryvdh\DomPDF\Facade\Pdf;


class NppController extends Controller
{
    public function index()
    {
            $results = npp::orderBy('tanggal','DESC')->get( );
        return view('admin.npp.index', compact('results'));
    }

    public function create()
    {
        $dept = departemen::all()->pluck('nama','id');
        $bagian = bagian_dept::all()->pluck('nama','id');
        return view('admin.npp.create',compact('dept','bagian'));
    }

    public function show(Request $request, npp $npp) {
        // dd($request->all());
        dd($npp);
        $npp->update([
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'bagian_id' => $request->bagian,
        ]);
        return redirect()->route('admin.npps.index');
    }

    public function store(StoreNppRequest $request)
    {
        // dd($request->all());
        abort_unless(\Gate::allows('npp_create'), 403);
        $npp = new NPP;
        $npp->kode = trim(ucwords($request->kode));
        $npp->tanggal = $request->tanggal;
        $npp->bagian_id = $request->bagian;
        $npp->status    = NULL;
        $npp->save();

        $detail = [];
        foreach($request->nama as $i => $nama){
            $detail[] = [
                'nama'      => trim(ucwords($nama)) ?? '',
                'jumlah'    =>$request->jumlah[$i]?? 1,
                'satuan'    =>$request->satuan[$i]?? 'Pcs',
                'stok'      =>$request->stok[$i]?? 0,
                'keterangan'=> trim(ucwords($request->keterangan[$i])) ??'',
            ];
        }
        $npp->details()->createMany($detail);
        $npp->load('details');

        return redirect()->route('admin.npps.index');
    }

    public function edit(Request $request, npp $npp)
    {
        $dept = departemen::all()->pluck('nama','id');
        $bagian = bagian_dept::all()->pluck('nama','id');
        return view('admin.npp.edit-npp',compact('npp','dept','bagian'));
    }

    public function update(StoreNppRequest $request, npp $npp)
    {
        // dd($request->all());
    //   $npp->update([
    //     "kode" => $request->kode,
    //     "tanggal" => $request->tanggal,
    //     "bagian_id" => $request->bagian,
    //     "status" => $request->status,
    //   ]);

    //   dd($request->all());
      foreach($request->nama as $i => $val) {
        $result = detail_npp::where("nama",$request->nama[$i])->first();

       $npp->details()->updateOrCreate(
            ["npp_id" => $npp->id, "nama" => $val ?? ""],
            [
                "npp_id" => $npp->id,
                "jumlah" => $request->jumlah[$i],
                "satuan" => $request->satuan[$i],
                "stok" => $request->stok[$i],
                "keterangan" => $request->keterangan[$i] ?? "",
            ]
            );
      }
// die();
        return redirect()->route('admin.npps.index');
    }

    public function destroy(Request $request, npp $npp)
    {
        $npp->details()->delete();
        $npp->delete();
        return redirect()->route('admin.npps.index');
    }

    public function Detail(){
        $results = detail_npp::orderBY('nama',"DESC")->get();
        return view('admin.npp.detail-npp', compact('results'));
    }

    public function diProses(){
        $results = detail_npp::with('detail_bpbs')->orderBY('created_at',"DESC")->get();
        return view('admin.npp.npp-diProses', compact('results'));
    }

    public function Bagian(Request $request) {
        return bagian_dept::where('departemen_id',"$request->dept")->get();
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
