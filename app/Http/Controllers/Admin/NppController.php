<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\hrd\departemen;
use App\Models\hrd\bagian_dept;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\StokSparepart\npp;
use App\Http\Controllers\Controller;
// use App\Models\StokSparepart\bpb;
use Illuminate\Support\Facades\Auth;
// use App\Models\StokSparepart\perbaikan;
use App\Http\Requests\StoreNppRequest;
use App\Http\Requests\UpdateNppRequest;
use App\Models\StokSparepart\Detail_bpb;
use App\Models\StokSparepart\detail_npp;


class NppController extends Controller
{
    public function index()
    {
            $dept = departemen::where('nama',Auth::user()->departemen)->first();
            $dept = bagian_dept::where('departemen_id',$dept->id)->pluck('id');
            $results = npp::whereIn('bagian_id',$dept)->orderBy('tanggal','DESC')->get( );
        return view('admin.npp.index', compact('results'));
    }

    public function create()
    {
        // dd(Auth::User()->departemen);
        $dept = departemen::where('nama',Auth::User()->departemen)->pluck('nama','id');
        $bagian = bagian_dept::all()->pluck('nama','id');
        return view('admin.npp.create',compact('dept','bagian'));
    }

    public function show(Request $request, npp $npp) {
        // dd($request->all());
        dd($npp);
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
      $npp->update([
        "kode" => $request->kode,
        "tanggal" => $request->tanggal,
        "bagian_id" => $request->bagian,
        "status" => $request->status,
      ]);

      $detail = [];
      foreach($request->id as $i => $val)
      {
        $detail[] = [
            ["id" => $val],
               [ 'nama'      => trim(ucwords($request->nama[$i])) ?? '',
                'jumlah'    =>$request->jumlah[$i]?? 1,
                'satuan'    =>$request->satuan[$i]?? 'Pcs',
                'stok'      =>$request->stok[$i]?? 0,
                'keterangan'=> trim(ucwords($request->keterangan[$i])) ??'',]
        ];
      }

      foreach($detail as $item) {
            $id = $item[0]["id"];
            $data = $item[1];
          $npp->details()->updateOrCreate(['id' => $id], $data);
      }
       return redirect()->route('admin.npps.index');
    }

    public function destroy(Request $request, npp $npp)
    {
        // if(npp::has())
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

        $pdf = PDF::loadView('admin.npp.print-npp',['result' => $result])->setPaper('a4','potrait');
        return $pdf->stream();
    }

}
