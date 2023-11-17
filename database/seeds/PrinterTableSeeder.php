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
                "kode" => "01/L220/MKTG/51",
                "tanggal" => "2020-03-04",
                "nama"  => "Epson L220 Scan Copy Direksi",
            ],
            [
                "kode" => "02/L220/MKTG/51",
                "tanggal" => "2018-09-07",
                "nama"  => "Epson L220 Scan Copy ADM MKT",
            ],
            [
                "kode" => "03/IP2770/MKTG/52",
                "tanggal" => "2018-01-01",
                "nama"  => "Canon IP2770  ADM MKT",
            ],
            [
                "kode" => "04/L3250/MKTG/51",
                "tanggal" => "2022-02-25",
                "nama"  => "Epson L3250 Scan Copy Wifi ADM MKT",
            ],
            [
                "kode" => "05/L3250/MKTG/52",
                "tanggal" => "2021-09-27",
                "nama"  => "Epson L3250 Scan Copy Wifi ADM MKT",
            ],
            [
                "kode" => "06/LQ2180/KSIR/00",
                "tanggal" => "2021-09-07",
                "nama"  => "Epson LQ2180 ADM Kasir",
            ],
            [
                "kode" => "07/LQ2180/LOGI/58",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui Epson LQ2180 ADM Logistik",
            ],
            [
                "kode" => "08/MP230/LOGI/58",
                "tanggal" => "2019-05-17",
                "nama"  => "Canon MP230 Scan Copy ADM Logistik",
            ],
            [
                "kode" => "09/IP2770/UMUM/57",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui Canon IP ADM Mobil",
            ],
            [
                "kode" => "10/G2010/UMUM/57",
                "tanggal" => "2020-01-04",
                "nama"  => "Canon G2010 Print Scan Copy ADM Mobil",
            ],
            [
                "kode" => "11/LQ2180/GREI/59",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui, Epson LQ2180 ADM Grey",
            ],
            [
                "kode" => "12/L220/PERS/56",
                "tanggal" => "2020-08-11",
                "nama"  => "Epson L220 Scan Copy ADM Personalia",
            ],
            [
                "kode" => "13/LQ2180/PERS/55",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui Epson LQ2180 ADM Personalia",
            ],
            [
                "kode" => "14/LQ2180/GDJD/62",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui , Epson LQ2180 ADM GD JADI",
            ],
            [
                "kode" => "15/LQ2180/GDJD/61",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui, Epson LQ2180 ADM GD JADI",
            ],
            [
                "kode" => "16/LX310/DFFG/00",
                "tanggal" => "2012-02-19",
                "nama"  => "Epson LX310 Bank Data",
            ],
            [
                "kode" => "17/LQ2180/DFFG/72",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui, Epson LQ2180 ADM DF",
            ],
            [
                "kode" => "18/G2010/DFFG/81",
                "tanggal" => "2020-10-07",
                "nama"  => "Epson G2010 Scan Copy",
            ],
            [
                "kode" => "19/L220/DFFG/00",
                "tanggal" => "2018-10-13",
                "nama"  => "Epson L220 Sampel Warna",
            ],
            [
                "kode" => "20/LQ2180/DFLB/58",
                "tanggal" => "2008-09-07",
                "nama"  => "Epson LQ2180 Uji Benang",
            ],
            [
                "kode" => "21/LX310/GDSP/73",
                "tanggal" => "2010-10-07",
                "nama"  => "Epson LX310 GD Sparepart",
            ],
            [
                "kode" => "22/MP238/ENGI/65",
                "tanggal" => "2012-03-14",
                "nama"  => "Canon MP238 Scan Copy ADM Engineering",
            ],
            [
                "kode" => "23/L220/ENGI/65",
                "tanggal" => "2021-09-07",
                "nama"  => "Epson L220 ADM Engineering",
            ],
            [
                "kode" => "24/G2010/WEAV/76",
                "tanggal" => "2023-10-19",
                "nama"  => "Epson G2010 ADM Weaving",
            ],
            [
                "kode" => "25/LQ2180/WEAV/68",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui, Epson LQ2180 ADM Weaving",
            ],
            [
                "kode" => "26/L1110/WEAV/67",
                "tanggal" => "2020-02-27",
                "nama"  => "Epson L1110 ADM Weaving",
            ],
            [
                "kode" => "27/L3110/WEAV/67",
                "tanggal" => "2020-02-27",
                "nama"  => "Epson L3110 Scan Print Copy ADM Weaving",
            ],
            [
                "kode" => "28/LQ2180/GDBG/00",
                "tanggal" => "2018-01-01",
                "nama"  => "Tgl Pembelian tidak diketahui, Epson LQ2180 GD Benang",
            ],
            [
                "kode" => "29/LX310/GDKM/72",
                "tanggal" => "1999-09-07",
                "nama"  => "Epson LX310 GD Kimia",
            ],
            [
                "kode" => "30/G2010/DFFG/00",
                "tanggal" => "2023-09-07",
                "nama"  => "Canon G2010 ADM DF",
            ],
        ];

        printer::insert($printer);
    }
}
