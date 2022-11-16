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
use App\supplier;

use Barryvdh\DomPDF\Facade\Pdf;

class BpbController extends Controller
{
    public function index()
    {
        $suppliers = supplier::all();
        $results = bpb::has("Detail_bpbs")->get();
            return view('admin.bpb.index', compact('results'));
    }

    public function create()
    {
        $suppliers = supplier::all()->pluck('nama','id');
        $detail = detail_npp::all()->pluck('nama','id');
        $npp = npp::all()->pluck('kode','id');
        return view('admin.bpb.create',compact('detail','npp','suppliers'));
    }

    public function store(StoreBpbRequest $request){

        if($request->supplierId == true) {
            $supplier = supplier::find($request->supplierId);
        } else {
            $supplier = new supplier;
            $supplier->nama = $request->nama;
            $supplier->kota = $request->kota;
            $supplier->email = $request->email;
            $supplier->telepon = $request->telepon;
            $supplier->type = $request->type;
            $supplier->alamat = $request->alamat;
            $supplier->save();

            $supplier = supplier::where('nama',$request->nama)->first();
        }

        $npp = npp::find($request->npp_id);

        $bpb = new bpb;
        $bpb->kode = $request->kode;
        $bpb->tanggal = $request->tanggal;
        $bpb->kelompok = $request->kelompok;
        $bpb->npp()->associate($npp);
        $bpb->supplier()->associate($supplier);
        $bpb->save();

        $detail = [];
        foreach ($request->detail_id as $i => $nama) {
            $detail[] = [
                "detail_id" => $request->detail_id{$i} ?? '',
                "jumlah" => $request->jumlah{$i} ?? '1',
                "satuan" => $request->satuan{$i} ?? 'pcs'
            ];
        }

        $bpb->detail_bpbs()->createMany($detail);
        if($bpb->kelompok == "Administrasi")
        {
            return redirect()->route("admin.bpbs.administrasi");
        } elseif ($bpb->kelompok == "Sparepart")
        {
            return redirect()->route("admin.bpbs.sparepart");
        }
         elseif($bpb->kelompok == "Mobil")
        {
            return redirect()->route("admin.bpbs.mobil");
        }
        elseif($bpb->kelompok == "Elektrik")
        {
            return redirect()->route("admin.bpbs.eletrik");
        }
        elseif($bpb->kelompok == "PT")
        {
            return redirect()->route("admin.bpbs.pt");
        }
        elseif($bpb->kelompok == "Spinning")
        {
            return redirect()->route("admin.bpbs.spinning");
        }
        elseif($bpb->kelompok == "UM")
        {
            return redirect()->route("admin.bpbs.um");
        }
    }

    public function show() {
        $npp = npp::all();
        return view('admin.bpb.test', compact('npp'));
    }

    public function edit(bpb $bpb) {
        $result = bpb::find($bpb->id);
        $suppliers = supplier::all()->pluck('nama','id');
        return view("admin.bpb.edit", compact("result",'suppliers'));
    }

    public function update(UpdateBpbRequest $request, bpb $bpb) {
        $bpb->update($request->all());

        if($bpb->kelompok == "Administrasi")
        {
            return redirect()->route("admin.bpbs.administrasi");
        } elseif ($bpb->kelompok == "Sparepart")
        {
            return redirect()->route("admin.bpbs.sparepart");
        }
        elseif ($bpb->kelompok == "Elektrik")
        {
            return redirect()->route("admin.bpbs.elektrik");
        }
         elseif($bpb->kelompok == "Mobil")
        {
            return redirect()->route("admin.bpbs.mobil");
        }
        elseif($bpb->kelompok == "PT")
        {
            return redirect()->route("admin.bpbs.pt");
        }
        elseif($bpb->kelompok == "Spinning")
        {
            return redirect()->route("admin.bpbs.spinning");
        }
        elseif($bpb->kelompok == "UM")
        {
            return redirect()->route("admin.bpbs.um");
        }
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


    public function administrasi()
    {
        $results = bpb::where("kelompok","Administrasi")->get();
        return view('admin.bpb.index', compact('results'));
    }

    public function sparepart()
    {
        $results = bpb::where("kelompok","sparepart")->get();
        return view('admin.bpb.index', compact('results'));
    }

    public function elektrik()
    {
        $results = bpb::where("kelompok","Elektrik")->get();
        return view('admin.bpb.index', compact('results'));
    }

    public function mobil()
    {
        $results = bpb::where("kelompok","Mobil")->get();
        return view('admin.bpb.index', compact('results'));
    }

    public function pt()
    {
        $results = bpb::where("kelompok","pt")->get();
        return view('admin.bpb.index', compact('results'));
    }

    public function spinning()
    {
        $results = bpb::where("kelompok","spinning")->get();
        return view('admin.bpb.index', compact('results'));
    }

    public function um()
    {
        $results = bpb::where("kelompok","UM")->get();
        return view('admin.bpb.index', compact('results'));
    }
}
