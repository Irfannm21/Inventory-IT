<?php

use App\Models\StokSparepart\supplier;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SupplierTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0; $i<=20; $i++) {
            $comp = $faker->company;
            $type = substr($comp,0,3);
            supplier::create(
                [
                    "nama" => $comp,
                    "type" => $type,
                    "telepon" => $faker->phoneNumber,
                    "email" => $faker->email,
                    "kota"  => $faker->city,
                    "alamat" => $faker->address,
                ]
                );
        }
    }
}
