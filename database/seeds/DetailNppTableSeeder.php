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
        // $result = bagian_dept::findOrFail(1);

        // $npp = npp::create([
        //     "kode" => "01/UMP.IT/XII/23",
        //     "tanggal" => "2023-12-20",
        //     "status" => null,
        //     "bagian_id" => $result->id,
        // ]);
        // $faker = Faker::create('id_ID');

        //     $npp->details()->createMany([
        //     [
        //         "nama" => "Mouse",
        //         "jumlah" => 4,
        //         "satuan" => "unit",
        //         "stok"  => $faker->numberBetween(0,10),
        //         "keterangan" => "U/ ADM DF",
        //     ],
        //     [
        //         "nama" => "Keyboard",
        //         "jumlah" => $faker->numberBetween(1,10),
        //         "satuan" => "unit",
        //         "stok"  => $faker->numberBetween(0,10),
        //         "keterangan" => $faker->word,
        //     ],
        //     [
        //         "nama" => "Monitor",
        //         "jumlah" => $faker->numberBetween(1,10),
        //         "satuan" => "unit",
        //         "stok"  => $faker->numberBetween(0,10),
        //         "keterangan" => $faker->word,
        //     ],

        //     ]);

        // Update

        $result = npp::where("kode","01/UMP.IT/XII/23")->first();
        $detail[] = [
            ["id" => 2],
            [
                "nama" => "Keyboard Logitek",
                "jumlah" => 2,
                "satuan" => "Unit",
                "stok" => 0,
                "Keterangan" => "Hasil dari null",
            ],
            ["id" => 3],
            [
                "nama" => "Keyboard Logitek",
                "jumlah" => 2,
                "satuan" => "Unit",
                "stok" => 0,
                "Keterangan" => "Hasil dari null",
            ]
        ];

        dd($detail);

        $result->details()->updateOrCreate(
            ["id" => null],
            [
                "nama" => "Keyboard Logitek",
                "jumlah" => 2,
                "satuan" => "Unit",
                "stok" => 0,
                "Keterangan" => "Hasil dari null",
            ]
            );
    }
}
