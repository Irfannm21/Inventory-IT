<?php


use App\Models\StokSparepart\npp;
use App\Models\hrd\bagian_dept;
use App\Models\StokSparepart\detail_npp;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DetailNppTableSeeder extends Seeder
{

    public function run()
    {
        // Create
        $result = npp::findOrFail(1);

            $result->details()->createMany([
            [
                "nama" => "Mouse",
                "jumlah" => 4,
                "satuan" => "unit",
                "stok"  => 0,
                "keterangan" => "U/ ADM DF",
            ],
            [
                "nama" => "Keyboard",
                "jumlah" => 2,
                "satuan" => "unit",
                "stok"  => 0,
                "keterangan" => "U/ ADM DF",
            ],
            [
                "nama" => "Monitor",
                "jumlah" => 3,
                "satuan" => "unit",
                "stok"  => 0,
                "keterangan" => "U/ ADM DF",
            ],

            ]);

        // Update

        // Update Detail NPP
        // $result = npp::where("kode","01/UMP.IT/XII/23")->first();
        // $detail[] = [
        //     ["id" => 2],
        //     [
        //         "nama" => "Keyboard Logitek",
        //         "jumlah" => 2,
        //         "satuan" => "Unit",
        //         "stok" => 0,
        //         "Keterangan" => "Hasil dari null",
        //     ],
        //     ["id" => 3],
        //     [
        //         "nama" => "Keyboard Logitek",
        //         "jumlah" => 2,
        //         "satuan" => "Unit",
        //         "stok" => 0,
        //         "Keterangan" => "Hasil dari null",
        //     ]
        // ];

        // dd($detail);

        // $result->details()->updateOrCreate(
        //     ["id" => null],
        //     [
        //         "nama" => "Keyboard Logitek",
        //         "jumlah" => 2,
        //         "satuan" => "Unit",
        //         "stok" => 0,
        //         "Keterangan" => "Hasil dari null",
        //     ]
        //     );
    }
}
