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
            ],
            [
                "kode" => "02/ED.EL/X/2022",
                "tanggal" => "2022-10-02",
            ],
            [
                "kode" => "03/ED.EL/X/2022",
                "tanggal" => "2022-10-03",
            ],
            [
                "kode" => "04/ED.EL/X/2022",
                "tanggal" => "2022-10-04",
            ],
            [
                "kode" => "05/ED.EL/X/2022",
                "tanggal" => "2022-10-05",
            ]
        ]
            );
    }
}
