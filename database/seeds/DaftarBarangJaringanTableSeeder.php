<?php

use Illuminate\Database\Seeder;
use App\TableBarangJaringan;

class DaftarBarangJaringanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar = [
            [
                "kode" => "001/JRGN.KOMP/MKTG",
                "tanggal" => "2016-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch Dlink 8 Hub",
            ],
            [
                "kode" => "002/JRGN.KOMP/MKTG",
                "tanggal" => "2017-11-28",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch Dlink 8 Hub",
            ],
            [
                "kode" => "003/JRGN.TElE/MKTG",
                "tanggal" => "2017-11-28",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Hybrid",
            ],
            [
                "kode" => "004/JRGN.TELE/MKTG",
                "tanggal" => "2012-03-28",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "FAX",
            ],
            [
                "kode" => "005/JRGN.KOMP/DIRE",
                "tanggal" => "2016-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Router D-Link",
            ],
            [
                "kode" => "006/JRGN.TELE/DIRE",
                "tanggal" => "2014-01-08",
                'kelompok' => 'Jaringan Telepom',
                "nama" => "Pewat Telepon Hybrid",
            ],
            [
                "kode" => "007/JRGN.KOMP/AKTG",
                "tanggal" => "2011-01-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch Dlink 16 Hub",
            ],
            [
                "kode" => "008/JRGN.KOMP/AKTG",
                "tanggal" => "2021-04-18",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch Dlink 8 Hub",
            ],
            [
                "kode" => "008/JRGN.TELE/AKTG",
                "tanggal" => "2021-04-18",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "009/JRGN.TELE/DIRE",
                "tanggal" => "2021-11-28",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Peswat Telepon Hybrid",
            ],
            [
                "kode" => "010/JRGN.KOMP/KSIR",
                "tanggal" => "2017-06-18",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch Dlink 8 Hub",
            ],
            [
                "kode" => "011/JRGN.TELE/KSIR",
                "tanggal" => "2016-04-18",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Pesawat Telepon Hybrid",
            ],
            [
                "kode" => "012/JRGN.TELE/RESP",
                "tanggal" => "2010-02-18",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Pesawat Telepon Hybrid",
            ],
            [
                "kode" => "042/JRGN.TELE/RESP",
                "tanggal" => "20010-02-18",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Pesawat Telepon Hybrid",
            ],
            [
                "kode" => "000/JRGN.TELE/RESP",
                "tanggal" => "2016-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "PABX",
            ],
            [
                "kode" => "000/JRGN.KOMP/RESP",
                "tanggal" => "2016-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Router D-link Insan",
            ],
            [
                "kode" => "013/JRGN.TELE/LOGI",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "PABX",
            ],
            [
                "kode" => "014/JRGN.TELE/LOGI",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Hybrid",
            ],
            [
                "kode" => "015/JRGN.KOMP/LOGI",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8Hub",
            ],
            [
                "kode" => "016/JRGN.KOMP/PERS",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "015/JRGN.TELE/PERS",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "016/JRGN.KOMP/KLIN",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "017/JRGN.TELE/SATP",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pewasat Telepon Singel",
            ],
            [
                "kode" => "018/JRGN.KOMP/GJDI",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "019/JRGN.TELE/GJDI",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "020/JRGN.KOMP/ADDF",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "021/JRGN.KOMP/LADF",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "022/JRGN.TELE/LADF",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "023/JRGN.KOMP/GDSP",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "024/JRGN.TELE/GDSP",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "025/JRGN.KOMP/ADEG",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 16 Hub",
            ],
            [
                "kode" => "026/JRGN.KOMP/ADEG",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Router D-link",
            ],
            [
                "kode" => "028/JRGN.KOMP/SAMP",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "029/JRGN.TELE/ADWV",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "030/JRGN.KOMP/ADWV",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "031/JRGN.TELE/GDBG",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "032/JRGN.KOMP/GDBG",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Komputer',
                "nama" => "Switch 8 Hub",
            ],
            [
                "kode" => "033/JRGN.TELE/GKIM",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan Telepon',
                "nama" => "Pesawat Telepon Singel",
            ],
            [
                "kode" => "034/JRGN.CCTV/PDIR",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV Hikvision 3MP",
            ],
            [
                "kode" => "035/JRGN.CCTV/RESP",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV EZVIZ Wifi 2MP",
            ],
            [
                "kode" => "036/JRGN.CCTV/RESP",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV EZVIZ Wifi 2MP",
            ],
            [
                "kode" => "037/JRGN.CCTV/KLIN",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV Hikvision 2MP",
            ],
            [
                "kode" => "038/JRGN.CCTV/DFIN",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV Hikvision 2MP",
            ],
            [
                "kode" => "039/JRGN.CCTV/WORK",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV Hikvision 2MP",
            ],
            [
                "kode" => "040/JRGN.CCTV/PARK",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV Hikvision 3MP",
            ],
            [
                "kode" => "041/JRGN.CCTV/",
                "tanggal" => "2010-10-08",
                'kelompok' => 'Jaringan CCTV',
                "nama" => "CCTV Hikvision 2MP",
            ]
            ];

            TableBarangJaringan::insert($daftar);
    }
}
