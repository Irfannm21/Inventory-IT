<?php

use Illuminate\Database\Seeder;
use App\master_karyawans;
use Faker\Factory as Faker;

class MasterKaryawanTablseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0; $i <= 10; $i++) {
            master_karyawans::create([
                "kode" => $faker->numerify("00'$i'/MKT/'$i'"),
                "id_finger" => $faker->numerify("########"),
                "nik" => $faker->numerify("####"),
                "nama" => $faker->firstName,
                "id_finger" => $faker->numerify("########"),
            ]);
        }
    }
}
