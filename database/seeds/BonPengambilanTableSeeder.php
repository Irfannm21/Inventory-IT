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
        $detail = Detail_bpb::find(67);
        $barang = DaftarBarang::find(39);

        $bon = new BonPengambilan;
        $bon->kode = "14/BON";
        $bon->detail_id = $detail->id;
        $bon->tanggal = "2023-01-15";
        $bon->save();

        $stok = new StockSparepart;
        $stok->barang_id = $barang->id;
        $stok->jumlah = 2;
        $stok->tanggal = "2023-01-15";
        $stok->satuan = "Unit";
        $bon->bon()->save($stok);

    }
}
