dddd<?php

use App\Models\StokSparepart\bpb;
use App\Models\StokSparepart\Detail_bpb;
use App\Models\StokSparepart\supplier;
use App\Models\StokSparepart\npp;
use App\Models\StokSparepart\detail_npp;
use App\Models\StokSparepart\StockSparepart;
use App\Models\StokSparepart\DaftarBarang;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BpbTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::Create('id_ID');
        $supplier = supplier::findOrFail(1);
        $npp = npp::find(1);

        // BUAT DATA BPB
        $bpb = bpb::create([
            "npp_id" => 1,
            "supplier_id" => 1,
            "kode" => "10/UMP.IT/I/24",
            "Kelompok" => "Administratsi",
            "tanggal" => "2024-01-10",
        ]);

        // BUAT DATA DETAIL BPB
      $detail =   $bpb->detail_bpbs()->createMany([
            [
                "detail_id" => 1,
                "jumlah" => 1,
            ],
            [
                "detail_id" => 2,
                "jumlah" => 1,
            ],
            [
                "detail_id" => 3,
                "jumlah" => 1,
            ]
        ]);



        foreach($detail as $item) {
            $find = DaftarBarang::where("nama",$item->detail_npp->nama)->first();

            if($find == null)
            {
                $val = new DaftarBarang;
                $val->kode = $faker->numerify("####");
                $val->nama = $item->detail_npp->nama;
                $val->save();

                $item->stock()->create([
                    "barang_id" => $val->id,
                    "tanggal"   => "2024/01/01",
                    "jumlah"    => $item->detail_npp->jumlah,
                    "satuan"    => "Unit",
                ]);
            } else {

                $item->stock()->create([
                    "barang_id" => $find->id,
                    "tanggal"   => "2024/01/01",
                    "jumlah"    => $item->detail_npp->jumlah,
                    "satuan"    => "Unit",
                ]);
            }
        }



    }
}
