<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\npp;
use App\detail_npp;
use App\bpb;
class NppController extends Controller
{
    public function index()
    {
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


        // $npp = detail_npp::find(2);
        // dd($npp);
        // $npp->bpbs()->createMany([
        //     [

        //         'kode' => "BPB/01",
        //         'tanggal' => '2022-08-01',
        //         'jumlah' => 1,
        //         'satuan' => 'unit',
        //         'harga' => 1000000,
        //         'supplier' => 'Noer Electronic'
        //     ]

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

        $npp = npp::find(1);
        echo "Data NPP <br><br>";
        echo "Departemen   : " . $npp->departemen->nama. "<br>";
        echo "Kode NPP : " . $npp->kode . "<br>";
        echo "Tanggal  : " . $npp->tanggal . "<br>";
        echo "<hr>";
        echo "Daftar Barang <br><br>";
        foreach($npp->details as $value){
            echo $value->nama . " | " . $value->stock . " | " . $value->jumlah . " " . $value->satuan . " | " . $value->keterangan .  "<br>";
        }
        echo "<hr>";
        echo "Data BPB / Barang Sudah Datang <br><br>";
        echo "Kode NPP : " . $npp->kode . "<br>";
        $bpb = bpb::has('detail')->get();
        foreach($bpb as $value){
            echo $value->kode . " | " . $value->detail->nama . " | " . $value->tanggal . " | " . ($value->jumlah) ." " . $value->satuan . " | " . $value->harga . " | " . $value->supplier .  "|<br>";
        }
        echo "<hr>";

        echo "Sisa Barang belum datang <br><br>";

        $detail = detail_npp::with('bpbs')->get();

        // dd($detail);
        foreach($detail as $value){
            $jumlah = $value->bpbs->sum('jumlah');
            if ($jumlah < $value->jumlah) {
                echo $value->jumlah .' | '. $jumlah .'<br>';
                echo $value->npp->kode. " | " . $value->nama . " | " . $value->stock . " | " . ($value->jumlah - $jumlah) . " " . $value->satuan . '<br><br>';
            }
        }

        echo "<hr>";
        echo "TESSSSSSSSSSSSSSSSSSSSSSSSSSSST <br>";

        $bpb = bpb::all();

        echo $bpb->pluck('jumlah')->sum();
    }
}
