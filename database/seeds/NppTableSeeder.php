<?php

use App\Models\StokSparepart\npp;
use App\Models\hrd\bagian_dept;
use App\Models\StokSparepart\detail_npp;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NppTableSeeder extends Seeder
{
    public function run()
    {
        //  13 Januari 2023
        //  1. Report belum dijadikan table
        //  2.

        // $bagian = bagian_dept::where("nama","IT")->first();

        npp::createMany([
            [
                "kode" => "01/ED.EL/X/2022",
                "tanggal" => "2022-10-01",
                "status"    => "Pending"
            ],
            [
                "kode" => "02/ED.EL/X/2022",
                "tanggal" => "2022-10-02",
                "status"    => "Pending"
            ],
            [
                "kode" => "03/ED.EL/X/2022",
                "tanggal" => "2022-10-03",
                "status"    => "Pending"
            ],
            [
                "kode" => "04/ED.EL/X/2022",
                "tanggal" => "2022-10-04",
                "status"    => "Pending"
            ],
            [
                "kode" => "05/ED.EL/X/2022",
                "tanggal" => "2022-10-05",
                "status"    => "Pending"
            ]
        ]
            );
    }
}
