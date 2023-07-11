<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBpbRequest;
use App\Http\Requests\UpdateBpbRequest;

use Illuminate\Http\Request;

use App\Models\StokSparepart\npp;
use App\Models\StokSparepart\detail_npp;
use App\Models\StokSparepart\bpb;
use App\Models\StokSparepart\Detail_bpb;
use App\Models\StokSparepart\supplier;
use App\Models\StokSparepart\DaftarBarang;
use App\Models\StokSparepart\StockSparepart;

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

        // dd($request->all());
        if($request->supplierID) {
            $supplier = supplier::find($request->supplierID);
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
                "jumlah" => $request->jumlah[$i] ?? '',
            ];
        }
        $data = $bpb->detail_bpbs()->createMany($detail);

        $faker = Faker::Create('id_ID');

        $tanggal = $request->tanggal;
        foreach($request->barang_id as $i => $tt) {

            if($request->barang_id[$i] == null) {
                // dd($request->detail_id[$i]);
                $namaBarang = detail_npp::select('nama')->where('id',$request->detail_id[$i])->first();
                $barang = new DaftarBarang;
                $barang->kode = $faker->numerify("####");
                $barang->nama = $namaBarang->nama;
                $barang->satuan = $request->satuan{$i} ??  'Pcs';
                $barang->save();

                $stok = new StockSparepart;
                $stok->barang_id = $barang->id  ?? '';
                $stok->jumlah = $request->jumlah{$i} ?? '';
                $stok->tanggal = $tanggal;
                $stok->satuan = $request->satuan{$i} ?? '';

                $data[$i]->stock()->save($stok);

            } else {
                $barang = DaftarBarang::find($request->barang_id[$i]);

                $stok = new StockSparepart;
                $stok->barang_id = $barang->id ?? '';
                $stok->jumlah = $request->jumlah{$i} ?? '';
                $stok->tanggal = $request->tanggal;
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
        // foreach ($bpb->detail_bpbs as $val) {
        //     echo $val->detail_npp->nama;
        // }
        // die();
        $suppliers = supplier::all()->pluck('nama','id');
        $detail = detail_npp::all()->pluck('nama','id');
        $npp = npp::all()->pluck('kode','id');
        $barang = DaftarBarang::all()->pluck('nama','id');
        return view("admin.bpb.edit",compact('bpb','detail','npp','suppliers','barang'));
    }

    public function update(UpdateBpbRequest $request, bpb $bpb) {
        // dd($request->all());

        if($request->supplierID) {
            $supplier = supplier::find($request->supplierID);
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

        $bpb->kode = $request->kode;
        $bpb->tanggal = $request->tanggal;
        $bpb->kelompok = $request->kelompok;
        $bpb->npp()->associate($request->npp_id);
        $bpb->supplier()->associate($supplier);
        $bpb->save();


        foreach($bpb->detail_bpbs as $i => $value) {
            detail_bpb::UpdateOrCreate(
                ["id" => $value->id ],
                [
                    "detail_id" => $request->detail_id[$i],
                    "jumlah" => $request->jumlah[$i],
                ]
                );

                StockSparepart::UpdateOrCreate(
                    ["id" => $value->stock->id ],
                    [
                        "jumlah" => $request->jumlah[$i],
                        "satuan" => $request->satuan[$i],
                    ]
                    );
        }

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
        $result->detail_bpbs()->delete();
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
