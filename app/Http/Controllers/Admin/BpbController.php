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

        dd($request->all());
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
        foreach($data as $item) {
            $find = daftarBarang::where("nama",$item->detail_npp->nama)->first();

            if($find == null) {
                $val = new DaftarBarang;
                $val->kode = $faker->numerify("####");
                $val->nama = $item->detail_npp->nama;
                $val->save();

                $item->stock()->create([
                    "barang_id" => $val->id,
                    "tanggal"   => $item->bpb->tanggal,
                    "jumlah"    => $item->jumlah,
                    "satuan"    => "Unit",
                ]);
            } else {
                $item->stock()->create([
                    "barang_id" => $find->id,
                    "tanggal"   => $item->bpb->tanggal,
                    "jumlah"    => $item->jumlah,
                    "satuan"    => "Unit",
                ]);
            }
        }

        return redirect()->route("admin.bpbs.".strtolower($request->kelompok));
    }

    public function show() {
        $npp = npp::all();
        return view('admin.bpb.test', compact('npp'));
    }

    public function edit(bpb $bpb) {
        // dd($bpb->id);
        $stock = StockSparepart::where('stockable_id',13)->get();
        // dd($stock);
        $suppliers = supplier::all()->pluck('nama','id');
        $detail = detail_npp::all()->pluck('nama','id');
        $npp = npp::all()->pluck('kode','id');
        $barang = DaftarBarang::all()->pluck('nama','id');


        return view("admin.bpb.edit",compact('bpb','detail','npp','suppliers','barang'));
    }

    public function update(UpdateBpbRequest $request, bpb $bpb) {
            // dd($request->all());
            $supplier = supplier::firstOrCreate(
            ["id" => $request->supplierID],
            [
                "nama" => $request->nama,
                "kota" => $request->kota,
                "type" => $request->type,
                "telepon" => $request->telepon,
                "email" => $request->email,
                "alamat" => $request->alamat,
            ]
            );

            $bpb = bpb::updateOrCreate(
                [
                    "id" => $bpb->id
                ],
                [
                    "npp_id" => $request->npp_id,
                    "supplier_id" => $supplier->id,
                    "kode" => $request->kode,
                    "tanggal" => $request->tanggal,
                    "kelompok" => $request->kelompok,
                ]
            );

        $detail_bpb = [];
        $faker = Faker::Create('id_ID');

        foreach($request->id as $i => $val) {
            // dd($request->detail_id[$i]);

            // di inventori barang tidak ada
             $data_barang =  daftarBarang::find($request->barang_id[$i]);
             $pesenan = detail_npp::find($request->detail_id[$i]);
             $cari_data = DaftarBarang::where("nama",$pesenan->nama)->first();
            // cek nama barang apakah tersedia di inventori barang? jika tidak gunakan nama barang dari detail npp

            // Urai Daftar Barang yang datang

            if($data_barang == null && $cari_data == null) {

                $barang = new DaftarBarang;
                $barang->kode = $faker->numerify("####");
                $barang->nama = $pesenan->nama;
                $barang->satuan = $request->satuan[$i];
                $barang->save();

            } else {
                $barang = $data_barang;
            }

            $detail_bpb[] = [
                ["id" => $val],
                [
                    "detail_id" => $request->detail_id[$i],
                    "jumlah" => $request->jumlah[$i],
                ],
                [
                    "barang_id" => $barang->id,
                    "jumlah" => $request->jumlah[$i],
                ]
            ];


        }


        $result = [];
        foreach($detail_bpb as $item ){
            $id = $item[0]["id"];
            $value = $item[1];
            $stock = $item[2];
             $result = $bpb->detail_bpbs()->updateOrCreate(['id' => $id], $value);

            $result->stock()->updateOrCreate(["id" => $result->stock->id],$stock );
        }


        return redirect()->route("admin.bpbs.".strtolower($request->kelompok));

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
        // dd($request->all());
        $result = bpb::with('detail_bpbs','supplier')->where("kode",$request->bpb)->first();
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
