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
use App\DaftarBarang;
use App\StockSparepart;

use Barryvdh\DomPDF\Facade\Pdf;

use Faker\Factory as Faker;
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
        $barang = DaftarBarang::all()->pluck('nama','id');
        return view('admin.bpb.create',compact('detail','npp','suppliers','barang'));
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


        foreach ($request->detail_id as $i => $nama) {
            $detail[] = [
                "detail_id" => $request->detail_id[$i] ?? '',
            ];
        }


        $data = $bpb->detail_bpbs()->createMany($detail);

        $faker = Faker::Create('id_ID');

        foreach($request->barang_id as $i => $tt) {

            if($request->barang_id[$i] == null) {
                // dd($request->detail_id[$i]);
                $namaBarang = detail_npp::select('nama')->where('id',$request->detail_id[$i])->first();
                $barang = new DaftarBarang;
                $barang->kode = $faker->numerify("####");
                $barang->nama = $namaBarang->nama;
                $barang->satuan = $request->satuan{$i} ?? '';
                $barang->save();

                $stok = new StockSparepart;
                $stok->barang_id = $barang->id  ?? '';
                $stok->jumlah = $request->jumlah{$i} ?? '';
                $stok->satuan = $request->satuan{$i} ?? '';

                $data[$i]->stock()->save($stok);

            } else {
                $barang = DaftarBarang::find($request->barang_id[$i]);

                $stok = new StockSparepart;
                $stok->barang_id = $barang->id ?? '';
                $stok->jumlah = $request->jumlah{$i} ?? '';
                $stok->satuan = $request->satuan{$i} ?? '';
                $data[$i]->stock()->save($stok);
            }

        }

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
            return redirect()->route("admin.bpbs.elektrik");
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

    public function Print(request $request)
    {
        $result = bpb::with('detail_bpbs','supplier')->where("kode",$request->bpb)->get();
        // dd($result);
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

    public function options(Request $request)
    {
        return detail_npp::select("id","nama")->where('npp_id',"$request->npp_id")->get();
    }
}
