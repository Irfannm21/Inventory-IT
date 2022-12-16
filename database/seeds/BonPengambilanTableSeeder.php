<?php

use Illuminate\Database\Seeder;
use App\BonPengambilan;
use App\Detail_bpb;
use App\StockSparepart;
use App\DaftarBarang;



class BonPengambilanTableSeeder extends Seeder
{
    public function run()
    {
        $detail = Detail_bpb::find(39);
        $barang = DaftarBarang::find(1);

        $bon = new BonPengambilan;
        $bon->kode = "01/BON";
        $bon->detail_id = $detail->id;
        $bon->tanggal = "2022-10-10";
        $bon->save();

        $stok = new StockSparepart;
        $stok->barang_id = $barang->id;
        $stok->jumlah = 3;
        $stok->satuan = "Unit";
        $bon->bon()->save($stok);

    }
}
