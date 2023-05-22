<?php

use Illuminate\Database\Seeder;
use App\DaftarBarang;
class DaftarBarangInventoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $val = new DaftarBarang;
        $val->kode = "SPI/ADM/TM664";
        $val->nama = "Tinta Epson Biru 664";
        $val->nomor_part = "";
        $val->no_kartu = "664";
        $val->kelompok = "Sparepart Insan";
        $val->jenis = "Administrasi";
        $val->satuan = "Pcs";
        $val->save();
    }
}
