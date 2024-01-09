<?php

use Illuminate\Database\Seeder;
use App\Models\StokSparepart\bpb;
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
        $result = bpb::findOrFail(6);


       $val =  $result->detail_bpbs()->updateOrCreate(
            ["id" => 11],
            [
                "detail_id" => 2,
                "jumlah" => 3,
            ]
            );

        $val->stock()->updateOrCreate(
            [
                "id" => $val->stock->id,
            ],
            [
                "barang_id" => 1,
                "jumlah" => 3,
            ]

        );
    }
    }
