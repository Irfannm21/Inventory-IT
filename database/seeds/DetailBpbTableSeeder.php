<?php

use Illuminate\Database\Seeder;
use App\bpb;
use App\detail_npp;
use App\Detail_bpb;
use App\StockSparepart;
use App\DaftarBarang;
use App\supplier;
use App\npp;

class DetailBpbTableSeeder extends Seeder
{
    public function run()
    {
        $barang = DaftarBarang::find(1);
        $detail = Detail_bpb::find(25);

        $val = new StockSparepart;
        $val->barang_id = $barang->id;
        $val->jumlah = 2;
        $val->satuan = "Unit";
        $detail->stock()->save($val);
    }
}
