<?php

use Illuminate\Database\Seeder;

use App\Models\StokSparepart\Detail_bpb;
use App\Models\StokSparepart\BonKeluar;
use App\Models\StokSparepart\DetailBon;
use App\Models\StokSparepart\StockSparepart;
use App\Models\StokSparepart\DaftarBarang;



class BonKeluarTableSeeder extends Seeder
{
    public function run()
    {
    $result = BonKeluar::create([
            "kode" => "02/BP.IT/I/24",
            "tanggal" => "2024-01-02",
            "bagian_id" => 39,
            "Penerima" => "Irfan"
        ]);

        // $result = BonKeluar::find(4);
        $result->detail_bons()->createMany([
            [
                "barang_id" => 1,
                "jumlah" => 1,
                "satuan" => "Unit",
            ],
            [
                "barang_id" => 2,
                "jumlah" => 1,
                "satuan" => "Unit",
            ]
        ]);

        $result = DetailBon::whereIn('id',[4,5])->get();

        foreach($result as $val) {
            $val->stock()->create([
                "barang_id" => $val->barang_id,
                "tanggal" => $val->bon->tanggal,
                "jumlah" => $val->jumlah,
                "satuan" => $val->satuan,
            ]);
        }



    }
}
