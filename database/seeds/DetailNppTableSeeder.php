<?php


use App\npp;
use App\detail_npp;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DetailNppTableSeeder extends Seeder
{

    public function run()
    {

        $npp = npp::where("kode","01/ED.EL/X/2022")->first();
        $faker = Faker::create('id_ID');

            $npp->details()->createMany([
            [
                "nama" => "Mouse",
                "jumlah" => 4,
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => "U/ ADM DF",
            ],
            [
                "nama" => "Keyboard",
                "jumlah" => $faker->numberBetween(1,10),
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => $faker->word,
            ],
            [
                "nama" => "Monitor",
                "jumlah" => $faker->numberBetween(1,10),
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => $faker->word,
            ],

            ]);

        $npp2 = npp::where("kode","02/ED.EL/X/2022")->first();
        $npp2->details()->createMany([
            [
                "nama" => "CCTV",
                "jumlah" => 4,
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => "U/ ADM DF",
            ],
            [
                "nama" => "Switch 8HUB",
                "jumlah" => $faker->numberBetween(1,10),
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => $faker->word,
            ],
            [
                "nama" => "VGA",
                "jumlah" => $faker->numberBetween(1,10),
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => $faker->word,
            ],
        ]);

        $npp2 = npp::where("kode","03/ED.EL/X/2022")->first();
        $npp2->details()->createMany([
            [
                "nama" => "CDROM",
                "jumlah" => 4,
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => "U/ ADM DF",
            ],
            [
                "nama" => "Cathridge",
                "jumlah" => $faker->numberBetween(1,10),
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => $faker->word,
            ],
            [
                "nama" => "RAM 4GB",
                "jumlah" => $faker->numberBetween(1,10),
                "satuan" => "unit",
                "stok"  => $faker->numberBetween(0,10),
                "keterangan" => $faker->word,
            ],
        ]);
    }
}
