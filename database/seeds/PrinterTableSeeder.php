<?php

use Illuminate\Database\Seeder;
use App\Models\it\printer;
class PrinterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $printer = [
            [
                "kode" => "01/L3250/51",
                "tanggal" => "2021-09-07",
                "nama"  => "Epson L3250 Scan Copy Wifi ADM MKT",
            ],
            [
                "kode" => "02/L3250/52",
                "tanggal" => "2021-09-27",
                "nama"  => "Epson L3250 Scan Copy Wifi ADM MKT",
            ],
            [
                "kode" => "03/LQ2180/00",
                "tanggal" => "2021-09-07",
                "nama"  => "Epson LQ2180 ADM Kasir",
            ],
            [
                "kode" => "04/LQ2180/58",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LQ2180 ADM Logistik",
            ],
            [
                "kode" => "05/MP230/58",
                "tanggal" => "2019-05-17",
                "nama"  => "Canon MP230 Scan Copy ADM Logistik",
            ],
            [
                "kode" => "07/LQ2180/59",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LQ2180 ADM Grey",
            ],
            [
                "kode" => "08/L310/57",
                "tanggal" => "2020-01-04",
                "nama"  => "Epson L310 ADM Mobil",
            ],
            [
                "kode" => "09/L220/56",
                "tanggal" => "2020-08-11",
                "nama"  => "Epson L220 Scan Copy ADM Personalia",
            ],
            [
                "kode" => "10/LQ2180/55",
                "tanggal" => "1999-03-07",
                "nama"  => "Epson LQ2180 ADM Personalia",
            ],
            [
                "kode" => "11/LQ2180/62",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LQ2180 ADM GD JADI",
            ],
            [
                "kode" => "12/LQ2180/61",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LQ2180 ADM GD JADI",
            ],
            [
                "kode" => "13/LX310/00",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LX310 Bank Data",
            ],
            [
                "kode" => "14/LQ2180/72",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LQ2180 ADM DF",
            ],
            [
                "kode" => "15/G2010/81",
                "tanggal" => "2020-10-07",
                "nama"  => "Epson G2010 Scan Copy",
            ],
            [
                "kode" => "16/L220/00",
                "tanggal" => "2007-09-07",
                "nama"  => "Epson L220 Sampel Warna",
            ],
            [
                "kode" => "17/LQ2180/58",
                "tanggal" => "2008-09-07",
                "nama"  => "Epson LQ2180 Uji Benang",
            ],
            [
                "kode" => "18/LX310/73",
                "tanggal" => "2010-10-07",
                "nama"  => "Epson LX310 GD Sparepart",
            ],
            [
                "kode" => "19/L220/65",
                "tanggal" => "2021-09-07",
                "nama"  => "Epson L220 ADM Engineering",
            ],
            [
                "kode" => "20/G2010/76",
                "tanggal" => "2022-06-11",
                "nama"  => "Epson G2010 ADM Weaving",
            ],
            [
                "kode" => "19/LQ2180/68",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LQ2180 ADM Weaving",
            ],
            [
                "kode" => "18/L1110/67",
                "tanggal" => "2020-02-27",
                "nama"  => "Epson L1110 ADM Weaving",
            ],
            [
                "kode" => "18/LQ2180/00",
                "tanggal" => "1999-11-22",
                "nama"  => "Epson LQ2180 GD Benang",
            ],
            [
                "kode" => "18/LX310/72",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LX310 GD Kimia",
            ],
        ];

        printer::insert($printer);
    }
}
