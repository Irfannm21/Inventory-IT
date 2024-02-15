<?php

use App\Models\hrd\departemen;
use App\Models\hrd\bagian_dept;
use Illuminate\Database\Seeder;

class BagianTableSeeder extends Seeder
{

    public function run()
    {
        $eng = departemen::where('nama','Engineering')->first();

    
        $eng->bagians()->createMany([
            [
                "nama" => "Proyek Engineering"
            ],
            [

                "nama" => "Listrik DF"
            ],
            [

                "nama" => "WWT-LAB"
            ],
            [

                "nama" => "Administrasi"
            ],
            [

                "nama" => "Utility"
            ],

            [

                "nama" => "Listrik WV"
            ],
            [

                "nama" => "Workshop"
            ],
            [

                "nama" => "WT / WWT"
            ]
        ]);

        $logistik = departemen::where('nama','Logistics')->first();

        $logistik->bagians()->createMany([
            [
                "nama" => "Gudang Grey"
            ],
            [
                "nama" => "Gudang Kimia"
            ],
            [
                "nama" => "Gudang Sparepart"
            ],
            [
                "nama" => "Gudang Kain Jadi"
            ],
            [
                "nama" => "Forklift"
            ],
            [
                "nama" => "Gudang Benang"
            ],
            [
                "nama" => "Administrasi"
            ],
        ]
            );


            $acc = departemen::where('nama','Accounting')->first();

            $acc->bagians()->createMany([
                [

                    "nama" => "Finance"
                ],
                [

                    "nama" => "Kasir"
                ],
            ]);

            $mkt = departemen::where('nama','Marketing')->first();

            $mkt->bagians()->createMany([
                [

                    "nama" => "Marketing"
                ],
                [

                    "nama" => "Sample"
                ],
            ]);


    $df = departemen::where('nama','Dyeing Finishing')->first();

    $df->bagians()->createMany([
        [

            "nama" => "Continous"
        ],
        [

            "nama" => "Chemical"
        ],
        [

            "nama" => "Administrasi"
        ],
        [

            "nama" => "Exhaust"
        ],
        [

            "nama" => "Final"
        ],
        [

            "nama" => "Finishing"
        ],
        [

            "nama" => "Inter"
        ],
        [

            "nama" => "Lab / Pendataan"
        ],
        [

            "nama" => "MTC"
        ],
        [

            "nama" => "Packing"
        ],
        [

            "nama" => "Persiapan"
        ],
    ]);


    $per = departemen::where('nama','Umum dan Personalia')->first();

    $per->bagians()->createMany([
        [

            "nama" => "Kebersihan"
        ],
        [

            "nama" => "Espedisi"
        ],
        [

            "nama" => "Kenek"
        ],
        [

            "nama" => "Satpam"
        ],
        [

            "nama" => "Bengkel"
        ],
        [

            "nama" => "Personalia"
        ],
        [

            "nama" => "Sopir"
        ],
        [

            "nama" => "Poliklinik"
        ],
        [

            "nama" => "Timbangan"
        ],
        [

            "nama" => "Kendaraan"
        ],
        [

            "nama" => "Resepsionis"
        ],
        [

            "nama" => "IT"
        ],
    ]);

    $wv = departemen::where('nama','Weaving')->first();

    $wv->bagians()->createMany([
        [

            "nama" => "Persiapan"
        ],
        [

            "nama" => "AJL WV I"
        ],
        [

            "nama" => "MTC AJL"
        ],
        [

            "nama" => "Inspecting"
        ],
        [

            "nama" => "Persiapan"
        ],
        [

            "nama" => "Kelosan"
        ],
        [

            "nama" => "AJL WV II"
        ],
        [

            "nama" => "MTC"
        ],
        [

            "nama" => "Administrasi"
        ],
        [

            "nama" => "Cucukan"
        ],
        [

            "nama" => "PPQC"
        ],
    ]);

    $sp = departemen::where('nama','Spinning')->first();

    $sp->bagians()->createMany([
        [

            "nama" => "Administrasi"
        ],
        [

            "nama" => "Ass-Winder"
        ],
        [

            "nama" => "AW-Packing"
        ],
        [

            "nama" => "AW-PKG"
        ],
        [

            "nama" => "BL-CD-DR"
        ],
        [

            "nama" => "BL-Simplex"
        ],
        [

            "nama" => "Forklift"
        ],
        [

            "nama" => "Gudang Sparepart"
        ],
        [

            "nama" => "Gudang"
        ],
        [

            "nama" => "Kendaraan"
        ],
        [

            "nama" => "MTC"
        ],
        [

            "nama" => "MTC-BL-CD-DR"
        ],
        [

            "nama" => "MTC Ring-Frame"
        ],
        [

            "nama" => "MTC TFO"
        ],
        [

            "nama" => "Trainer"
        ],
        [

            "nama" => "Utility"
        ],
        [

            "nama" => "MTC Utility"
        ],
        [

            "nama" => "MTC Winding"
        ],
        [

            "nama" => "Packing"
        ],
        [

            "nama" => "Personalia"
        ],
        [

            "nama" => "Poliklinik"
        ],
        [

            "nama" => "PPIC/QC"
        ],
        [

            "nama" => "Produksi"
        ],
        [

            "nama" => "QC"
        ],
        [

            "nama" => "RF Winding"
        ],
        [

            "nama" => "Ring Frame"
        ],
        [

            "nama" => "Roving"
        ],
        [

            "nama" => "Satpam"
        ],
        [

            "nama" => "TFO"
        ],
        [

            "nama" => "Trainer"
        ],
        [

            "nama" => "Utility"
        ],
        [

            "nama" => "Winding"
        ],

    ]);




    }

}

