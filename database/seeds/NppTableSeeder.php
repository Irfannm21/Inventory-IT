<?php

use App\npp;
use App\bagian_dept;
use App\detail_npp;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NppTableSeeder extends Seeder
{
    public function run()
    {
        //  13 Januari 2023
        //  1. Report belum dijadikan table
        //  2.

        $bagian = bagian_dept::where("nama","IT")->first();

        $bagian->npps()->createMany([
            [
                "kode" => "01/ED.EL/X/2022",
                "tanggal" => "2022-10-01",
                "status"    => NULL
            ],
            [
                "kode" => "02/ED.EL/X/2022",
                "tanggal" => "2022-10-02",
                "status"    => NULL
            ],
            [
                "kode" => "03/ED.EL/X/2022",
                "tanggal" => "2022-10-03",
                "status"    => NULL
            ],
            [
                "kode" => "04/ED.EL/X/2022",
                "tanggal" => "2022-10-04",
                "status"    => NULL
            ],
            [
                "kode" => "05/ED.EL/X/2022",
                "tanggal" => "2022-10-05",
                "status"    => NULL
            ]
        ]
            );
    }
}
