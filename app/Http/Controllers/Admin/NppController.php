<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNppRequest;
use App\npp;
use App\detail_npp;
use App\bpb;
use App\perbaikan;
use App\departemen;
use App\bagian_dept ;
class NppController extends Controller
{
    public function index()
    {
        $results = npp::all();
        return view('admin.npp.index', compact('results'));

        // $npp = new npp;
        // $npp->kode = "173/ED.EL/VII/2022";
        // $npp->tanggal = '2022-08-01';
        // $npp->departemen_id  = 1;
        // $npp->bagian_id  = 2    ;
        // $npp->save();

        // $npp = npp::find(1);
        // dd($npp);

        // $detail = new detail_npp;
        // $detail->npp_id  = 1;
        // $detail->nama = "Ram 8GB DDR 4";
        // $detail->jumlah = 4;
        // $detail->satuan = 0;
        // $detail->stok = 1;
        // $detail->keterangan = 'u/ Engineering';
        // $detail->save();


        // $npp = npp::find(2);
        // dd(json_decode($npp->details));
        // $npp->details()->createMany([
        //     [
        //         "npp_id" => 2,
        //         'nama' => "Aerok",
        //         'jumlah' => 3,
        //         'satuan' => 'unit',
        //         'stok' => 0,
        //         'keterangan' => 'u/ insan',
        //     ],

        // ]);

        // $npp = npp::find(1)->firstOrFail();
        // $npp->details()->delete();

        // $result = npp::where('id',1)->first();
        // echo "Kode NPP : " . $result->kode . "<br>";
        // echo "Departemen : " . $result->departemen->nama . "<br>";
        // echo "Bagian : " . $result->bagian->nama . "<br>";
        // echo "Tanggal : " . $result->tanggal . "<br>";


        // echo "<hr>";
        // foreach($result->details as $value) {
        //     echo $value->nama . " " . $value->jumlah . " " . $value->satuan . " " . $value->keterangan . "<br>";
        // }


        // $result = detail_npp::has('bpbs')->get();
        // dd($result);

        // if ($npp == false) {
        //     echo "Gagal";
        // } else {
        //     echo "Berhasil";
        // }

        // Meampilkan NPP //

        // $npp = npp::find(1);
        // echo "Data NPP <br><br>";
        // echo "Departemen   : " . $npp->departemen->nama. "<br>";
        // echo "Kode NPP : " . $npp->kode . "<br>";
        // echo "Tanggal  : " . $npp->tanggal . "<br>";
        // echo "<hr>";
        // echo "Daftar Barang <br><br>";
        // foreach($npp->details as $value){
        //     echo $value->nama . " | " . $value->stock . " | " . $value->jumlah . " " . $value->satuan . " | " . $value->keterangan .  "<br>";
        // }
        // echo "<hr>";
        // echo "Data BPB / Barang Sudah Datang <br><br>";
        // echo "Kode NPP : " . $npp->kode . "<br>";
        // $bpb = bpb::has('detail')->get();
        // foreach($bpb as $value){
        //     echo $value->kode . " | " . $value->detail->nama . " | " . $value->tanggal . " | " . ($value->jumlah) ." " . $value->satuan . " | " . $value->harga . " | " . $value->supplier .  "|<br>";
        // }
        // echo "<hr>";

        // echo "Sisa Barang belum datang <br><br>";

        // $detail = detail_npp::with('bpbs')->get();

        // dd($detail);
    //     foreach($detail as $value){
    //         $jumlah = $value->bpbs->sum('jumlah');
    //         if ($jumlah < $value->jumlah) {
    //             echo $value->jumlah .' | '. $jumlah .'<br>';
    //             echo $value->npp->kode. " | " . $value->nama . " | " . $value->stock . " | " . ($value->jumlah - $jumlah) . " " . $value->satuan . '<br><br>';
    //         }
    //     }

    //     echo "<hr>";
    //     echo "TESSSSSSSSSSSSSSSSSSSSSSSSSSSST <br>";

    //     $bpb = bpb::all();

    //     echo $bpb->pluck('jumlah')->sum();
    // }

    // $result = bpb::find(1);
    // dd($result);
    // $result->perbaikans()->createMany([
    //     [
    //         'tanggal' => '2022-07-21',
    //         'keterangan' => 'Refill',
    //         'hardwareable_type' => 'App\printer',
    //         'hardwareable_id' => 1
    //     ]
    //     ]);


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

        $npp = new NPP;
        $npp->kode = $request->kode;
        $npp->tanggal = $request->tanggal;
        $npp->departemen_id = $request->departemen;
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

    public function Detail(){
        $results = detail_npp::all();
        return view('admin.npp.detail-npp', compact('results'));
    }

    public function diProses(){
        $results = detail_npp::with('bpbs')->get();
        return view('admin.npp.npp-di-proses', compact('results'));
    }

    public function diTerima()
    {
        $results = bpb::all();
        return view('admin.npp.npp-diterima', compact('results'));
    }
}
