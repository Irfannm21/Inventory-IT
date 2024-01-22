<?php

use Illuminate\Database\Seeder;
use App\Models\StokSparepart\Detail_bpb;

class PembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $result =  Detail_bpb::find(2);
      $result->pembayarans()->create([
        "rupiah" => 2000,
        "ppn"   => 220,
        "total_harga" => 2220,
        "jenis_pembayaran" => "Cash",
        "lama_kredit" => null,
      ]);
    }
}
