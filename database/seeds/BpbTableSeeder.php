<?php

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
        $npp = npp::find(2);
        $detail = detail_npp::where('id',1)->first();

        $bpb = bpb::find(21);
        $detail_bpb = detail_bpb::find(33);

        $find = DaftarBarang::where("nama",$detail_bpb->detail_npp->nama)->first();

        if($find == null)
        {
            $val = new DaftarBarang;
            $val->kode = 1234;
            $val->nama = $detail_bpb->detail_npp->nama;
            $val->save();

            dd($val->nama);
            $detail_bpb->stock()->create([
                "barang_id" => $val->id,
                "tanggal"   => "2024/01/01",
                "jumlah"    => 2,
                "satuan"    => "Unit",
            ]);
        } else {
            dump($find->id);
            $detail_bpb->stock()->create([
                "barang_id" => $find->id,
                "tanggal"   => "2024/01/01",
                "jumlah"    => 2,
                "satuan"    => "Unit",
            ]);
        }

    }
}
